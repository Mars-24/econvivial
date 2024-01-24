<?php

namespace App\Http\Controllers;

use App\AutoTestQuestion;

class ApiAutoTestQuestionController extends Controller
{
    public function __invoke()
    {
        return AutoTestQuestion::with('niveau:id,couleur,message')->where('status', 'enabled')->get(['id', 'description', 'auto_test_niveau_id', 'status']);
    }
}