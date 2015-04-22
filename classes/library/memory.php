<?php

namespace estvoyage\movie\library;

use
	estvoyage\movie
;

class memory
{
	private
		$movies
	;

	function __construct(movie\movie... $movies)
	{
		$this->movies = $movies;
	}

	function newMovie(movie\movie $movie)
	{
		$library = clone $this;
		$library->movies[] = $movie;

		return $library;
	}
}
