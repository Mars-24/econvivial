<?php

namespace App\Http\Controllers\AutoTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function __invoke()
    {
        return view('AutoTest.details');
    }
}
