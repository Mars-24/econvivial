<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19VictimCaseLocation extends Model
{
    protected $table = 'covid_19_victim_cases_location';
    
    protected $fillable = [
        'city',
        'confirmed_case',
        'confirmed_case_icon',
        'confirmed_case_color',
        'active_case',
        'active_case_icon',
        'active_case_color',
        'healed_case',
        'healed_case_icon',
        'healed_case_color',
        'deceased_case',
        'deceased_case_icon',
        'deceased_case_color',
        'suspected_case',
    	'suspected_case_icon',
    	'suspected_case_color',
    	'longitude',
    	'latitude',
    	'created_at',
    	'updated_at',
    ];
}