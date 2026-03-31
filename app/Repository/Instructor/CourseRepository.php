<?php

namespace App\Repository\Instructor;

use App\Models\Course;
use App\Repository\Instructor\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function find($id)
    {
        return Course::find($id);
    }
}
