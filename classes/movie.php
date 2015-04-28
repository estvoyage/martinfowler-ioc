<?php

namespace estvoyage\movie;

interface movie
{
	function movieDirectorIsAskedBy(movie\director\consumer $movieDirectorConsumer);
	function movieTitleIsAskedBy(movie\title\consumer $movieTitleConsumer);
}
