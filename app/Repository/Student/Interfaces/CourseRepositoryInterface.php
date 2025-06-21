<?php

namespace App\Repository\Student\Interfaces;

interface CourseRepositoryInterface
{
    public function index();
    public function enroll($id);
    public function recentCourse($id);
}
