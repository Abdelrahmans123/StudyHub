<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Repository\Instructor\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected AttendanceRepositoryInterface $attendance;

    public function __construct(AttendanceRepositoryInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function index()
    {
        $students = $this->attendance->getAllStudents();

        return view('Pages.Instructor.Course.index', compact('students'));
    }

    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }
}
