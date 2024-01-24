<?php

namespace App\Http\Controllers;

use App\Prevention;

class ApiPreventionController extends Controller
{
    public function __invoke()
    {
        return response()->json(Prevention::get());
    }
}