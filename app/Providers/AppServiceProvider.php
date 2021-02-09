<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('REDIRECT_HTTPS')){
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(env('REDIRECT_HTTPS')){
            $url->formatScheme('https');
        }

        $notifications_numb = Notification::count();

        view()->share('notifications_numb', $notifications_numb);
        
        Paginator::useBootstrap();


    }
}
