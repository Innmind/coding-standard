# coding-standard

[![Build Status](https://github.com/innmind/coding-standard/workflows/CI/badge.svg)](https://github.com/innmind/coding-standard/actions?query=workflow%3ACI)

This project contains the coding standard rules for the Innmind organization.

## Installation

```sh
composer require --dev innmind/coding-standard
```

## Usage

Create a file `.php_cs.dist` at the root of the repository with the following content:

```php
<?php

return \Innmind\CodingStandard\CodingStandard::config();
```

You can then run `vendor/bin/php-cs-fixer fix` to fix the code.
