<?php

namespace App\Repository\Instructor;

use App\Models\Response;
use App\Repository\Instructor\Interfaces\ResponseRepositoryInterface;

class ResponseRepository implements ResponseRepositoryInterface
{

    public function index()
    {
        $response=Response::all();
        return view('Pages.Instructor.Response.index',compact('response'));
    }

    public function create()
    {
        return view('Pages.Instructor.Response.create');
    }

    public function store($request)
    {
        $request->validate(
            [
                'courseName'=>'string|required|unique:courses,name',
                'description'=>'string|required',
                'courseStart'=>'required',
                'courseEnd'=>'required|after:start_time',
            ]
        );
        $response=new Response();
        $response->courseName=$request->courseName;
        $response->courseDescription=$request->description;
        $response->courseStart=$request->courseStart;
        $response->courseEnd=$request->courseEnd;
        $response->instructorId=auth()->user()->id;
        $response->save();
        return redirect('instructor/response')->with('success','Course is sent to admin successfully');
    }
}
