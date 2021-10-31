<?php

namespace App\Events;

use App\Models\Feedback\Feedback;
use Illuminate\Queue\SerializesModels;

class FeedbackSaved
{
    use SerializesModels;

    public $feedback;

    /**
     * Create a new event instance.
     *
     * @param  Feedback  $feedback
     * @return void
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }
}