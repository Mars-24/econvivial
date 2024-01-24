<?php

namespace App\Rules;

class Range
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        if (!preg_match('/^ND\d{6}$/', $value)) {
            return true;
        }
        
        info('range', compact('attribute', 'value', 'parameters', 'validator'));
        
        // range
        $start = (int) str_after($parameters[0], 'ND');
        
        $end = (int) str_after($parameters[1], 'ND');
        
        $between = (int) str_after($value, 'ND');
        
        info('range', compact('start', 'end', 'value', 'between', 'result'));
        
        return $between >= $start && $between <= $end;
    }
}