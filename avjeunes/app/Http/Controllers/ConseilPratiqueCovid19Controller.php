<?php

namespace App\Http\Controllers;

use App\Prevention;
use Illuminate\Http\Request;

class ConseilPratiqueCovid19Controller extends Controller
{
    public function index(Request $request)
    {
        $page = 'conseil-pratique-covid-19';
        
        $cps = Prevention::get();

        return view('Admin.ConseilPratiqueCovid19.index', compact('page', 'cps'));
    }
    
    public function create()
    {
        $page = 'conseil';
        
        $conseilPratiqueCovid19 = new Prevention;
        
        return view('Admin.ConseilPratiqueCovid19.form', compact('page', '$conseilPratiqueCovid19'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'url' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        Prevention::create(
            array_merge(
                $request->only('titre', 'url', 'description'),
                [
                    'image' => str_after($request->file('image')->store('webtv', 'webtv_driver'), 'webtv/'),
                ]
            )
        );
        
        return redirect()->back()->with(['message' => 'Prevention enregistre avec success!']);
    }
    
    public function edit()
    {
        // 
    }
    
    public function update()
    {
        // 
    }
    
    public function destroy()
    {
        // 
    }
    
    public function getMobileIST()
    {
        return view('Conseil.Mobile.ist');
    }
}