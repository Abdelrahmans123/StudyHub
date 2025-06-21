<?php

namespace App\Repository\Instructor\Interfaces;

interface InstructorRepositoryInterface
{
    public function store($request);

    public function edit($id);

    public function update($request);
}
