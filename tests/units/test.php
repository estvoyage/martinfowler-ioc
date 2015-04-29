<?php

namespace estvoyage\martinfowler\ioc\tests\units;

class test extends \atoum
{
	function beforeTestMethod($method)
	{
		$this->mockGenerator->allIsInterface();
	}
}
