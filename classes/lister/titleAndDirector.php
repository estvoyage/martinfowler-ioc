<?php

namespace estvoyage\movie\lister;

use
	estvoyage\data,
	estvoyage\movie
;

class titleAndDirector implements movie\lister, movie\movie\title\consumer, movie\movie\director\consumer
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
		$this->movieTitle = new movie\movie\title('n\a');
		$this->movieDirector = new movie\movie\director('n\a');
	}

	function movieTitleIs(movie\movie\title $movieTitle)
	{
		if ($this->movie)
		{
			$this->movieTitle = $movieTitle;
		}

		return $this;
	}

	function movieDirectorIs(movie\movie\director $movieDirector)
	{
		if ($this->movie)
		{
			$this->movieDirector = $movieDirector;
		}

		return $this;
	}

	function newMovie(movie\movie $movie)
	{
		(new self($this->dataConsumer))
			->askTitleAndDirectoryToMovie($movie)
		;

		return $this;
	}

	private function askTitleAndDirectoryToMovie(movie\movie $movie)
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
