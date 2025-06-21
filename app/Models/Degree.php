<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Degree extends Model
{
    use HasFactory;

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class, 'studentId');
    }
    public function quiz(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quizId');
    }
    public function question(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Question::class, 'questionId');
    }
}
