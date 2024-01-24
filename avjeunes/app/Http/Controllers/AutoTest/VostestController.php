<?php

namespace App\Http\Controllers\AutoTest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class VostestController extends Controller
{
    public function index()
    {
        return view('AutoTest.vostest');
    }
    
    public function mobile($user)
    {
        Auth::loginUsingId($user);
        
        return view('AutoTest.vostest');
    }
}
