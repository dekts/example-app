<?php

namespace App\Models\FeedbackLanguage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeedbackLanguage\Traits\Attribute\FeedbackLanguageAttribute;
use App\Casts\ArrayToString;

class FeedbackLanguage extends Model
{
    use HasFactory, FeedbackLanguageAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'feedback_id',
        'language_id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'feedback_languages';
    }
}
