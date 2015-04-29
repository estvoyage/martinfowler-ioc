<?php

namespace estvoyage\martinfowler\ioc;

interface finder
{
	function newMovie(movie $movie);
	function newMovieContainer(movie\container $movieContainer);
}
