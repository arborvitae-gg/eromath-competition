<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    /** @use HasFactory<\Database\Factories\UserAnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'quiz_id', 'question_id', 
        'selected_choice', 'is_correct'
    ];

    // Relationships
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}