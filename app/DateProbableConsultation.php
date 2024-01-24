<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateProbableConsultation extends Model
{
    //
    
    public function suivigrossesse(){
        return  $this->belongsTo('App\TypeUser' , 'suivi_grossesse_id');
    }
}
