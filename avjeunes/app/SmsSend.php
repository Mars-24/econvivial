<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsSend extends Model
{
    public $table = "sms_send";

    protected $fillable = ['destination', 'message'];
}
