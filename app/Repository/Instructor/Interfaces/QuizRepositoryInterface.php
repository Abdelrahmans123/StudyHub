<?php

namespace App\Repository\Instructor\Interfaces;

interface QuizRepositoryInterface
{
    public function getAll();

    public function getCourses();

    public function find($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}
