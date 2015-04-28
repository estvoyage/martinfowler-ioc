<?php

namespace estvoyage\movie\tests\units\lister;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units,
	estvoyage\data,
	estvoyage\movie\movie,
	mock\estvoyage\data as mockOfData,
	mock\estvoyage\movie as mockOfMovie
;

class titleAndDirector extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\lister')
			->implements('estvoyage\movie\movie\title\consumer')
			->implements('estvoyage\movie\movie\director\consumer')
		;
	}

	function testMovieTitleIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$movieTitle = new movie\title(uniqid())
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->movieTitleIs($movieTitle))
					->isTestedInstance
		;
	}

	function testMovieDirectorIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$movieDirector = new movie\director(uniqid())
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->movieDirectorIs($movieDirector))
					->isTestedInstance
		;
	}

	function testNewMovie()
	{
		$this
			->given(
				$movie = new mockOfMovie\movie,
				$dataConsumer = new mockOfData\consumer
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->newMovie($movie))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: n\a' . PHP_EOL . 'Director: n\a' . PHP_EOL . PHP_EOL))
							->once

			->given(
				$movieTitle = new movie\title(uniqid()),
				$movieDirector = new movie\director(uniqid())
			)
			->if(
				$this->calling($movie)->movieTitleIsAskedBy = function($movieLister) use ($movieTitle) {
					$movieLister->movieTitleIs($movieTitle);
				},
				$this->calling($movie)->movieDirectorIsAskedBy = function($movieLister) use ($movieDirector) {
					$movieLister->movieDirectorIs($movieDirector);
				},
				$this->testedInstance->newMovie($movie)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: ' . $movieTitle . PHP_EOL . 'Director: ' . $movieDirector . PHP_EOL . PHP_EOL))
							->once
		;
	}
}
