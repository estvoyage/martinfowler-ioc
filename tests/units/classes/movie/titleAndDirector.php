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

	function testMovieDirectoriIsAskedBy()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieDirectorConsumer = new mockOfMovie\movie\director\consumer
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieDirectorIsAskedBy($movieDirectorConsumer))
					->isTestedInstance
				->mock($movieDirectorConsumer)
					->receive('movieDirectorIs')
						->withArguments($movieDirector)
							->once
		;
	}

	function testMovieTitleIsAskedBy()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieTitleConsumer = new mockOfMovie\movie\title\consumer
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieTitleIsAskedBy($movieTitleConsumer))
					->isTestedInstance
				->mock($movieTitleConsumer)
					->receive('movieTitleIs')
						->withArguments($movieTitle)
							->once
		;
	}
}
