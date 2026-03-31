<?php

namespace App\Repository\Student\Interfaces;

interface CourseRepositoryInterface
{
    public function getAll();

    public function enroll($id);

    public function find($id);
}
