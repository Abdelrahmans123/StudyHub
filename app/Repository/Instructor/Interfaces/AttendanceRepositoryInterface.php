<?php

namespace App\Repository\Instructor\Interfaces;

interface AttendanceRepositoryInterface
{
    public function index();

    public function store($request);
}
