<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Repository\Admin\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
protected CourseRepositoryInterface $course;
public function __construct(CourseRepositoryInterface $course)
{
    $this->course=$course;
}

    public function index()
    {
        return $this->course->index();
    }

    public function create()
    {
        return $this->course->create();
    }

    public function store(Request $request)
    {
        return  $this->course->store($request);
    }
    public function update(Request $request){
    return $this->course->update($request);
    }
    public function edit($id){
    return $this->course->edit($id);
    }
    public function destroy(Request $request){
        return $this->course->destroy($request);
    }
}
