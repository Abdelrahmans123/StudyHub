<?php

namespace App\Repository\Instructor\Interfaces;

interface QuizRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}
