<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getQuizQuestion($number, $module){

         if($module == 5 && $number <= 5){
            switch ($number){
                case 1:
                    return "Qu’est-ce qu’une IST";
                    break;
                case 2:
                    return "Quels sont les différents types d’IST ?";
                    break;
                case 3:
                    return "Quels sont les modes  de  transmission  des  IST ?";
                    break;
                case 4:
                    return "Quelles sont les mesures  préventives  des  IST ?";
                    break;
                case 5:
                    return "Quelles sont les conduites à tenir en  cas  d’IST ?";
                    break;
            }
        }else{
             $question = QuizQuestion::where("id", $number)->first();
            if($question != null){
                return $question->libelle;
            }else{
                return "No label";
            }
        }
    }
}
