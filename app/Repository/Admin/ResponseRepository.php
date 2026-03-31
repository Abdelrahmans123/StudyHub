<?php

namespace App\Repository\Admin;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Response;
use App\Repository\Admin\Interfaces\ResponseRepositoryInterface;
use Illuminate\Support\Facades\Auth;
class ResponseRepository implements ResponseRepositoryInterface
{
    public function getAll()
    {
        return Response::with('instructor')->get();
    }

    public function getInstructors()
    {
        return Instructor::all();
    }

    public function acceptedResponse($request)
    {
        $id = $request->id;
        $response = Response::findOrFail($id);
        $response->Accepted = 'Accepted';
        $response->save();

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

    public function notAcceptedResponse($id)
    {
        $response = Response::findOrFail($id);
        $response->Accepted = 'Not Accepted';
        $response->save();

        return redirect()->back()->with('error', 'Course is not Approved');
    }
}
