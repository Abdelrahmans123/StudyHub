<?php

namespace App\Repository\Instructor;

use App\Models\Course;
use App\Repository\Instructor\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function show($id)
    {
        $courses=Course::find($id);
        return view('Pages.Instructor.Response.show',compact('courses'));
    }
}
