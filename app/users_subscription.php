<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_subscription extends Model
{
    use HasFactory;
    protected $fillable=['status','ends_at','user_id','plan_id'];
}
