<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    public function  users()
    {
        return $this->hasMany(User::class);
    }
    
    // query only utilisateurs
    public function scopeUtilisateurs($query)
    {
        return $query->where('libelle', 'utilisateur');
    }
}
