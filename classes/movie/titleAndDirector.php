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

	function movieDirectorIsAskedBy(director\consumer $movieDirectorConsumer)
	{
		$movieDirectorConsumer->movieDirectorIs($this->director);

		return $this;
	}

	function movieTitleIsAskedBy(title\consumer $movieTitleConsumer)
	{
		$movieTitleConsumer->movieTitleIs($this->title);

		return $this;
	}
}
