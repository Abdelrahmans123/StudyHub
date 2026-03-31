<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'courseId',
        'instructor_id',
        'attendanceDate',
        'status',
    ];

    protected $casts = [
        'attendanceDate' => 'date',
        'status' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentId');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseId');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
