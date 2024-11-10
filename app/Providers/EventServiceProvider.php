<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled; // Tambahkan namespace ini untuk Socialite
use SocialiteProviders\Telegram\TelegramExtendSocialite;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            TelegramExtendSocialite::class,
        ],
    ]; 

    /**
     * Register any events for your application.
     *
     * @return void
     */
        public function boot()
    {
        parent::boot();

        // Tambahkan baris berikut untuk mendukung Telegram
        Event::listen(SocialiteWasCalled::class, function (SocialiteWasCalled $socialiteWasCalled) {
            $socialiteWasCalled->extendSocialite('telegram', TelegramExtendSocialite::class);
        });
    }
}
