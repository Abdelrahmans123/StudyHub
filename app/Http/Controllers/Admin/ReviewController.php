<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Repository\Admin\Interfaces\ReviewRepositoryInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected ReviewRepositoryInterface $repository;
    public function __construct(ReviewRepositoryInterface $repository){
        $this->repository=$repository;
    }
    public function index()
    {
        return   $this->repository->index();
    }
}
