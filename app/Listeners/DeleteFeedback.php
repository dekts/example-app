<?php

namespace App\Listeners;

use App\Events\FeedbackDeleted;
use App\Models\FeedbackLanguage\FeedbackLanguage;
use Log;

class DeleteFeedback
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FeedbackDeleted  $event
     * @return void
     */
    public function handle(FeedbackDeleted $event)
    {
        // Access the feedback using $event->feedback...
        $ids = $event->feedback->languages->pluck('id');
        FeedbackLanguage::destroy($ids);
    }
}