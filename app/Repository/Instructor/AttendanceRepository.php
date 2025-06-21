<?php

namespace App\Repository\Instructor;

use App\Models\Attendance;
use App\Models\Student;
use App\Repository\Instructor\Interfaces\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function index()
    {
        $students = Student::all();
        return view('Pages.Instructor.Course.index',compact('students'));
    }



    public function store($request)
    {
        try {
            $attendanceDate=date('Y-m-d');
            foreach($request->attendance as $studentId =>$attendance){
                if($attendance==='attend'){
                    $attendanceStatus=true;
                }else{
                    $attendanceStatus=false;
                }
                $attendances=new Attendance();
                $attendances->studentId=$studentId;
                $attendances->courseId=$request->courseId;
                $attendances->instructor_id=auth()->user()->id;
                $attendances->attendanceDate=$attendanceDate;
                $attendances->status=$attendanceStatus;
                $attendances->save();
                return redirect()->route('instructor.attendance.index')->with('success','Attendance is taken successfully');
            }
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
