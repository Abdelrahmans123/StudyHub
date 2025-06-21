<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Repository\Instructor\Interfaces\InstructorRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    protected InstructorRepositoryInterface $instructor;
    public function __construct(InstructorRepositoryInterface $instructor){
        $this->instructor=$instructor;
    }

    public function store(Request $request)
    {
        return  $this->instructor->store($request);
    }

    public function edit($id)
    {
        return   $this->instructor->store($id);
    }

    public function update(Request $request)
    {
        return  $this->instructor->update($request);
    }

}
