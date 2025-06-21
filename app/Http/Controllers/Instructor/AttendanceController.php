<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Repository\Instructor\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    protected AttendanceRepositoryInterface $attendance;
    public function __construct(AttendanceRepositoryInterface $attendance){
        $this->attendance=$attendance;
    }
    public function index()
    {
        return $this->attendance->index();
    }

    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }

}
