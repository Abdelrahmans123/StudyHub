<?php

namespace App\Repository\Admin\Interfaces;

interface CourseRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);
    public function update($request);
    public function edit($id);
    public function destroy($request);
}
