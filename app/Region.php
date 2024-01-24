<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //

    public  function paireducateurs(){
        return $this->hasMany("App\PairEducateur");
    }

    public  function ecoles(){
        return $this->hasMany("App\Ecole");
    }

    public  function associations(){
        return $this->hasMany("App\Association");
    }
}
