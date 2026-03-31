<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseName',
        'courseDescription',
        'courseStart',
        'courseEnd',
        'Accepted',
        'instructorId',
    ];

    protected $casts = [
        'courseStart' => 'datetime',
        'courseEnd' => 'datetime',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructorId');
    }
}
