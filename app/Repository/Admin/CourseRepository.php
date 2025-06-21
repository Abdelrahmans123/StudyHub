<?php

namespace App\Repository\Admin;

use App\Models\Course;
use App\Models\Instructor;

class CourseRepository implements Interfaces\CourseRepositoryInterface
{

    public function index()
    {
        $courses=Course::all();
        return view('Pages.Admin.Courses.index',compact('courses'));
    }

    public function create()
    {
        $instructors=Instructor::all();
        return view('Pages.Admin.Courses.create',compact('instructors'));
    }

    public function store($request)
    {
        $request->validate(
            [
                'courseName'=>'string|required',
                'description'=>'string|required',
                'courseStart'=>'required',
                'courseEnd'=>'required',
                'instructorId'=>'required|exists:instructors,id'
            ]
        );
        $image=$request->file('file_name');
        $fileName=$image->getClientOriginalName();
        $course=new Course();
        $course->name=$request->courseName;
        $course->description=$request->description;
        $course->img=$fileName;
        $course->startAt=$request->courseStart;
        $course->endAt=$request->courseEnd;
        $course->instructor_id=$request->instructorId;
        $course->adminId=auth()->user()->id;
        $course->save();
        $imageName=$request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('assets/images'),$imageName);
        return redirect('admin/courses')->with('success','Course added successfully');
    }
    public function update($request)
    {
        $id=$request->id;
        $request->validate(
            [
                'courseName'=>'string|required',
                'description'=>'string|required',
                'courseStart'=>'required',
                'courseEnd'=>'required',
                'instructorId'=>'required|exists:instructors,id'
            ]
        );
        $course=Course::find($id);
        $course->name=$request->courseName;
        $course->description=$request->description;
        $course->startAt=$request->courseStart;
        $course->endAt=$request->courseEnd;
        $course->instructor_id=$request->instructorId;
        $course->adminId=auth()->user()->id;
        $imageName=$request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('assets/images'),$imageName);
        $course->save();
        return redirect('admin/courses')->with('success','Course Updated successfully');
    }
    public function edit($id)
    {
        $instructors=Instructor::all();
       $course=Course::find($id);
       return view('Pages.Admin.Courses.edit',compact('course','instructors'));
    }
    public function destroy($request)
    {
       $course=Course::find($request->id);
       $course->delete();
        return redirect('admin/courses')->with('success','Course Deleted successfully');
    }
}
