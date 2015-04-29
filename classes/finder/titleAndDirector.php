<?php

namespace estvoyage\martinfowler\ioc\finder;

use
	estvoyage\data,
	estvoyage\martinfowler\ioc
;

class titleAndDirector implements ioc\movie\container, ioc\movie\container\consumer, ioc\movie\consumer, ioc\movie\title\consumer, ioc\movie\director\consumer
{
	private
		$movieTitleCriteria,
		$movieTitle,
		$movieDirectorCriteria,
		$movieDirector,
		$movieContainer
	;

	function __construct(ioc\movie\title $movieTitleCriteria, ioc\movie\director $movieDirectorCriteria, ioc\movie\container $movieContainer)
	{
		$this->movieTitleCriteria = $movieTitleCriteria;
		$this->movieDirectorCriteria = $movieDirectorCriteria;
		$this->movieContainer = $movieContainer;
	}

	function newMovie(ioc\movie $movie)
	{
		(new self($this->movieTitleCriteria, $this->movieDirectorCriteria, $this->movieContainer))
			->askTitleAndDirectoryToMovie($movie)
		;

		return $this;
	}

	function movieTitleIs(ioc\movie\title $movieTitle)
	{
		if ($this->movieContainer)
		{
			$this->movieTitle = $movieTitle;
		}

		return $this;
	}

	function movieDirectorIs(ioc\movie\director $movieDirector)
	{
		if ($this->movieContainer)
		{
			$this->movieDirector = $movieDirector;
		}

		return $this;
	}

	function movieConsumerIs(ioc\movie\consumer $movieConsumer)
	{
		$this->movieContainer->movieConsumerIs($movieConsumer);

		return $this;
	}

	function newMovieContainer(ioc\movie\container $movieContainer)
	{
		$movieContainer->movieConsumerIs($this);

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
			$this->movieContainer->newMovie($movie);
		}

		return $this;
	}
}
