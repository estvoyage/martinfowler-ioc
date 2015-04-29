<?php

namespace estvoyage\martinfowler\ioc;

interface movie
{
	function movieDirectorIsAskedBy(movie\director\consumer $movieDirectorConsumer);
	function movieTitleIsAskedBy(movie\title\consumer $movieTitleConsumer);
}
