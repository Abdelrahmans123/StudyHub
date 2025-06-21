<?php

namespace App\Repository\Instructor\Interfaces;

interface ResponseRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);
}
