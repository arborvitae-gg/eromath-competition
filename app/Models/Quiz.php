<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /** @use HasFactory<\Database\Factories\QuizFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'category',
        'start_time', 'is_submitted', 'score',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
