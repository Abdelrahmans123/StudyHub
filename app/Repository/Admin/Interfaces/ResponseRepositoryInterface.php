<?php

namespace App\Repository\Admin\Interfaces;





interface ResponseRepositoryInterface
{
    public function index();

    public function acceptedResponse($request);

    public function notAcceptedResponse($id);
    public function addImage($id);

}
