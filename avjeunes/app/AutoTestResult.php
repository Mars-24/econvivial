<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoTestResult extends Model
{
    protected $table = 'auto_test_results';
    
    protected $fillable = [
        'user_id',
        'result'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}