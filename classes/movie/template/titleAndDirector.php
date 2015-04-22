<?php

namespace estvoyage\movie\movie\template;

use
	estvoyage\data,
	estvoyage\movie\movie
;

class titleAndDirector implements movie\consumer
{
	private
		$dataConsumer,
		$movieTitle,
		$movieDirector
	;

	function __construct(data\consumer $dataConsumer)
	{
		$this->dataConsumer = $dataConsumer;
		$this->movieTitle = new movie\title('n\a');
		$this->movieDirector = new movie\director('n\a');
	}

	function movieTitleIs(movie\title $movieTitle)
	{
		$this->movieTitle = $movieTitle;

		return $this;
	}

	function movieDirectorIs(movie\director $movieDirector)
	{
		$this->movieDirector = $movieDirector;

		return $this;
	}

	function movieIs(movie $movie)
	{
		$template = new self($this->dataConsumer);

		$movie->movieTitleIsAskedByMovieConsumer($template);
		$movie->movieDirectorIsAskedByMovieConsumer($template);

		$template->noMoreMovieData();

		return $this;
	}

	private function noMoreMovieData()
	{
		$this->dataConsumer
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
