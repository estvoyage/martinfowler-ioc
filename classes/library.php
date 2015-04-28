<?php

namespace estvoyage\movie;

interface library
{
	function newMovie(movie $movie);
	function movieListerIs(lister $lister);
	function movieFinderIs(finder $finder);
}
