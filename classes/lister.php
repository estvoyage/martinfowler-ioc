<?php

namespace estvoyage\martinfowler\ioc;

interface lister
{
	function movieDirectorIs(movie\director $movieDirector);
	function movieTitleIs(movie\title $movieTitle);
	function newMovie(movie $movie);
}
