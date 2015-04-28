<?php

namespace estvoyage\movie\tests\units\library;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units,
	mock\estvoyage\movie as mockOfMovie
;

class memory extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\library')
		;
	}

	function testNewMovie()
	{
		$this
			->given(
				$movie = new mockOfMovie\movie
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->newMovie($movie))
					->isTestedInstance
					->isEqualTo($this->newTestedInstance($movie))
		;
	}

	function testMovieFinderIs()
	{
		$this
			->given(
				$movieFinder = new mockOfMovie\finder
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieFinderIs($movieFinder))->isTestedInstance

			->if(
				$this->testedInstance
					->newMovie($movie1 = new mockOfMovie\movie)
						->movieFinderIs($movieFinder)
			)
			->then
				->mock($movieFinder)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->once

			->if(
				$this->testedInstance
					->newMovie($movie2 = new mockOfMovie\movie)
						->movieFinderIs($movieFinder)
			)
			->then
				->mock($movieFinder)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->twice
					->receive('newMovie')
						->withIdenticalArguments($movie2)
							->once
		;
	}

	function testMovieListerIs()
	{
		$this
			->given(
				$movieLister = new mockOfMovie\lister
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieListerIs($movieLister))->isTestedInstance

			->if(
				$this->testedInstance
					->newMovie($movie1 = new mockOfMovie\movie)
						->movieListerIs($movieLister)
			)
			->then
				->mock($movieLister)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->once

			->if(
				$this->testedInstance
					->newMovie($movie2 = new mockOfMovie\movie)
						->movieListerIs($movieLister)
			)
			->then
				->mock($movieLister)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->twice
					->receive('newMovie')
						->withIdenticalArguments($movie2)
							->once
		;
	}
}
