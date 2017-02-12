<?php
namespace Edofre\SoftdeleteCleanup\Test;

use Edofre\SoftdeleteCleanup\SoftdeleteCleanup;
use Illuminate\Support\ServiceProvider;

/**
 * Class SoftdeleteCleanupTestServiceProvider
 * @package Edofre\SoftdeleteCleanup\Test
 */
class SoftdeleteCleanupTestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            SoftdeleteCleanup::class,
        ]);
    }
}