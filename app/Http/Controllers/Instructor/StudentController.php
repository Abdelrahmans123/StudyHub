<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();

        return view('Pages.Instructor.Student.index', compact('student'));

    }
}
