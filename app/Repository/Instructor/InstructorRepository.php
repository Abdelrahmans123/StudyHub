<?php

namespace App\Repository\Instructor;

use App\Models\Instructor;
use App\Repository\Instructor\Interfaces\InstructorRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class InstructorRepository implements InstructorRepositoryInterface
{

    public function store($request)
    {
        $request->validate(
            [
                'instructorName'=>'string|required',
                'instructorEmail'=>'email|required',
                'instructorPassword'=>'string|max:8|min:1'
            ]
        );
        if(isset($request->active)){
            $data=[
                'name'=>$request->instructorName,
                'email'=>$request->instructorEmail,
                'password'=>Hash::make($request->instructorPassword),
                'active'=>true
            ];
        }else{
            $data=[
                'name'=>$request->instructorName,
                'email'=>$request->instructorEmail,
                'password'=>Hash::make($request->instructorPassword),
                'active'=>false
            ];
        }
        $user=Instructor::create($data);
        event(new Registered($user));
        return redirect('admin/instructors')->with('success','Instructor Added Successfully');
    }

    public function edit($id)
    {
        $instructor=Instructor::findOrFail($id);
        return view('Pages.Admin.Instructor.edit',compact('instructor'));
    }


    public function update($request)
    {
        $id=$request->id;
        $request->validate(
            [
                'instructorName'=>'string|required',
                'instructorEmail'=>'email|required',
                'instructorPassword'=>'string|max:8|min:1'
            ]
        );
        $instructor=Instructor::findOrFail($id);
        $instructor->name=$request->instructorName;
        $instructor->email=$request->instructorEmail;
        if(isset($request->active)){
            $instructor->active=1;
        }else{
            $instructor->active=0;
        }
        $instructor->save();
        return redirect('admin/instructors')->with('success','Instructor Added Successfully');
    }
}
