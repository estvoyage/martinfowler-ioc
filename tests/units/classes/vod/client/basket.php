<?php

namespace estvoyage\martinfowler\ioc\tests\units\vod\client;

require __DIR__ . '/../../../runner.php';

use
	estvoyage\martinfowler\ioc\tests\units,
	mock\estvoyage\martinfowler\ioc as mockOfIoc
;

class basket extends units\test
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

	function testMovieConsumerIs()
	{
		$this
			->given(
				$movieConsumer = new mockOfIoc\movie\consumer
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieConsumerIs($movieConsumer))->isTestedInstance

			->if(
				$this->testedInstance
					->newMovie($movie1 = new mockOfIoc\movie)
						->movieConsumerIs($movieConsumer)
			)
			->then
				->mock($movieConsumer)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->once

			->if(
				$this->testedInstance
					->newMovie($movie2 = new mockOfIoc\movie)
						->movieConsumerIs($movieConsumer)
			)
			->then
				->mock($movieConsumer)
					->receive('newMovie')
						->withIdenticalArguments($movie1)
							->twice
					->receive('newMovie')
						->withIdenticalArguments($movie2)
							->once
		;
	}
}
