<?php

namespace Edofre\SoftdeleteCleanup;

class SoftdeleteCleanupServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SoftdeleteCleanup::class,
            ]);
        }
    }

    public function register()
    {
        // 
    }
}