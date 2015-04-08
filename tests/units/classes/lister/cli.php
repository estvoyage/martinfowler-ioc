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
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\movie\lister')
		;
	}

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

	function testNewMovieListerProvider()
	{
		$this
			->given(
				$movieDirector = new director(uniqid()),
				$movieTitle = new title(uniqid()),
				$listerProvider = new mockOfMovie\lister\provider,
				$this->calling($listerProvider)->movieDirectorIsAskedByMovieLister = function($lister) use ($movieDirector) {
					$lister->movieDirectorIs($movieDirector);
				},
				$this->calling($listerProvider)->movieTitleIsAskedByMovieLister = function($lister) use ($movieTitle) {
					$lister->movieTitleIs($movieTitle);
				}
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->output(function() use ($listerProvider) {
						$this->object($this->testedInstance->newMovieListerProvider($listerProvider))
							->isTestedInstance
						;
					}
				)
				->isEqualTo(
					'Title: ' . $movieTitle . PHP_EOL .
					'Director: ' . $movieDirector . PHP_EOL
				)

			->if(
				$this->calling($listerProvider)->movieDirectorIsAskedByMovieLister->doesNothing,
				$this->calling($listerProvider)->movieTitleIsAskedByMovieLister->doesNothing
			)
			->then
				->output(function() use ($listerProvider) {
						$this->testedInstance->newMovieListerProvider($listerProvider);
					}
				)
				->isEqualTo(
					'Title: n/a' . PHP_EOL .
					'Director: n/a' . PHP_EOL
				)
		;
	}
}
