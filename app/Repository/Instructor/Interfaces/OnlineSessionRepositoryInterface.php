<?php

namespace App\Repository\Instructor\Interfaces;

interface OnlineSessionRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function destroy($request);
}
