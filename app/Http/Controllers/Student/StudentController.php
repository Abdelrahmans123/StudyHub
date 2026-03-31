<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\OnlineSession;
use App\Repository\Student\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected StudentRepositoryInterface $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = $this->repository->getDashboardData();

        return view('Pages.Student.dashboard', [
            'attendancePercentage' => $data['attendancePercentage'],
            'notattendancePercentage' => $data['notattendancePercentage'],
            'course' => $data['courses'],
            'onlineSession' => $data['onlineSession'],
        ]);
    }

    public function educationalTool()
    {
        return view('Pages.Student.educationalTool');
    }

    public function onlineSession()
    {
        $onlineSession = OnlineSession::all();

        return view('Pages.Student.onlineSession', compact('onlineSession'));
    }
}
