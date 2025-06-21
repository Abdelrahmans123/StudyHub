<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Admin\Interfaces\ResponseRepositoryInterface;


class ResponseController extends Controller
{
    protected ResponseRepositoryInterface $repository;
    public function __construct(ResponseRepositoryInterface $repository){
        $this->repository=$repository;
    }
    public function index()
    {
        return   $this->repository->index();
    }

    public function acceptedResponse(Request $request)
    {
        return  $this->repository->acceptedResponse($request);
    }
    public function notAcceptedResponse($id){
        return   $this->repository->notAcceptedResponse($id);
    }
    public function addImage($id){
        return   $this->repository->addImage($id);
    }
}
