<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    //

    public function  paireducateur(){
        return $this->belongsTo("App\PairEducateur", "pair_educateur_id");
    }

    public function  contenuentretien(){
        return $this->belongsTo("App\ContenuEntretien", "contenu_entretien_id");
    }


}
