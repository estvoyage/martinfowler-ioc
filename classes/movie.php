<?php

namespace estvoyage\movie;

interface movie
{
	function movieDirectorIsAskedByMovieConsumer(movie\consumer $movieConsumer);
	function movieTitleIsAskedByMovieConsumer(movie\consumer $movieConsumer);
}
