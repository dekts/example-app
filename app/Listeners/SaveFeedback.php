<?php

namespace App\Listeners;

use App\Events\FeedbackSaved;
use App\Models\FeedbackLanguage\FeedbackLanguage;
use Log;

class SaveFeedback
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
     * @param  \App\Events\FeedbackSaved  $event
     * @return void
     */
    public function handle(FeedbackSaved $event)
    {
        // Access the feedback using $event->feedback...
        if (count(request()->language)) {
            $ids = $event->feedback->languages->pluck('id')->toArray();
            if (count($ids)) {
                FeedbackLanguage::destroy($ids);
            }

            $feedbackLanguage = [];
            foreach (request()->language as $key => $lookup) {
                $feedbackLanguage[] = new FeedbackLanguage([
                    'feedback_id' => $event->feedback->id,
                    'language_id' => $lookup
                ]);
            }
            $event->feedback->languages()->saveMany($feedbackLanguage);
        }
    }
}