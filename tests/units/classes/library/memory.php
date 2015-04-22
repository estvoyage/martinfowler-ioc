<?php

namespace estvoyage\movie\tests\units\library;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units,
	mock\estvoyage\movie as mockOfMovie
;

class memory extends units\test
{
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
}
