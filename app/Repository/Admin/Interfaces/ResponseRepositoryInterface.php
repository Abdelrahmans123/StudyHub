<?php

namespace App\Repository\Admin\Interfaces;

interface ResponseRepositoryInterface
{
    public function getAll();

    public function getInstructors();

    public function acceptedResponse($request);

    public function notAcceptedResponse($id);
}
