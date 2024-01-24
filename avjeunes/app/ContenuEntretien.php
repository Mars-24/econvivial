<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenuEntretien extends Model
{
    //

    public  function typeentretien(){
        return $this->belongsTo("App\TypeEntretien", "type_entretien_id");
    }

    public  function entretien(){
        return $this->hasMany("App\Entretien");
    }
}
