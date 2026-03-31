<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Response as ResponseModel;
use App\Repository\Admin\Interfaces\ResponseRepositoryInterface;

class ResponseController extends Controller
{
    protected ResponseRepositoryInterface $repository;

    public function __construct(ResponseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $response = $this->repository->getAll();

        return view('Pages.Admin.Courses.Response.index', compact('response'));
    }

    public function addImage(ResponseModel $response)
    {
        $course = $response;
        $instructors = $this->repository->getInstructors();

        return view('Pages.Admin.Courses.Response.create', compact('course', 'instructors'));
    }

    public function acceptedResponse(StoreCourseRequest $request)
    {
        return $this->repository->acceptedResponse($request);
    }

    public function notAcceptedResponse(ResponseModel $response)
    {
        return $this->repository->notAcceptedResponse($response->id);
    }
}
