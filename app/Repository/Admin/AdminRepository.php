<?php

namespace App\Repository\Admin;

use App\Models\Instructor;

class AdminRepository implements Interfaces\AdminRepositoryInterface
{

    public function instructorPage()
    {
        $instructors=Instructor::all();
        return view('Pages.Admin.Instructor.index',compact('instructors'));
    }

    public function create()
    {
        return view('Pages.Admin.Instructor.create');
    }
}
