<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use setasign\Fpdi\Fpdi;

class FPDIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Fpdi::class, function ($app) {
            return new Fpdi();
        });
    }
}
