<?php

namespace App\Repository\Instructor\Interfaces;

interface InstructorRepositoryInterface
{
    public function find($id);

    public function store($request);

    public function update($request);
}
