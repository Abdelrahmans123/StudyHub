<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable
{
    use HasFactory , Notifiable;
    protected $guard='student';
    protected $fillable=[
        'name',
        'email',
        'password',
        'active',
        'img'
    ];
    protected $hidden=[
        'password',
        'remember_token'
    ];
    protected $casts=[
        'email_verified_at'=>'datetime'
    ];
    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }
}
