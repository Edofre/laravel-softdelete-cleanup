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
