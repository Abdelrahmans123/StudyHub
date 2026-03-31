<?php

namespace App\Repository\Admin;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use App\Repository\Admin\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAll()
    {
        return Course::all();
    }

    public function getInstructors()
    {
        return Instructor::all();
    }

    public function store($request)
    {

        $image = $request->file('file_name');
        $fileName = $image->getClientOriginalName();

        $course = new Course;
        $course->name = $request->courseName;
        $course->description = $request->description;
        $course->img = $fileName;
        $course->startAt = $request->courseStart;
        $course->endAt = $request->courseEnd;
        $course->instructor_id = $request->instructorId;
        $course->adminId = Auth::id();
        $course->save();

        $request->file_name->move(public_path('assets/images'), $fileName);

        return redirect('admin/courses')->with('success', 'Course added successfully');
    }

    public function update($request)
    {
        $id = $request->id;

        $course = Course::find($id);
        $course->name = $request->courseName;
        $course->description = $request->description;
        $course->startAt = $request->courseStart;
        $course->endAt = $request->courseEnd;
        $course->instructor_id = $request->instructorId;
        $course->adminId = Auth::id();

        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('assets/images'), $imageName);

        $course->save();

        return redirect('admin/courses')->with('success', 'Course updated successfully');
    }

    public function destroy($request)
    {
        $course = Course::find($request->id);
        $course->delete();

        return redirect('admin/courses')->with('success', 'Course deleted successfully');
    }
}
