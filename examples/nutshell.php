<?php

require __DIR__ . '/../vendor/autoload.php';

use
	estvoyage\data,
	estvoyage\martinfowler\ioc
;

(new ioc\finder\titleAndDirector(new ioc\movie\title('Gladiator'), new ioc\movie\director('Ridley Scott'), new ioc\vod\client\basket))
	->newMovieContainer(
		(new ioc\vod\catalog)
			->newMovie(new ioc\movie\titleAndDirector(new ioc\movie\title('Alien'), new ioc\movie\director('Ridley Scott')))
			->newMovie(new ioc\movie\titleAndDirector(new ioc\movie\title('Interstellar'), new ioc\movie\director('Christopher Nolan')))
			->newMovie(new ioc\movie\titleAndDirector(new ioc\movie\title('Gladiator'), new ioc\movie\director('Ridley Scott')))
	)
	->movieConsumerIs(new ioc\lister\titleAndDirector(new data\consumer\console\cli))
;
