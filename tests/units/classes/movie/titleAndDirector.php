<?php

namespace estvoyage\movie\tests\units\movie;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units,
	estvoyage\movie\movie,
	mock\estvoyage\movie as mockOfMovie
;

class titleAndDirector extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\movie')
		;
	}

	function testMovieDirectoriIsAskedByMovieLister()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieLister = new mockOfMovie\lister
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieDirectorIsAskedByMovieLister($movieLister))
					->isTestedInstance
				->mock($movieLister)
					->receive('movieDirectorIs')
						->withArguments($movieDirector)
							->once
		;
	}

	function testMovieTitleIsAskedByMovieLister()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieLister = new mockOfMovie\lister
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieTitleIsAskedByMovieLister($movieLister))
					->isTestedInstance
				->mock($movieLister)
					->receive('movieTitleIs')
						->withArguments($movieTitle)
							->once
		;
	}
}
