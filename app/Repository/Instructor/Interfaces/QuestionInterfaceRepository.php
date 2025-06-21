<?php

namespace App\Repository\Instructor\Interfaces;

interface QuestionInterfaceRepository
{
    public function index();

    public function created($id);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}
