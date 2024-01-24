<?php

namespace App\Services;

use Carbon\Carbon;

class GenerateUserCode
{
    // generate user code
    public static function generate($numero, $sexe, $age, $profession, $region)
    {
        info('generate code user', func_get_args());
        
        $codification = [
            '+228' => 'TG',
            '0' => 'C',
            '1' => 'B',
            '2' => 'E',
            '3' => 'R',
            '4' => 'X',
            '5' => 'D',
            '6' => 'Z',
            '7' => 'Y',
            '8' => 'F',
            '9' => 'P',
            'Masculin' => 'M',
            'Féminin' => 'F',
            'Elève' => 'EL',
            'Éleve' => 'EL',
            'Élève' => 'EL',
            'Étudiant' => 'ET',
            'Etudiant' => 'ET',
            'Entrepreneur' => 'AU',
            'Employé' => 'AU',
            'Fonctionnaire' => 'AU',
            'Apprenti' => 'AU',
            'Autre' => 'AU',
            'LC' => 'L',
            'MT' => 'M',
            'PT' => 'P',
            'CT' => 'C',
            'KR' => 'K',
            'SV' => 'S',
            'AUT' => 'L',
        ];
        
        // process
        $phone_number = preg_replace('/\s+/', '', $numero);
        
        $country_code = substr($phone_number, 0, 4);
        
        $phone_number_withount_country_code = substr($phone_number, 4);
        
        $first_two_number = substr($phone_number_withount_country_code, 0, 2);
        
        $last_six_number = substr($phone_number_withount_country_code, -6);
        
        // generated code
        // $code = $codification[$country_code]
        $code = (isset($codification[$country_code]) ? $codification[$country_code] : 'TG')
            . $codification[$first_two_number[0]]
            . $codification[$first_two_number[1]]
            . $last_six_number
            .'-'. $codification[$profession]
            .'-' . $codification[$region]
            .'-'. $sexe
            .'-'. Carbon::today()->diffInYears($age);
            
        info('generated code', ['code' => $code]);
        
        return $code;
    }
    
    // generate sms code
    public static function generateSMSCode()
    {
        $chars = 'abcdefghijkmnopqrstuvwxyz023456789';
        
        srand((double) microtime() * 1000000);
        
        $i = 0;
        
        $code = '' ;

        while ($i <= 4) {
            $num = rand() % 33;
            
            $tmp = substr($chars, $num, 1);
            
            $code = $code . $tmp;
            
            $i++;
        }
        
        return $code;
    }
}