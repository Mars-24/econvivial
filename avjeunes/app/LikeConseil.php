<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeConseil extends Model
{
    //
    
    public function user(){
        return  $this->belongsTo('App\User', "user_id");
    }

    public function conseilpratique(){
        return  $this->belongsTo('App\ConseilPratique', "conseil_pratique_id");
    }
}
