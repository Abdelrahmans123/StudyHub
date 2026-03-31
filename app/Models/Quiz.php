<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'courseId',
        'instructorId',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseId');
    }

    public function degrees()
    {
        return $this->hasMany(Degree::class, 'quizId');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quizId');
    }
}
