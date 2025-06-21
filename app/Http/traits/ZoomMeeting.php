<?php

namespace App\Http\traits;
use MacsiDigital\Zoom\Facades\Zoom;
trait ZoomMeeting
{
    public function  createZoomMeeting($request){
        $user=Zoom::user()->first();
        $meetingData=[
            'topic'=>$request->sessionTopic,
            'duration'=>$request->duration,
            'startDate'=>$request->startDate,
            'timezone'=>'Africa/Cairo'
        ];
        $meeting=Zoom::meeting()->make($meetingData);
        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video'=>false,
            'participant_video'=> false,
            'mute_upon_entry'=> true,
            'registration_type' => 2,
            'enforce_login' => false,
            'waiting_room' => true,
            'approval_type'=>config('zoom.approval_type'),
            'audio'=>config('zoom.audio'),
            'auto_recording'=>config('zoom.auto_recording'),
        ]);
        return $user->meetings()->save($meeting);
    }
}
