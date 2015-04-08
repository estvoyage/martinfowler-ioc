<?php

namespace estvoyage\movie\tests\units;

class test extends \atoum
{
	function beforeTestMethod($method)
	{
		$this->mockGenerator->allIsInterface();
	}
}
