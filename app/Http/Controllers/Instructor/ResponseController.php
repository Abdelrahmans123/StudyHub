<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Repository\Instructor\Interfaces\ResponseRepositoryInterface;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected ResponseRepositoryInterface $response;
    public function __construct(ResponseRepositoryInterface $response){
        $this->response=$response;
}
    public function index()
    {
        return  $this->response->index();
    }

    public function create()
    {
        return  $this->response->create();
    }

    public function store(Request $request)
    {
        return   $this->response->store($request);
    }


}
