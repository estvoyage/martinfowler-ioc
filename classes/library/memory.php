<?php

namespace estvoyage\movie\library;

use
	estvoyage\movie
;

class memory implements movie\library
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
		$this->movies[] = $movie;

		return $this;
	}

	function movieFinderIs(movie\finder $movieFinder)
	{
		foreach ($this->movies as $movie)
		{
			$movieFinder->newMovie($movie);
		}

		return $this;
	}
}
