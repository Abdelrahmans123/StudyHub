<?php

namespace App\Repository\Instructor\Interfaces;

interface AttendanceRepositoryInterface
{
    public function getAllStudents();

    public function store($request);
}
