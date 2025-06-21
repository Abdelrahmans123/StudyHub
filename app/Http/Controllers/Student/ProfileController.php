<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
public function index(){
    $student=Student::findOrFail(auth()->user()->id);
    return view('Pages.Student.Profile.index',compact('student'));
}
public function update(Request $request,$id){
    $student=Student::findOrFail($id);
    if(!empty($request->password)){
        $student->name=$request->name;
        $student->password=Hash::make($request->password);
        $student->save();
    }else{
        $student->name=$request->name;
        $student->save();
    }
    return redirect()->route('student.profile.show')->with('success','Profile is updated successfully');
}
}
