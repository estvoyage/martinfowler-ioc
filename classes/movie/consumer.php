<?php

namespace estvoyage\martinfowler\ioc\movie;

use
	estvoyage\martinfowler\ioc
;

interface consumer
{
	function newMovie(ioc\movie $movie);
}
