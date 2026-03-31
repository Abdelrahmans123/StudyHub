<?php

namespace App\Repository\Student;

use App\Models\Course;
use App\Models\Student;
use App\Repository\Student\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAll()
    {
        return Course::all();
    }

    public function enroll($id)
    {
        $student = Student::findOrFail(auth()->user()->id);
        $student->courseId = $id;
        $student->save();

        return redirect()->route('student.course.index')->with('success', 'Course is Enrolled Successfully');
    }

    public function find($id)
    {
        return Course::find($id);
    }
}
