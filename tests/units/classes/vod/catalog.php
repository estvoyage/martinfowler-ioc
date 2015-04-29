<?php

namespace estvoyage\martinfowler\ioc\tests\units\vod;

require __DIR__ . '/../../runner.php';

use
	estvoyage\martinfowler\ioc\tests\units,
	mock\estvoyage\martinfowler\ioc as mockOfIoc
;

class catalog extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\martinfowler\ioc\movie\container')
		;
	}

	function testNewMovie()
	{
		$this
			->given(
				$movie = new mockOfIoc\movie
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
				$movieFinder = new mockOfIoc\finder
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieFinderIs($movieFinder))->isTestedInstance

			->if(
				$this->testedInstance
					->newMovie($movie1 = new mockOfIoc\movie)
						->movieFinderIs($movieFinder)
			)
			->then
				->mock($movieFinder)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->once

			->if(
				$this->testedInstance
					->newMovie($movie2 = new mockOfIoc\movie)
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
				$movieLister = new mockOfIoc\lister
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieListerIs($movieLister))->isTestedInstance

			->if(
				$this->testedInstance
					->newMovie($movie1 = new mockOfIoc\movie)
						->movieListerIs($movieLister)
			)
			->then
				->mock($movieLister)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->once

			->if(
				$this->testedInstance
					->newMovie($movie2 = new mockOfIoc\movie)
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
