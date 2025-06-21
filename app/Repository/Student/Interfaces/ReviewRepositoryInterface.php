<?php

namespace App\Repository\Student\Interfaces;

interface ReviewRepositoryInterface
{
    public function index();
    public function create($id);
    public function store($request);
}
