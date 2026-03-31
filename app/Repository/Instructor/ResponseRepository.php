<?php

namespace App\Repository\Instructor;

use App\Models\Response;
use App\Repository\Instructor\Interfaces\ResponseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ResponseRepository implements ResponseRepositoryInterface
{
    public function getAll()
    {
        return Response::all();
    }

    public function store($request)
    {

        $response = new Response;
        $response->courseName = $request->courseName;
        $response->courseDescription = $request->description;
        $response->courseStart = $request->courseStart;
        $response->courseEnd = $request->courseEnd;
        $response->instructorId = Auth::user()->id;
        $response->save();

        return redirect('instructor/response')->with('success', 'Course is sent to admin successfully');
    }
}
