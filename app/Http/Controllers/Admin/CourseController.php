<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Repository\Admin\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected CourseRepositoryInterface $course;

    public function __construct(CourseRepositoryInterface $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->getAll();

        return view('Pages.Admin.Courses.index', compact('courses'));
    }

    public function create()
    {
        $instructors = $this->course->getInstructors();

        return view('Pages.Admin.Courses.create', compact('instructors'));
    }

    public function store(StoreCourseRequest $request)
    {
        return $this->course->store($request);
    }

    public function update(UpdateCourseRequest $request)
    {
        return $this->course->update($request);
    }

    public function edit(Course $course)
    {
        $instructors = $this->course->getInstructors();

        return view('Pages.Admin.Courses.edit', compact('course', 'instructors'));
    }

    public function destroy(Request $request)
    {
        return $this->course->destroy($request);
    }
}
