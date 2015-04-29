<?php

namespace estvoyage\martinfowler\ioc\movie;

use
	estvoyage\martinfowler\ioc
;

class titleAndDirector implements ioc\movie
{
	private
		$director,
		$title
	;

	function __construct(ioc\movie\title $title, ioc\movie\director $director)
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
