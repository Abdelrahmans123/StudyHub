<?php

namespace App\Repository\Admin;

use App\Models\Instructor;
use App\Repository\Admin\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function getInstructors()
    {
        return Instructor::all();
    }
}
