<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Instructor;
use App\Repository\Admin\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminRepositoryInterface $repository;
    public function __construct(AdminRepositoryInterface $repository)
    {
        $this->repository=$repository;
    }

    public function instructorPage(){
        return   $this->repository->instructorPage();
    }

    public function create()
    {
        return  $this->repository->create();
    }


}
