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

	function testMovieDirectoriIsAskedByMovieConsumer()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieConsumer = new mockOfMovie\movie\consumer
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieDirectorIsAskedByMovieConsumer($movieConsumer))
					->isTestedInstance
				->mock($movieConsumer)
					->receive('movieDirectorIs')
						->withArguments($movieDirector)
							->once
		;
	}

	function testMovieTitleIsAskedByMovieConsumer()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieConsumer = new mockOfMovie\movie\consumer
			)
			->if(
				$this->newTestedInstance($movieDirector, $movieTitle)
			)
			->then
				->object($this->testedInstance->movieTitleIsAskedByMovieConsumer($movieConsumer))
					->isTestedInstance
				->mock($movieConsumer)
					->receive('movieTitleIs')
						->withArguments($movieTitle)
							->once
		;
	}
}
