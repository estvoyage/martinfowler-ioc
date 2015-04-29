<?php

namespace estvoyage\martinfowler\ioc\movie\title;

use
	estvoyage\martinfowler\ioc\movie
;

interface consumer
{
	function movieTitleIs(movie\title $movieTitle);
}
