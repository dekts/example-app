<?php

namespace App\Models\FeedbackLanguage\Traits\Attribute;

/**
 * Trait FeedbackLanguageAttribute.
 */
trait FeedbackLanguageAttribute
{
    /**
     * @param $value
     * @return string
     */
    public function getLanguageIdAttribute($value) {
        switch($value) {
            case(1):
                return "English";
                break;
            case(2):
                return "Hindi";
                break;
            case(3):
                return "Gujarati";
                break;
            default:
                return "-";
                break;
        }
    }
}