<?php

namespace estvoyage\movie\library;

use
	estvoyage\movie
;

class memory implements movie\lister\consumer
{
	private
		$movies
	;

	function __construct(movie\movie... $movies)
	{
		$this->movies = $movies;
	}

	function movieListerIs(movie\lister $movieLister)
	{
		foreach ($this->movies as $movie)
		{
			$movieLister->newMovieListerProvider($movie);
		}

		return $this;
	}

	function newMovie(movie\movie $movie)
	{
		$library = clone $this;
		$library->movies[] = $movie;

		return $library;
	}
}
