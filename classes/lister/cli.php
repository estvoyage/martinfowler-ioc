<?php

namespace estvoyage\movie\lister;

use
	estvoyage\movie
;

class cli implements movie\lister
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

	function newMovieListerProvider(movie\lister\provider $movieListerProvider)
	{
		$lister = new self;

		$movieListerProvider->movieTitleIsAskedByMovieLister($lister);
		$movieListerProvider->movieDirectorIsAskedByMovieLister($lister);

		echo 'Title: ' . ($lister->movieTitle ?: 'n/a') . PHP_EOL;
		echo 'Director: ' . ($lister->movieDirector ?: 'n/a') . PHP_EOL;

		return $this;
	}
}
