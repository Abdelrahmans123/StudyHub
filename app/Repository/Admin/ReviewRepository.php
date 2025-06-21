<?php

namespace App\Repository\Admin;

use App\Models\Review;

class ReviewRepository implements Interfaces\ReviewRepositoryInterface
{

    public function index()
    {
        $review=Review::all();
        return view('Pages.Admin.Review.index',compact('review'));
    }
}
