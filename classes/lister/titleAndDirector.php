<?php

namespace estvoyage\martinfowler\ioc\lister;

use
	estvoyage\data,
	estvoyage\martinfowler\ioc
;

class titleAndDirector implements ioc\movie\consumer, ioc\movie\title\consumer, ioc\movie\director\consumer
{
	private
		$dataConsumer,
		$movie,
		$movieTitle,
		$movieDirector
	;

	function __construct(data\consumer $dataConsumer)
	{
		$this->dataConsumer = $dataConsumer;
		$this->movieTitle = new ioc\movie\title('n\a');
		$this->movieDirector = new ioc\movie\director('n\a');
	}

	function movieTitleIs(ioc\movie\title $movieTitle)
	{
		if ($this->movie)
		{
			$this->movieTitle = $movieTitle;
		}

		return $this;
	}

	function movieDirectorIs(ioc\movie\director $movieDirector)
	{
		if ($this->movie)
		{
			$this->movieDirector = $movieDirector;
		}

		return $this;
	}

	function newMovie(ioc\movie $movie)
	{
		(new self($this->dataConsumer))
			->askTitleAndDirectoryToMovie($movie)
		;

		return $this;
	}

	private function askTitleAndDirectoryToMovie(ioc\movie $movie)
	{
		$this->movie = $movie;

		$movie->movieTitleIsAskedBy($this);
		$movie->movieDirectorIsAskedBy($this);

		$this->dataConsumer
			->newData(
				new data\data(
					'Title: ' . $this->movieTitle .
					PHP_EOL .
					'Director: ' . $this->movieDirector .
					PHP_EOL .
					PHP_EOL
				)
			)
		;

		return $this;
	}
}
