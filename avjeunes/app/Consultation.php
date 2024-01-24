<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public function formationSanitaire()
    {
        return $this->belongsTo(FormationSanitaire::class, 'formation_sanitaire_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function objetConsultation()
    {
        return $this->belongsTo(ObjetConsultation::class, 'objet_consultation_id');
    }
    
    public function resultatConsultations()
    {
        return $this->hasMany(ResultatConsultation::class);
    }
}
