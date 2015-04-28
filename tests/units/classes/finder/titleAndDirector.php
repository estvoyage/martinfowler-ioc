<?php

namespace estvoyage\movie\tests\units\finder;

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
			->implements('estvoyage\movie\finder')
			->implements('estvoyage\movie\movie\title\consumer')
			->implements('estvoyage\movie\movie\director\consumer')
		;
	}

	function testNewMovie()
	{
		$this
			->given(
				$movieTitleCriteria = new movie\title(uniqid()),
				$movieDirectorCriteria = new movie\director(uniqid()),
				$destinationLibrary = new mockOfMovie\library,
				$movie = new mockOfMovie\movie,
				$this->calling($movie)->movieTitleIsAskedBy->doesNothing,
				$this->calling($movie)->movieDirectorIsAskedBy->doesNothing
			)
			->if(
				$this->newTestedInstance($movieTitleCriteria, $movieDirectorCriteria, $destinationLibrary)
			)
			->then
				->object($this->testedInstance->newMovie($movie))->isTestedInstance
				->mock($movie)
					->receive('movieTitleIsAskedBy')
						->withArguments($this->testedInstance)
							->once
					->receive('movieDirectorIsAskedBy')
						->withArguments($this->testedInstance)
							->once

			->if(
				$this->calling($movie)->movieTitleIsAskedBy = function($movieFinder) use ($movieTitleCriteria) { $movieFinder->movieTitleIs($movieTitleCriteria); },
				$this->calling($movie)->movieDirectorIsAskedBy = function($movieFinder) use ($movieDirectorCriteria) { $movieFinder->movieDirectorIs($movieDirectorCriteria); },
				$this->testedInstance->newMovie($movie)
			)
			->then
				->mock($destinationLibrary)
					->receive('newMovie')
						->withIdenticalArguments($movie)
							->once
		;
	}

	function testMovieTitleIs()
	{
		$this
			->given(
				$movieTitle = new movie\title(uniqid())
			)
			->if(
				$this->newTestedInstance(new movie\title(uniqid()), new movie\director(uniqid()), new mockOfMovie\library)
			)
			->then
				->object($this->testedInstance->movieTitleIs($movieTitle))->isTestedInstance
		;
	}

	function testMovieDirectorIs()
	{
		$this
			->given(
				$movieDirector = new movie\director(uniqid())
			)
			->if(
				$this->newTestedInstance(new movie\title(uniqid()), new movie\director(uniqid()), new mockOfMovie\library)
			)
			->then
				->object($this->testedInstance->movieDirectorIs($movieDirector))->isTestedInstance
		;
	}

	function testNewLibrary()
	{
		$this
			->given(
				$library = new mockOfMovie\library
			)
			->if(
				$this->newTestedInstance(new movie\title(uniqid()), new movie\director(uniqid()), new mockOfMovie\library)
			)
			->then
				->object($this->testedInstance->newLibrary($library))->isTestedInstance
				->mock($library)
					->receive('movieFinderIs')
						->withIdenticalArguments($this->testedInstance)
							->once
		;
	}
}