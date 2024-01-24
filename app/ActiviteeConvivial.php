<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiviteeConvivial extends Model
{
    protected $table = 'activite_eConvivial';
    
    protected $fillable = [
        'titre',
        'image',
        'description'
    ];
}