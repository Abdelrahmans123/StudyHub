<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorResponseRequest;
use App\Repository\Instructor\Interfaces\ResponseRepositoryInterface;

class ResponseController extends Controller
{
    protected ResponseRepositoryInterface $response;

    public function __construct(ResponseRepositoryInterface $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        $response = $this->response->getAll();

        return view('Pages.Instructor.Response.index', compact('response'));
    }

    public function create()
    {
        return view('Pages.Instructor.Response.create');
    }

    public function store(StoreInstructorResponseRequest $request)
    {
        return $this->response->store($request);
    }
}
