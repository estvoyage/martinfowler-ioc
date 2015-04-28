<?php

namespace estvoyage\movie;

interface movie
{
	function movieDirectorIsAskedByMovieLister(lister $lister);
	function movieTitleIsAskedByMovieLister(lister $lister);
}
