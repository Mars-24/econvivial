<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PairEducateur extends Model
{
    public function  users()
    {
        return $this->hasMany("App\User");
    }

    public function  ecole()
    {
        return $this->belongsTo(Ecole::class, "ecole_id")->withDefault();
    }

    public function  region()
    {
        return $this->belongsTo("App\Region", "region_id");
    }

    public function  association()
    {
        return $this->belongsTo("App\Association", "association_id");
    }

    public function  entretien()
    {
        return $this->hasMany("App\Entretien");
    }
}
