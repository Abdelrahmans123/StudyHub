<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Repository\Instructor\Interfaces\CourseRepositoryInterface;

class CourseController extends Controller
{
    protected CourseRepositoryInterface $course;

    public function __construct(CourseRepositoryInterface $course)
    {
        $this->course = $course;
    }

    public function show($id)
    {
        $courses = $this->course->find($id);

        return view('Pages.Instructor.Response.show', compact('courses'));
    }
}
