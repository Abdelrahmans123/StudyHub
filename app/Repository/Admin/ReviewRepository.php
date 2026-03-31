<?php

namespace App\Repository\Admin;

use App\Models\Review;
use App\Repository\Admin\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function getAll()
    {
        return Review::with(['student', 'course'])->get();
    }
}
