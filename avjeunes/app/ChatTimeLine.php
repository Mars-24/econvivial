<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatTimeLine extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function assistant()
    {
        return $this->belongsTo(User::class, 'assistant_id');
    }
}
