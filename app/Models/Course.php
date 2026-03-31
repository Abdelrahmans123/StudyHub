<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'startAt',
        'endAt',
        'img',
        'instructor_id',
        'adminId',
    ];

    protected $casts = [
        'startAt' => 'datetime',
        'endAt' => 'datetime',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'courseId');
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class, 'courseId');
    }

    public function onlineSessions()
    {
        return $this->hasMany(OnlineSession::class, 'courseId');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'courseId');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'courseId');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'courseId');
    }
}
