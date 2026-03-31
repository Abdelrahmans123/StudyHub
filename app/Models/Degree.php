<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Degree extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'studentId');
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quizId');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'questionId');
    }
}
