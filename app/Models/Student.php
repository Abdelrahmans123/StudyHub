<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $guard='student';
    protected $fillable=[
        'name',
        'email',
        'password',
        'img'
    ];
    protected $hidden=[
        'password',
        'remember_token'
    ];
    protected $casts=[
        'email_verified_at'=>'datetime'
    ];
    public function attendance(){
        return $this->hasMany(Attendance::class,'studentId');
    }
    public function course(){
        return $this->belongsTo(Course::class,'courseId');
    }
    public function review(){
        return $this->belongsTo(Review::class,'studentId');
    }
}
