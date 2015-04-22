<?php

namespace estvoyage\movie\lister;

use
	estvoyage\movie
;

class cli
{
	private
		$movieTitle,
		$movieDirector
	;

	function movieDirectorIs(movie\movie\director $movieDirector)
	{
		$this->movieDirector = $movieDirector;

		return $this;
	}

	function movieTitleIs(movie\movie\title $movieTitle)
	{
		$this->movieTitle = $movieTitle;

		return $this;
	}
}
