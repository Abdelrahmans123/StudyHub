<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($type):View
    {
        return view('auth.register',compact('type'));
    }
    protected  function credentials(Request $request){
        return ['email'=>$request->email,'password'=>$request->password,'active'=>1];
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:students','unique:instructors','unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if($request->has('file_name')){
            $image=$request->file('file_name');
            $fileName=$image->getClientOriginalName();
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'img'=>$fileName
            ];
            $image=$request->file_name;
            $imageName=$image->getClientOriginalName();
            $request->file_name->move(public_path('assets/images'),$imageName);
        }else{
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];
        }


        if($request->get('guard') === 'user'){
            $user=User::create($data);
        }
        if($request->get('guard')=== 'student'){
            $user=Student::create($data);
        }
        if($request->get('guard')=== 'instructor'){

            $user=Instructor::create($data);
        }
        if($request->get('guard')=== 'admin'){
            $user=Admin::create($data);
        }
        event(new Registered($user));
//dd($request->get('guard'));
        return redirect('/login/'.$request->get('guard'));
    }
}
