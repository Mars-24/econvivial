<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teleconseiller extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
    ];

    
}
