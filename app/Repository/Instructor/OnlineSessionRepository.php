<?php

namespace App\Repository\Instructor;

use App\Http\traits\ZoomMeeting;
use App\Models\Course;
use App\Models\OnlineSession;
use App\Repository\Instructor\Interfaces\OnlineSessionRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OnlineSessionRepository implements OnlineSessionRepositoryInterface
{
    use ZoomMeeting;

    public function getAll()
    {
        return OnlineSession::all();
    }

    public function getInstructorCourses()
    {
        return Course::where('instructor_id', Auth::user()->id)->get();
    }

    public function store($request)
    {
        try {
            $zoomMeeting = $this->createZoomMeeting($request);

            $onlineMeeting = new OnlineSession;
            $onlineMeeting->instructorId = Auth::user()->id;
            $onlineMeeting->meetingId = $zoomMeeting->id;
            $onlineMeeting->topic = $request->sessionTopic;
            $onlineMeeting->startAt = $request->startDate;
            $onlineMeeting->duration = $zoomMeeting->duration;
            $onlineMeeting->password = $zoomMeeting->password;
            $onlineMeeting->startURL = $zoomMeeting->start_url;
            $onlineMeeting->joinURL = $zoomMeeting->join_url;
            $onlineMeeting->courseId = $request->courseId;
            $onlineMeeting->save();

            return redirect()->route('instructor.onlineSession.index')->with('success', 'Session is Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $this->deleteZoomMeeting($request->id);
            OnlineSession::where('meetingId', $request->id)->delete();

            return redirect()->route('instructor.onlineSession.index')->with('success', 'Session is Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
