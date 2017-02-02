# Laravel Softdelete Cleanup
# WIP

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/laravel-softdelete-cleanup
```

or add

```
"edofre/laravel-softdelete-cleanup": "V1.0.0"
```

to the ```require``` section of your `composer.json` file.

## Configuration

Add the console command to the $commands array in your /app/Console/Kernel.php 
```php
protected $commands = [
        \App\Console\Commands\PermanentlyDelete::class,
    ];

```

## Executing

The following command will then remove all the trashed items from the User, note that the User model is not in the default namespace.
```
php artisan db:softdelete-cleanup App\\Models\\User
```

## Feature requests

* Set the number of days from which the items should be deleted
* ?