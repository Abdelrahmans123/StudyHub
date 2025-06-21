<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Fee;
use App\Models\Response;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $responseCount = Response::count();
        return response()->json(['count' => $responseCount]);
    }
}
