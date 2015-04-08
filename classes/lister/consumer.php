<?php

namespace estvoyage\movie\lister;

use
	estvoyage\movie
;

interface consumer
{
	function movieListerIs(movie\lister $movieLister);
}
