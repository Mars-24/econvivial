<?php

namespace App\Http\Controllers;

use App\Covid19City;
use App\Covid19Case;
use App\Covid19CityCase;
use Illuminate\Support\Facades\DB;

class ApiCovid19CaseLocationController extends Controller
{
    public function __invoke()
    {
        $cases = Covid19Case::with('cities:id,name,latitude,longitude')->get(['id', 'name', 'icon', 'color', DB::raw('(select sum(count) from covid_19_city_case where case_id = id) as total')]);
        
        return response()->json($cases);
    }
}