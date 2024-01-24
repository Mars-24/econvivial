<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntretienParticipant extends Model
{
    public function entretienpair()
    {
        return  $this->belongsTo(EntretienPair::class, 'entretien_pair_id');
    }

    public function region()
    {
        return  $this->belongsTo(Region::class, 'region_id');
    }
}
