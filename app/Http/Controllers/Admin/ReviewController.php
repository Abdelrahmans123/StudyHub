<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Admin\Interfaces\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    protected ReviewRepositoryInterface $review;

    public function __construct(ReviewRepositoryInterface $review)
    {
        $this->review = $review;
    }

    public function index()
    {
        $review = $this->review->getAll();

        return view('Pages.Admin.Review.index', compact('review'));
    }
}
