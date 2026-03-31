<?php

namespace App\Repository\Instructor\Interfaces;

interface ResponseRepositoryInterface
{
    public function getAll();

    public function store($request);
}
