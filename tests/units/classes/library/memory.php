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
			->implements('estvoyage\movie\lister\consumer')
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
					->isNotTestedInstance
					->isEqualTo($this->newTestedInstance($movie))
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
				->object($this->testedInstance->movieListerIs($movieLister))
					->isTestedInstance

			->given(
				$movie = new mockOfMovie\movie
			)
			->if(
				$this->testedInstance
					->newMovie($movie)
						->movieListerIs($movieLister)
			)
			->then
				->mock($movieLister)
					->receive('newMovieListerProvider')
						->withArguments($movie)
							->once
		;
	}
}
