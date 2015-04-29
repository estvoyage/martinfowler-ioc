<?php

namespace estvoyage\martinfowler\ioc\finder;

use
	estvoyage\data,
	estvoyage\martinfowler\ioc
;

class titleAndDirector implements ioc\finder, ioc\movie\title\consumer, ioc\movie\director\consumer
{
	private
		$movieTitleCriteria,
		$movieTitle,
		$movieDirectorCriteria,
		$movieDirector,
		$destinationLibrary
	;

	function __construct(ioc\movie\title $movieTitleCriteria, ioc\movie\director $movieDirectorCriteria, ioc\library $destinationLibrary)
	{
		$this->movieTitleCriteria = $movieTitleCriteria;
		$this->movieDirectorCriteria = $movieDirectorCriteria;
		$this->destinationLibrary = $destinationLibrary;
	}

	function newMovie(ioc\movie $movie)
	{
		(new self($this->movieTitleCriteria, $this->movieDirectorCriteria, $this->destinationLibrary))
			->askTitleAndDirectoryToMovie($movie)
		;

		return $this;
	}

	function movieTitleIs(ioc\movie\title $movieTitle)
	{
		if ($this->destinationLibrary)
		{
			$this->movieTitle = $movieTitle;
		}

		return $this;
	}

	function movieDirectorIs(ioc\movie\director $movieDirector)
	{
		if ($this->destinationLibrary)
		{
			$this->movieDirector = $movieDirector;
		}

		return $this;
	}

	function newLibrary(ioc\library $library)
	{
		$library->movieFinderIs($this);

		return $this;
	}

	private function askTitleAndDirectoryToMovie(ioc\movie $movie)
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
