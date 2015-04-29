<?php

namespace estvoyage\martinfowler\ioc\tests\units\movie;

require __DIR__ . '/../../runner.php';

use
	estvoyage\martinfowler\ioc\tests\units
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
