<?php

namespace estvoyage\movie\tests\units;

require __DIR__ . '/../runner.php';

use
	estvoyage\movie\tests\units,
	estvoyage\movie\movie\director,
	estvoyage\movie\movie\title,
	mock\estvoyage\movie as mockOfMovie
;

class movie extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\lister\provider')
		;
	}

	function testMovieDirectoriIsAskedByMovieLister()
	{
		$this
			->given(
				$director = new director(uniqid()),
				$movieLister = new mockOfMovie\lister
			)
			->if(
				$this->newTestedInstance($director, new title(uniqid()))
			)
			->then
				->object($this->testedInstance->movieDirectorIsAskedByMovieLister($movieLister))
					->isTestedInstance
				->mock($movieLister)
					->receive('movieDirectorIs')
						->withArguments($director)
							->once
		;
	}

	function testMovieTitleIsAskedByMovieLister()
	{
		$this
			->given(
				$title = new title(uniqid()),
				$movieLister = new mockOfMovie\lister
			)
			->if(
				$this->newTestedInstance(new director(uniqid()), $title)
			)
			->then
				->object($this->testedInstance->movieTitleIsAskedByMovieLister($movieLister))
					->isTestedInstance
				->mock($movieLister)
					->receive('movieTitleIs')
						->withArguments($title)
							->once
		;
	}
}
