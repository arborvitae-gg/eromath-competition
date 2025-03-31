<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'last_name', 'first_name', 'middle_name',
        'grade_level', 'school', 'coach_name', 'role',
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    // Relationships
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function createdQuestions()
    {
        return $this->hasMany(Question::class, 'created_by');
    }

    // prototype function, may change in the future
    // get quiz category based on grade level
    public function getQuizCategory() {
        $grade = $this->grade_level;

        return match(true) {
            $grade >= 3 && $grade <= 4 => 1,
            $grade >= 5 && $grade <= 6 => 2,
            $grade >= 7 && $grade <= 8 => 3,
            $grade >= 9 && $grade <= 10 => 4,
            $grade >= 11 && $grade <= 12 => 5,
            default => throw new \Exception('Invalid grade level for quiz category'),
        };
    }

    // // RegistrationRequest.php or ProfileUpdateRequest.php
    // public function rules() {
    // return [
    //     'grade_level' => 'required|integer|min:3|max:12', // Adjust range as needed
    // ];
}
