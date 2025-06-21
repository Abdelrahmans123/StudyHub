<?php

namespace App\Repository\Admin;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Response;
use App\Notifications\CourseApprovedNotification;
use App\Repository\Admin\Interfaces\ResponseRepositoryInterface;
use http\Env\Request;

class ResponseRepository implements ResponseRepositoryInterface
{

    public function index()
    {
        $response=Response::all();
        return view('Pages.Admin.Courses.Response.index',compact('response'));
    }
    public function addImage($id){
        $course=Response::find($id);
        $instructors=Instructor::all();
        return view('Pages.Admin.Courses.Response.create',compact('course','instructors'));
    }
    public function acceptedResponse($request)
    {
        $id=$request->id;
        $response=Response::findOrFail($id);
        $response->Accepted="Accepted";
        $response->save();
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

    public function notAcceptedResponse($id)
    {
        $response=Response::findOrFail($id);
        $response->Accepted="Not Accepted";
        $response->save();
        return redirect()->back()->with('error','Course  is not Approved ');
    }
}
