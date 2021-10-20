<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['web.user.layout.footer', 'web.user.layout.navbar'], 'App\View\Composers\ContactComposer');
        View::composer(['web.user.layout.navbar'], 'App\View\Composers\LaboratoriesComposer');
        View::composer(['*'], 'App\View\Composers\CoreComponentComposer');
    }
}
