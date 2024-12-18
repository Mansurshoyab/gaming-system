<?php

namespace App\Providers;

use App\Events\MemberCreated;
use App\Events\UserCreated;
use App\Listeners\AdminListener;
use App\Listeners\GamerListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            AdminListener::class,
        ],
        MemberCreated::class => [
            GamerListener::class,
        ],
    ];
}
