<?php

namespace estvoyage\movie;

interface lister
{
	function movieDirectorIs(movie\director $movieDirector);
	function movieTitleIs(movie\title $movieTitle);
	function newMovie(movie $movie);
}