<?php

namespace estvoyage\movie\movie\template;

use
	estvoyage\data,
	estvoyage\movie\movie
;

class titleAndDirector implements movie\template
{
	private
		$movieTitle,
		$movieDirector
	;

	function __construct(movie\title $movieTitle = null, movie\director $movieDirector = null)
	{
		$this->movieTitle = $movieTitle ?: new movie\title('n\a');
		$this->movieDirector = $movieDirector ?: new movie\director('n\a');
	}

	function newMovie()
	{
		return $this
			->movieTitleIsUnavailable()
			->movieDirectorIsUnavailable()
		;
	}

	function movieTitleIs(movie\title $movieTitle)
	{
		return new self($movieTitle, $this->movieDirector);
	}

	function movieTitleIsUnavailable()
	{
		return $this->movieTitleIs(new movie\title('n\a'));
	}

	function movieDirectorIs(movie\director $movieDirector)
	{
		return new self($this->movieTitle, $movieDirector);
	}

	function movieDirectorIsUnavailable()
	{
		return $this->movieDirectorIs(new movie\director('n\a'));
	}

	function dataConsumerIs(data\consumer $dataConsumer)
	{
		$dataConsumer
			->newData(
				new data\data(
					'Title: ' . $this->movieTitle . PHP_EOL
					.
					'Director: ' . $this->movieDirector . PHP_EOL
				)
			)
		;

		return $this;
	}
}
