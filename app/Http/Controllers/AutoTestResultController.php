<?php

namespace App\Http\Controllers;

use App\AutoTestResult;
use Illuminate\Http\Request;

class AutoTestResultController extends Controller
{
    public function __invoke()
    {
        $page = 'auto-test-result';
        
        return view('Admin.AutoTestResult.index', compact('page'));
    }
}