<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeActivite extends Model
{
    //
    public function entretienpair(){
        return $this->hasMany("App\EntretienPair");
    }

}
