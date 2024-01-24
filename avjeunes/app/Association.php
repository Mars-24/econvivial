<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    //

    public  function paireducateurs(){
        return $this->hasMany("App\PairEducateur");
    }

    public function region(){
        return $this->belongsTo("App\Region", "region_id");
    }
}
