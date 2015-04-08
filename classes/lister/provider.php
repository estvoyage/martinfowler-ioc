<?php

namespace estvoyage\movie\lister;

use
	estvoyage\movie
;

interface provider
{
	function movieDirectorIsAskedByMovieLister(movie\lister $lister);
	function movieTitleIsAskedByMovieLister(movie\lister $lister);
}
