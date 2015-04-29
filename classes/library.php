<?php

namespace estvoyage\martinfowler\ioc;

interface library
{
	function newMovie(movie $movie);
	function movieListerIs(lister $lister);
	function movieFinderIs(finder $finder);
}
