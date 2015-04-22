<?php

namespace estvoyage\movie\tests\units\movie\lister;

require __DIR__ . '/../../../runner.php';

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
			->implements('estvoyage\movie\movie\consumer')
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

	function testMovieIs()
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
				->object($this->testedInstance->movieIs($movie))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: n\a' . PHP_EOL . 'Director: n\a' . PHP_EOL))
							->once

			->given(
				$movieTitle = new movie\title(uniqid()),
				$movieDirector = new movie\director(uniqid())
			)
			->if(
				$this->calling($movie)->movieTitleIsAskedByMovieConsumer = function($movieConsumer) use ($movieTitle) {
					$movieConsumer->movieTitleIs($movieTitle);
				},
				$this->calling($movie)->movieDirectorIsAskedByMovieConsumer = function($movieConsumer) use ($movieDirector) {
					$movieConsumer->movieDirectorIs($movieDirector);
				},
				$this->testedInstance->movieIs($movie)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: ' . $movieTitle . PHP_EOL . 'Director: ' . $movieDirector . PHP_EOL))
							->once
		;
	}
}
