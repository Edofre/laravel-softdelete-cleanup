# Laravel Softdelete Cleanup

[![Latest Stable Version](https://poser.pugx.org/edofre/laravel-softdelete-cleanup/v/stable)](https://packagist.org/packages/edofre/laravel-softdelete-cleanup)
[![Total Downloads](https://poser.pugx.org/edofre/laravel-softdelete-cleanup/downloads)](https://packagist.org/packages/edofre/laravel-softdelete-cleanup)
[![Latest Unstable Version](https://poser.pugx.org/edofre/laravel-softdelete-cleanup/v/unstable)](https://packagist.org/packages/edofre/laravel-softdelete-cleanup)
[![License](https://poser.pugx.org/edofre/laravel-softdelete-cleanup/license)](https://packagist.org/packages/edofre/laravel-softdelete-cleanup)
[![composer.lock](https://poser.pugx.org/edofre/laravel-softdelete-cleanup/composerlock)](https://packagist.org/packages/edofre/laravel-softdelete-cleanup)
[![Build Status](https://travis-ci.org/Edofre/laravel-softdelete-cleanup.svg?branch=master)](https://travis-ci.org/Edofre/laravel-softdelete-cleanup)
[![Code Climate](https://codeclimate.com/github/Edofre/laravel-softdelete-cleanup/badges/gpa.svg)](https://codeclimate.com/github/Edofre/laravel-softdelete-cleanup)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/laravel-softdelete-cleanup
```

or add

```
"edofre/laravel-softdelete-cleanup": "V1.2.0"
```

to the ```require``` section of your `composer.json` file.

## Configuration

Add the console command to the $commands array in your /app/Console/Kernel.php
```php
protected $commands = [
        \Edofre\SoftdeleteCleanup\SoftdeleteCleanup::class,
    ];

```

## Executing

The following command will then remove all the trashed items from the User, note that the User model is not in the default namespace.
```
php artisan db:softdelete-cleanup App\\Models\\User
```

## Tests

Run the tests by executing the following command:
```
composer test
```

## Feature requests

* Set the number of days from which the items should be deleted
* ?
