<?php

namespace App\Repository\Instructor;

use App\Http\traits\ZoomMeeting;
use App\Models\Course;
use App\Models\OnlineSession;
use App\Repository\Instructor\Interfaces\OnlineSessionRepositoryInterface;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineSessionRepository implements OnlineSessionRepositoryInterface
{
    use ZoomMeeting;
    public function index()
    {
        $onlineSession=OnlineSession::all();
        return view('Pages.Instructor.OnlineSession.index',compact('onlineSession'));
    }

    public function create()
    {
        $course=Course::where('instructor_id',auth()->user()->id)->get();
        return view('Pages.Instructor.OnlineSession.create',compact('course'));
    }

    public function store($request)
    {

        try {
            $zoomMeeting = $this->createZoomMeeting($request);
            $onlineMeeting = new OnlineSession();
            $onlineMeeting->instructorId = auth()->user()->id;
            $onlineMeeting->meetingId = $zoomMeeting->id;
            $onlineMeeting->topic = $request->sessionTopic;
            $onlineMeeting->startAt = $request->startDate;
            $onlineMeeting->duration = $zoomMeeting->duration;
            $onlineMeeting->password =  $zoomMeeting->password;
            $onlineMeeting->startURL = $zoomMeeting->start_url;
            $onlineMeeting->joinURL = $zoomMeeting->join_url;
            $onlineMeeting->courseId=$request->courseId;
            $onlineMeeting->save();
            return redirect()->route('instructor.onlineSession.index')->with('success','Session is Added Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }

    }

    public function destroy($request)
    {
        try {
            $meeting = Zoom::meeting()->find($request->id);
            $meeting->delete();
            OnlineSession::where('meetingId',$request->id)->delete();
            return redirect()->route('instructor.onlineSession.index')->with('success','Session is Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
