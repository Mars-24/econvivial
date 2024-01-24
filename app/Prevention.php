<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevention extends Model
{
    protected $table = 'conseils_pratiques_covid_19';
    
    protected $fillable = [
        'titre', 'url', 'description', 'image'
    ];
}