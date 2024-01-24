<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AutoTestQuestion;
use App\AutoTestResultat;

class AutoTestQuestionController extends Controller
{
    public function index(Request $request)
    {
        $page = 'auto-test-question';
        
        $user = $request->user ?: auth()->user()->id;
        
        $questions = AutoTestQuestion::with('niveau')->get();
        
        return view('Admin.AutoTest.question', compact('page', 'user', 'questions'));
    }
    
    public function store(Request $request)
    {
        \DB::transaction(function() use($request) {
            $result = AutoTestResultat::updateOrCreate($result->only('user_id'));
            
            $result->questions()->delete();
            
            $result->questions->attach(
                $request->questions
            );
        });
    }
}