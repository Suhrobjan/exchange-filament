<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL; // ← ДОБАВИТЬ
use Illuminate\Support\ServiceProvider;
use App\View\Composers\TickerComposer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Принудительно HTTPS в production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('components.header', TickerComposer::class);
    }
}
