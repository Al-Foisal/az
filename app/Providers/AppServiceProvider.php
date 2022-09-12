<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $site = SiteSetting::first();
        view()->share('site', $site);
        
        $message = Message::orderBy('id', 'desc')->get();
        view()->share('message', $message);
    }
}
