<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'meetingId',
        'topic',
        'startAt',
        'duration',
        'password',
        'startURL',
        'joinURL',
        'instructorId',
        'courseId',
    ];

    protected $casts = [
        'startAt' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseId');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructorId');
    }
}
