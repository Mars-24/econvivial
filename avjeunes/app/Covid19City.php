<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19City extends Model
{
    protected $table = 'covid_19_cities';
    
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];
    
    public function cases()
    {
        return $this->belongsToMany(Covid19Case::class, 'covid_19_city_case', 'city_id', 'case_id')
            ->withPivot('count')
            ->using(Covid19CityCase::class);
    }
}