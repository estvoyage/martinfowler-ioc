<?php

namespace estvoyage\movie;

class movie implements lister\provider
{
	private
		$director,
		$title
	;

	function __construct(movie\director $director, movie\title $title)
	{
		$this->director = $director;
		$this->title = $title;
	}

	function movieDirectorIsAskedByMovieLister(lister $lister)
	{
		$lister->movieDirectorIs($this->director);

		return $this;
	}

	function movieTitleIsAskedByMovieLister(lister $lister)
	{
		$lister->movieTitleIs($this->title);

		return $this;
	}
}
