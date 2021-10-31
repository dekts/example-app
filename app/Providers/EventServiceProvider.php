<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\FeedbackDeleted;
use App\Listeners\DeleteFeedback;
use App\Events\FeedbackSaved;
use App\Listeners\SaveFeedback;
use App\Events\FeedbackUpdated;
use App\Listeners\UpdateFeedback;

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
        ],
        FeedbackDeleted::class => [
            DeleteFeedback::class,
        ],
        FeedbackSaved::class => [
            SaveFeedback::class,
        ],
        FeedbackUpdated::class => [
            UpdateFeedback::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
