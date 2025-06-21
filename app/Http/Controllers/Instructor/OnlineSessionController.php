<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\traits\ZoomMeeting;
use App\Models\OnlineSession;
use App\Repository\Instructor\Interfaces\OnlineSessionRepositoryInterface;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineSessionController extends Controller
{
    protected OnlineSessionRepositoryInterface $onlineSession;
    public function __construct(OnlineSessionRepositoryInterface $onlineSession){
        $this->onlineSession=$onlineSession;
    }
    public function index()
    {
        return $this->onlineSession->index();
    }

    public function create()
    {
        return $this->onlineSession->create();
    }


    public function store(Request $request)
    {
        return $this->onlineSession->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->onlineSession->destroy($request);
    }
}
