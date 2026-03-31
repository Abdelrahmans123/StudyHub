<?php

namespace App\Repository\Instructor;

use App\Models\Instructor;
use App\Repository\Instructor\Interfaces\InstructorRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class InstructorRepository implements InstructorRepositoryInterface
{
    public function find($id)
    {
        return Instructor::findOrFail($id);
    }

    public function store($request)
    {
        $data = [
            'name' => $request->instructorName,
            'email' => $request->instructorEmail,
            'password' => Hash::make($request->instructorPassword),
            'active' => isset($request->active) ? true : false,
            'img' => 'teacher.png',
        ];

        $user = Instructor::create($data);
        event(new Registered($user));

        return redirect('admin/instructors')->with('success', 'Instructor Added Successfully');
    }

    public function update($request)
    {
        $id = $request->id;

        $instructor = Instructor::findOrFail($id);
        $instructor->name = $request->instructorName;
        $instructor->email = $request->instructorEmail;
        $instructor->active = isset($request->active) ? 1 : 0;
        $instructor->save();

        return redirect('admin/instructors')->with('success', 'Instructor Updated Successfully');
    }
}
