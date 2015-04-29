<?php

namespace estvoyage\martinfowler\ioc\movie\director;

use
	estvoyage\martinfowler\ioc\movie
;

interface consumer
{
	function movieDirectorIs(movie\director $movieDirector);
}
