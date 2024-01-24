<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffecterRole extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
