<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19Case extends Model
{
    protected $table = 'covid_19_cases';
    
    protected $fillable = [
        'name',
        'color',
        'icon',
    ];
    
    protected $appends = ['icon_uri'];
    
    public function cities()
    {
        return $this->belongsToMany(Covid19City::class, 'covid_19_city_case', 'case_id', 'city_id')
            ->withPivot('count')
            ->using(Covid19CityCase::class);
    }
    
    public function getIconUriAttribute()
    {
        return 'uploads/img/' . $this->icon;
    }
}