<?php

namespace estvoyage\martinfowler\ioc\tests\units\movie;

require __DIR__ . '/../../runner.php';

use
	estvoyage\martinfowler\ioc\tests\units,
	estvoyage\martinfowler\ioc\movie,
	mock\estvoyage\martinfowler\ioc as mockOfIoc
;

class titleAndDirector extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\martinfowler\ioc\movie')
		;
	}

	function testMovieDirectoriIsAskedBy()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid()),
				$movieTitle = new movie\title(uniqid()),
				$movieDirectorConsumer = new mockOfIoc\movie\director\consumer
			)
			->if(
				$this->newTestedInstance($movieTitle, $movieDirector)
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
				$movieTitleConsumer = new mockOfIoc\movie\title\consumer
			)
			->if(
				$this->newTestedInstance($movieTitle, $movieDirector)
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
