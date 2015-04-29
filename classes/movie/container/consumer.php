<?php

namespace estvoyage\martinfowler\ioc\movie\container;

use
	estvoyage\martinfowler\ioc
;

interface consumer
{
	function newMovieContainer(ioc\movie\container $movieContainer);
}
