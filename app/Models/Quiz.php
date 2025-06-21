<?php

namespace App\Models;

use App\Models\Degree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;
    public function courses(){
        return $this->belongsTo(Course::class,'courseId');
    }
    public function degree()
    {
        return $this->hasMany(Degree::class,'quizId');
    }
}
