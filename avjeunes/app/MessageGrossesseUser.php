<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageGrossesseUser extends Model
{
    //

    public function beneficiaire(){
        return  $this->belongsTo('App\Beneficiaire' , 'beneficiaire_id');
    }
}
