<?php

namespace App\Repository\Student;

use App\Models\Quiz;
use App\Repository\Student\Interfaces\ExamRepositoryInterface;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exam=Quiz::where('courseId',auth()->user()->courseId)->get();

        return view('Pages.Student.Exam.index',compact('exam'));
    }

    public function show($id)
    {
        $studentId=auth()->user()->id;
        return view('Pages.Student.Exam.Question.index',compact('id','studentId'));
    }
}
