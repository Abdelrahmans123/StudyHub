<?php

namespace App\Repository\Admin\Interfaces;

interface CourseRepositoryInterface
{
    public function getAll();

    public function getInstructors();

    public function store($request);

    public function update($request);

    public function destroy($request);
}
