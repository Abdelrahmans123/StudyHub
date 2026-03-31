<?php

namespace App\Repository\Instructor\Interfaces;

interface OnlineSessionRepositoryInterface
{
    public function getAll();

    public function getInstructorCourses();

    public function store($request);

    public function destroy($request);
}
