<?php

namespace App\Repository\Instructor\Interfaces;

interface QuestionInterfaceRepository
{
    public function getAll();

    public function findQuiz($id);

    public function getAllQuizzes();

    public function find($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}
