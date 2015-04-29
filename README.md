# *estvoyage\martinfowler\ioc*

## An east-oriented rewrite of [Martin Fowler](http://martinfowler.com) naive example of [inversion of control](http://martinfowler.com/articles/injection.html), written in PHP!

This repository contains a rewrite of the implementation of Martin Fowler about inversion of control and depedency injection container.
It was designed using the east compass already used by [James Ladd](http://jamesladdcode.com) to [rewrite](http://jamesladdcode.com/2007/02/02/draft-a-design-compass-east-oriented/) Martin's Fowler implementation in east oriented-manner, but in this version, all public method in all classes return `$this` and only `$this`.
Moreover, all messages are declarative instead of imperative: each object describe in each messages it send its requirements instead of tell to the callee that it should do.
Why? Because the rigorous application of this unique rule decreases coupling and the amount of code that needs to be written, while increasing the clarity, cohesion, flexibility, reuse and testability of that code.  
In fact, using east-oriented principle and declarative paradigm greatly increase abstraction level, and the most abstraction level is high, the most object oriented programming is powerful!

## Installation

Minimal PHP version to use *estvoyage\martinfowler\ioc* is 5.6.  
The recommended way to install it through [Composer](http://getcomposer.org/), just clone the repository and execute `php composer.phar install`.

## Usage

A working script is available in the bundled `examples` directory, just do `php examples/nutshell.php` to execute it.

## Unit Tests

Setup the test suite using Composer:

    $ composer install --dev

Run it using **atoum**:

    $ vendor/bin/atoum

## Contributing

See the bundled `CONTRIBUTING` file for details.

## License

*estvoyage\martinfowler\ioc* is released under the FreeBSD License, see the bundled `COPYING` file for details.
