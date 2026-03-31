<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\Student\Interfaces\ExamRepositoryInterface;

use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    protected ExamRepositoryInterface $repository;

    public function __construct(ExamRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $exam = $this->repository->getExams();

        return view('Pages.Student.Exam.index', compact('exam'));
    }

    public function show($id)
    {
        $studentId = Auth::id();

        return view('Pages.Student.Exam.Question.index', compact('id', 'studentId'));
    }
}
