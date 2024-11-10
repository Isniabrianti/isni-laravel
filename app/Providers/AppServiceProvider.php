<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Telegram\TelegramExtendSocialite;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\TelegramProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        if(env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        // Define a gate that checks if the user is an admin
        Gate::define('admin', function ($user) {
            return $user->role === 'admin'; // Pastikan Anda memiliki kolom 'role' di tabel 'users'
        });

        // Registering the telegram driver for Socialite
        Socialite::extend('telegram', function ($app) {
            $config = $app['config']['services.telegram'];

            return Socialite::buildProvider(TelegramProvider::class, $config);
        });
    }


}
