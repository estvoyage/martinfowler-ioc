<?php

namespace estvoyage\movie\finder;

use
	estvoyage\data,
	estvoyage\movie
;

class titleAndDirector implements movie\finder, movie\movie\title\consumer, movie\movie\director\consumer
{
	private
		$movieTitleCriteria,
		$movieTitle,
		$movieDirectorCriteria,
		$movieDirector,
		$destinationLibrary
	;

	function __construct(movie\movie\title $movieTitleCriteria, movie\movie\director $movieDirectorCriteria, movie\library $destinationLibrary)
	{
		$this->movieTitleCriteria = $movieTitleCriteria;
		$this->movieDirectorCriteria = $movieDirectorCriteria;
		$this->destinationLibrary = $destinationLibrary;
	}

	function newMovie(movie\movie $movie)
	{
		(new self($this->movieTitleCriteria, $this->movieDirectorCriteria, $this->destinationLibrary))
			->askTitleAndDirectoryToMovie($movie)
		;

		return $this;
	}

	function movieTitleIs(movie\movie\title $movieTitle)
	{
		if ($this->destinationLibrary)
		{
			$this->movieTitle = $movieTitle;
		}

		return $this;
	}

	function movieDirectorIs(movie\movie\director $movieDirector)
	{
		if ($this->destinationLibrary)
		{
			$this->movieDirector = $movieDirector;
		}

		return $this;
	}

	function newLibrary(movie\library $library)
	{
		$library->movieFinderIs($this);

		return $this;
	}

	private function askTitleAndDirectoryToMovie(movie\movie $movie)
	{
		$movie->movieTitleIsAskedBy($this);
		$movie->movieDirectorIsAskedBy($this);

		if (
			$this->movieTitle == $this->movieTitleCriteria
			&&
			$this->movieDirector == $this->movieDirectorCriteria
		)
		{
			$this->destinationLibrary->newMovie($movie);
		}

		return $this;
	}
}
