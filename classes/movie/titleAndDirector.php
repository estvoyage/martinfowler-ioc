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

	function movieDirectorIsAskedByMovieLister(movie\lister $movieLister)
	{
		$movieLister->movieDirectorIs($this->director);

		return $this;
	}

	function movieTitleIsAskedByMovieLister(movie\lister $movieLister)
	{
		$movieLister->movieTitleIs($this->title);

		return $this;
	}
}
