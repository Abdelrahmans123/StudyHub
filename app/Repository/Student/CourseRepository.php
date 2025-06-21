<?php

namespace App\Repository\Student;

use App\Models\Course;
use App\Models\Student;
use App\Repository\Student\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{

    public function index()
    {
        $course=Course::all();
        return view('Pages.Student.Course.index',compact('course'));
    }

    public function enroll($id)
    {
        $student=Student::findOrFail(auth()->user()->id);
        $student->courseId=$id;
        $student->save();
        return redirect()->route('student.course.index')->with('success','Course is Enrolled Successfully');
    }
    public function recentCourse($id){
        $course=Course::find($id);
        return view('Pages.Student.Course.show',compact('course'));
    }
}
