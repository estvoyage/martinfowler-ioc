<?php

namespace estvoyage\martinfowler\ioc\vod\movie;

use
	estvoyage\martinfowler\ioc
;

abstract class container implements ioc\movie\container
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

	function movieConsumerIs(ioc\movie\consumer $movieConsumer)
	{
		foreach ($this->movies as $movie)
		{
			$movieConsumer->newMovie($movie);
		}

		return $this;
	}
}
