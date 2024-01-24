<?php

namespace App\Services;

use Carbon\Carbon;

class GenerateUserCode
{
    // generate user code
    public static function generate($numero, $sexe, $age,$country, $profession,$region)
    {

        //info('generate code user', func_get_args());
       
        $codification = [
            'Bénin' => 'BN',
            'Burkina Faso' => 'BF',
            'Cap Vert' => 'CV',
            "Côre d'Ivoire" => 'CI',
            'Gambie' => 'GB',
            'Ghana' => 'GH',
            'Guinée' => 'GN',
            'Guinée Bissau' => 'Gb',
            'Libéria' => 'LB',
            'Mali' => 'ML',
            'Niger' => 'NG',
            'Nigeria' => 'NR',
            'Senegal' => 'SE',
            'Sierra Leone' => 'SL',
            'Togo' => 'TG',
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
            'Grand lomé' => 'L',
            'Maritime' => 'M',
            'Plateaux' => 'P',
            'Centrale' => 'C',
            'Kara' => 'K',
            'Savanes' => 'S',
            'AUT' => 'L',
        ];
        //return dd($age);

        // process
        $phone_number = preg_replace('/\s+/', '', $numero);

        $country_code = substr($phone_number, 0, 4);

        $phone_number_withount_country_code = substr($phone_number, 4);

        $first_two_number = substr($phone_number_withount_country_code, 0, 2);

        $last_six_number = substr($phone_number_withount_country_code, -6);

        $country=$codification[$country];
        if($country=='TG'){
            $region=$codification[$region];
        }

        // generated code
        // $code = $codification[$country_code]
        $code = $country
            . $codification[$first_two_number[0]]
            . $codification[$first_two_number[1]]
           . $last_six_number
            .'-'. $codification[$profession]
           .'-' . $region
            .'-'. $sexe
           .'-'. Carbon::today()->diffInYears($age);
        

       // info('generated code', ['code' => $code]);

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
