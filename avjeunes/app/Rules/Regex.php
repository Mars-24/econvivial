<?php

namespace App\Rules;

class Regex
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        return preg_match($parameters[0], $value) || preg_match($parameters[1], $value);
    }
}