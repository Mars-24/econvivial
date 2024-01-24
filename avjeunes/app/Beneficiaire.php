<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    //

    public function messagegrossesseusers(){
        return  $this->hasMany('App\MessageGrossesseUser');
    }
}
