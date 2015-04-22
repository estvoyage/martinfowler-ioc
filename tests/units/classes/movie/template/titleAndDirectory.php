<?php

namespace estvoyage\movie\tests\units\movie\template;

require __DIR__ . '/../../../runner.php';

use
	estvoyage\data,
	estvoyage\movie\tests\units,
	estvoyage\movie\movie,
	estvoyage\movie\movie\title,
	estvoyage\movie\movie\director,
	mock\estvoyage\data as mockOfData,
	mock\estvoyage\movie as mockOfMovie
;

class titleAndDirector extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\movie\template')
		;
	}

	function testNewMovie()
	{
		$this
			->object($this->newTestedInstance->newMovie())
				->isNotTestedInstance
				->isEqualTo($this->newTestedInstance(new title('n\a'), new director('n\a')))
		;
	}

	function testMovieTitleIs()
	{
		$this
			->given(
				$movieTitle = new title(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieTitleIs($movieTitle))
					->isNotTestedInstance
					->isInstanceOf($this->testedInstance)
		;
	}

	function testMovieDirectorIs()
	{
		$this
			->given(
				$movieDirector = new director(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieDirectorIs($movieDirector))
					->isNotTestedInstance
					->isInstanceOf($this->testedInstance)
		;
	}

	function testDataConsumerIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->dataConsumerIs($dataConsumer))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: n\a' . PHP_EOL . 'Director: n\a' . PHP_EOL))
							->once

			->given(
				$movieTitle = new title(uniqid()),
				$movieDirector = new director(uniqid())
			)

			->if(
				$this->newTestedInstance($movieTitle)
					->dataConsumerIs($dataConsumer)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: ' . $movieTitle . PHP_EOL . 'Director: n\a' . PHP_EOL))
							->once

			->if(
				$this->newTestedInstance($movieTitle, $movieDirector)
					->dataConsumerIs($dataConsumer)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: ' . $movieTitle . PHP_EOL . 'Director: ' . $movieDirector . PHP_EOL))
							->once

			->if(
				$this->newTestedInstance
					->movieTitleIs($movieTitle)
						->movieDirectorIs($movieDirector)
							->dataConsumerIs($dataConsumer)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('Title: ' . $movieTitle . PHP_EOL . 'Director: ' . $movieDirector . PHP_EOL))
							->twice
		;
	}
}
