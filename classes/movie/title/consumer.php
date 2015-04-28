<?php

namespace estvoyage\movie\movie\title;

use
	estvoyage\movie\movie
;

interface consumer
{
	function movieTitleIs(movie\title $movieTitle);
}
