<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable=["name","slug","stripe_plan","price","description"];

    public function getRouteKeyName(){
        return 'slug';
    }
}
