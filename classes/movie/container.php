<?php

namespace estvoyage\martinfowler\ioc\movie;

use
	estvoyage\martinfowler\ioc
;

interface container
{
	function newMovie(ioc\movie $movie);
	function movieListerIs(ioc\lister $lister);
	function movieFinderIs(ioc\finder $finder);
}
