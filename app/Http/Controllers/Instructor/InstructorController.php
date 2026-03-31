<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Course;
use App\Models\OnlineSession;
use App\Models\Student;
use App\Repository\Instructor\Interfaces\InstructorRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    protected InstructorRepositoryInterface $instructor;

    public function __construct(InstructorRepositoryInterface $instructor)
    {
        $this->instructor = $instructor;
    }

    public function dashboard()
    {
        $courseIds = Course::where('instructor_id', Auth::id())->pluck('id');
        $studentCount = Student::whereIn('courseId', $courseIds)->count();
        $courseCount = $courseIds->count();
        $onlineSession = OnlineSession::all();

        return view('Pages.Instructor.dashboard', compact('studentCount', 'courseCount', 'onlineSession'));
    }

    public function educationalTool()
    {
        return view('Pages.Instructor.educationalTool');
    }

    public function store(StoreInstructorRequest $request)
    {
        return $this->instructor->store($request);
    }

    public function edit($id)
    {
        $instructor = $this->instructor->find($id);

        return view('Pages.Admin.Instructor.edit', compact('instructor'));
    }

    public function update(UpdateInstructorRequest $request)
    {
        return $this->instructor->update($request);
    }
}
