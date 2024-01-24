<?php

namespace App\Http\Controllers\Ajax;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = User::query()->whereHas('typeuser', function($query) {
            $query->utilisateurs();
        });
        
        if ($request->has('age_min')) {
            $ageMin = Carbon::now()->subYears($request->age_min);
            
            $query = $query->where('datenaissance', '<=', $ageMin->toDateString());
        }
        
        if ($request->has('age_max')) {
            $ageMax = Carbon::now()->subYears($request->age_max);
            
            $query = $query->where('datenaissance', '>=', $ageMax->toDateString());
        }
        
        if ($request->has('sexe')) {
            $query = $query->whereSexe($request->sexe);
        }
        
        if ($request->has('profession')) {
            
        }
        
        if ($request->has('region_id')) {
            $query = $query->whereRegionId($request->region_id);
        }
        
        $users = $query->pluck('id');
        
        return response()->json([
            'users_count' => count($users),
            'users' => $users,
        ]);
    }
}