<?php

namespace estvoyage\movie\tests\units\movie;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units
;

class title extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->extends('estvoyage\value\string\notEmpty')
		;
	}
}
