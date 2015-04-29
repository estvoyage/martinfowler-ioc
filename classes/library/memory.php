<?php

namespace estvoyage\martinfowler\ioc\library;

use
	estvoyage\martinfowler\ioc
;

class memory implements ioc\library
{
	private
		$movies
	;

	function __construct(ioc\movie... $movies)
	{
		$this->movies = $movies;
	}

	function newMovie(ioc\movie $movie)
	{
		$this->movies[] = $movie;

		return $this;
	}

	function movieFinderIs(ioc\finder $movieFinder)
	{
		foreach ($this->movies as $movie)
		{
			$movieFinder->newMovie($movie);
		}

		return $this;
	}

	function movieListerIs(ioc\lister $movieLister)
	{
		foreach ($this->movies as $movie)
		{
			$movieLister->newMovie($movie);
		}

		return $this;
	}
}
