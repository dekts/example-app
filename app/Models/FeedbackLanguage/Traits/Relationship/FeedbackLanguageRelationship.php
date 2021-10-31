<?php

namespace App\Models\FeedbackLanguage\Traits\Relationship;

use App\Models\FeedbackLanguage\FeedbackLanguage;

/**
 * Trait FeedbackRelationship
 * 
 * @package App\Models\Feedback\Traits\Relationship
 */
trait FeedbackLanguageRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(FeedbackLanguage::class, 'feedback_id', 'id');
    }
}
