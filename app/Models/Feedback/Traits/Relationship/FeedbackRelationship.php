<?php

namespace App\Models\Feedback\Traits\Relationship;

use App\Models\FeedbackLanguage\FeedbackLanguage;

/**
 * Trait FeedbackRelationship
 * 
 * @package App\Models\Feedback\Traits\Relationship
 */
trait FeedbackRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(FeedbackLanguage::class, 'feedback_id', 'id');
    }
}
