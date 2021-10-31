<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feedback\Traits\Attribute\FeedbackAttribute;
use App\Models\Feedback\Traits\Relationship\FeedbackRelationship;
use App\Events\FeedbackSaved;
use App\Events\FeedbackDeleted;

class Feedback extends Model
{
    use HasFactory, FeedbackAttribute, FeedbackRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'age',
        'gender',
        'willing_to_work'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => FeedbackSaved::class,
        'deleted' => FeedbackDeleted::class,
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'feedbacks';
    }
}
