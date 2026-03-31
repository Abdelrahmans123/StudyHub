<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Repository\Instructor\Interfaces\OnlineSessionRepositoryInterface;
use Illuminate\Http\Request;

class OnlineSessionController extends Controller
{
    protected OnlineSessionRepositoryInterface $onlineSession;

    public function __construct(OnlineSessionRepositoryInterface $onlineSession)
    {
        $this->onlineSession = $onlineSession;
    }

    public function index()
    {
        $onlineSession = $this->onlineSession->getAll();

        return view('Pages.Instructor.OnlineSession.index', compact('onlineSession'));
    }

    public function create()
    {
        $course = $this->onlineSession->getInstructorCourses();

        return view('Pages.Instructor.OnlineSession.create', compact('course'));
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
