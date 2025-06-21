<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Repository\Instructor\Interfaces\QuestionInterfaceRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected QuestionInterfaceRepository $question;
    public function __construct(QuestionInterfaceRepository $question){
        $this->question=$question;
    }

    public function index()
    {
        return $this->question->index();
    }

    public function create()
    {

        return $this->question->create();
    }
    public function created($id)
    {

        return $this->question->created($id);
    }
    public function store(Request $request)
    {
        return $this->question->store($request);
    }

    public function edit($id)
    {
        return $this->question->edit($id);
    }
    public function update(Request $request)
    {
        return $this->question->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->question->destroy($request);
    }
}
