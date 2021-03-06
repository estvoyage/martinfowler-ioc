<?php

namespace estvoyage\martinfowler\ioc\movie;

use
	estvoyage\martinfowler\ioc
;

interface container
{
	function newMovie(ioc\movie $movie);
	function movieConsumerIs(ioc\movie\consumer $movieConsumer);
}
