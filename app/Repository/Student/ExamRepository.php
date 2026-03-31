<?php

namespace App\Repository\Student;

use App\Models\Quiz;
use App\Repository\Student\Interfaces\ExamRepositoryInterface;

class ExamRepository implements ExamRepositoryInterface
{
    public function getExams()
    {
        return Quiz::where('courseId', auth()->user()->courseId)->get();
    }
}
