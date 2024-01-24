<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConseilPratique extends Model
{
    protected $table = 'conseil_pratiques';
    
    protected $fillable = [
        'titre',
        'image',
        'description'
    ];
}
