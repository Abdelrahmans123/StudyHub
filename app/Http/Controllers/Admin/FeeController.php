<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Response;

class FeeController extends Controller
{
    public function index()
    {
        $responseCount = Response::count();

        return response()->json(['count' => $responseCount]);
    }
}
