<?php

namespace estvoyage\movie\movie;

use
	estvoyage\data,
	estvoyage\movie\movie
;

interface template extends data\provider
{
	function movieTitleIs(movie\title $movieTitle);
	function movieTitleIsUnavailable();
	function movieDirectorIs(movie\director $movieDirector);
	function movieDirectorIsUnavailable();
}
