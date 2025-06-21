<?php

namespace App\Repository\Student;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\OnlineSession;
use App\Repository\Student\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{

    public function index()
    {
        $student= auth()->user()->id;
        $courses=Course::all();
        $attendanceRecords = Attendance::where('studentId',$student)->get();
        $courseId=auth()->user()->courseId;
        $totalSessions = OnlineSession::where('courseId', $courseId)->count();
        $attendedSessions = $attendanceRecords->count();
        $onlineSessionCount=OnlineSession::count();
        if($onlineSessionCount>0) {
            $attendancePercentage = ($attendedSessions / $totalSessions) * 100;
            $notAttendedSessions = $totalSessions - $attendedSessions;
            $notattendancePercentage = ($notAttendedSessions / $totalSessions) * 100;
        }else{
            $attendancePercentage=0;
            $notattendancePercentage=0;
        }
        $onlineSession=OnlineSession::all();
        return view('Pages.Student.dashboard',compact('attendancePercentage','notattendancePercentage'))
            ->with('course',$courses)
            ->with('onlineSession',$onlineSession);
    }
}
