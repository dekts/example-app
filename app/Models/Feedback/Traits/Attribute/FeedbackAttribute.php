<?php

namespace App\Models\Feedback\Traits\Attribute;

/**
 * Trait FeedbackAttribute.
 */
trait FeedbackAttribute
{
    /**
     * @param $value
     * @return string
     */
    public function getGenderAttribute($value) {
        switch($value) {
            case('m'):
                return "Male";
                break;
            case('f'):
                return "Female";
                break;
            default:
                return "-";
                break;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getWillingToWorkAttribute($value) {
        switch($value) {
            case(0):
                return "No";
                break;
            case(1):
                return "Yes";
                break;
            default:
                return "-";
                break;
        }
    }
}