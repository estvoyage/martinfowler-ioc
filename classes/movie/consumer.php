<?php

namespace estvoyage\movie\movie;

use
	estvoyage\movie
;

interface consumer
{
	function movieDirectorIs(movie\movie\director $movieDirector);
	function movieTitleIs(movie\movie\title $movieTitle);
}
