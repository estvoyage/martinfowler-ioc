<?php

namespace estvoyage\movie\tests\units\lister;

require __DIR__ . '/../../runner.php';

use
	estvoyage\movie\tests\units,
	estvoyage\movie\movie,
	estvoyage\movie\movie\director,
	estvoyage\movie\movie\title,
	mock\estvoyage\movie as mockOfMovie
;

class cli extends units\test
{
	function testMovieDirectorIs()
	{
		$this
			->given(
				$director = new director(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieDirectorIs($director))
					->isTestedInstance
		;
	}

	function testMovieTitleIs()
	{
		$this
			->given(
				$title = new title(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->movieTitleIs($title))
					->isTestedInstance
		;
	}
}
