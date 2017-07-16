<?php

namespace Kneu\Portfolio\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Kneu\Portfolio\Events\Event' => [
            'Kneu\Portfolio\Listeners\EventListener',
        ],

        \SocialiteProviders\Manager\SocialiteWasCalled::class  => [
            '\SocialiteProviders\Kneu\KneuExtendSocialite@handle',
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

        //
    }
}
