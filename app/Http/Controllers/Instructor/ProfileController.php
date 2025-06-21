<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $student=Instructor::findOrFail(auth()->user()->id);
        return view('Pages.Instructor.Profile.index',compact('student'));
    }
    public function update(Request $request,$id){
        $student=Instructor::findOrFail($id);
        if(!empty($request->password)){
            $student->name=$request->name;
            $student->password=Hash::make($request->password);
            $student->save();
        }else{
            $student->name=$request->name;
            $student->save();
        }
        return redirect()->route('instructor.profile.show')->with('success','Profile is updated successfully');
    }
}
