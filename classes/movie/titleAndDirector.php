<?php

namespace estvoyage\movie\movie;

use
	estvoyage\movie
;

class titleAndDirector implements movie\movie
{
	private
		$director,
		$title
	;

	function __construct(movie\movie\director $director, movie\movie\title $title)
	{
		$this->director = $director;
		$this->title = $title;
	}

	function movieDirectorIsAskedByMovieConsumer(consumer $consumer)
	{
		$consumer->movieDirectorIs($this->director);

		return $this;
	}

	function movieTitleIsAskedByMovieConsumer(consumer $consumer)
	{
		$consumer->movieTitleIs($this->title);

		return $this;
	}
}
