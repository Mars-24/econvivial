<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEntretien extends Model
{
    //

    public function contenuentretiens(){
        return $this->hasMany("App\ContenuEntretien");
    }
}
