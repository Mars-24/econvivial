<?php

namespace App\Http\Controllers;

use App\Covid19Case;
use App\Covid19City;
use App\Covid19VictimCaseLocation;
use Illuminate\Http\Request;

class Covid19CauseLocationController extends Controller
{
    public function index()
    {
        $page = 'covid-19-case-location';
        
        $cases = Covid19Case::get();
        
        // dd($cases->first()->toArray());
        
        $cities = Covid19City::with('cases')->get();
        
        return view('Admin.Covid19CauseLocation.index', compact('page', 'cases', 'cities'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        
        // collect($request->icons)
        //     ->each(function($data, $id) {
        //         $case = Covid19Case::find($id);
                
        //         $case->icon = $data['icon']->store(null, 'img');
                
        //         $case->save();
        //         // str_after($request->file('image')->store('webtv', 'webtv_driver'), 'webtv/')
        //     });
        
        \DB::transaction(function() use($request) {
            // Covid19VictimCaseLocation::latest()->delete();
            
            collect($request->cities)
                ->each(function($cityData) {
                    if (array_has($cityData, 'id')) {
                        $city = Covid19City::find($cityData['id']);
                    } else {
                        $city = new Covid19City;
                    }
                    
                    $city->fill($cityData)->save();
                    
                    $city->cases()->sync(
                        $cityData['cases']
                    );
                });
            
            // collect($request->results)
            //     ->each(function($result) {
            //         Covid19VictimCaseLocation::create($result);
            //     });
        });
        
        return back()->with(['message' => 'Enregistre avec success!']);
    }
}