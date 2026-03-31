<?php

namespace App\Repository\Student\Interfaces;

interface ReviewRepositoryInterface
{
    public function getAll();

    public function getCourse($id);

    public function store($request);
}
