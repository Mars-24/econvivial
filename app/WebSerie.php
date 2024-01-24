<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebSerie extends Model
{
    protected $fillable = [
        'titre', 'url', 'description', 'userDash', 'image',
    ];
    
    public function setUserDashAttribute($userDash)
    {
        $this->attributes['userDash'] = !empty($userDash);
    }
}
