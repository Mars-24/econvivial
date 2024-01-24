<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserCPN extends Model
{
    use Notifiable;

    protected $fillable = [
        'numero',
        'password',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function beneficiaire(){
        return  $this->belongsTo('App\Beneficiaire');
    }
}
