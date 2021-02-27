<?php

namespace App\Providers;

use App\Events\ProductPurchased;
use App\Listeners\AwardAchievements;
use App\Listeners\SendShareableCoupon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * override shouldDiscoverEvents method
     * make Laravel scan listeners direectory for listeners
     * looks for any handle method on an event
     * 
     * pitfalls to this approach - no explicit decleration (unable to see registereed events)
     * use the following cmmand to see registered events
     * php artisan event:list to se
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
