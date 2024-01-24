<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;

class NotifToken extends Model
{
    public function sendNotificationToUser($users, $titre, $message)
    {
        $content = array(
            "en" => $message
        );

        $heading = array(
            "en" => $titre
        );

        $fields = array(
            'app_id' => "733fb10a-1d29-4b67-acf9-6e06a6ee872f",
            'include_player_ids' => $users,
            'data' => array("title" => $titre, "body" => $message),
            'contents' => $content,
            'headings' => $heading,
            'small_icon' => "logo_notification",
            'large_icon' => "ic_launcher_ecentre_round",
            'android_led_color' => "FFFF0000",
            'android_sound' => "notification"
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MWUwMTZlZjUtOTk0MC00YzRiLWExOGMtNTZmNDQyOTM1Mzgw'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }


    public function sendSMS($numero, $message)
    {
        $url = "http://dstr.connectbind.com:8080/?";

        $fields = array(
            'username' => 'econ-avjeunes',
            'password' => 'AVJ@7Mcq',
            'source' => 'ECONVIVIAL',
            'destination' => urlencode($numero),
            'message' => urlencode($message)
        );

        // url-ify the data for the POST
        $fields_string = "";

        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }

        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);


        //execute post
        $result = curl_exec($ch);

        //echo $result;
        $tb = explode('{"CODE":"', $result);

        info('$resultNotif token', ['$tb' => $tb]);

        $code = $tb[1][0] . $tb[1][1] . $tb[1][2] . $tb[1][3];

        //close connection
        curl_close($ch);

        return $code;
    }


    public function sendProviderSMS($numero, $message, $source = 'ECONVIVIAL')
    {

        //extract data from the post
        //set POST variables
//        $url = "http://sms.edoking.com:8080/bulksms/bulksms?";

        $serverUrl = "http://sendsms.e-mobiletech.com/?"; // URL de base

        // CURL_INIT
        $ch = curl_init($serverUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=econvivial&password=econvivial2020&type=0&dlr=1&destination=" . $numero . "&source=" . $source . "&message=" . $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $output = curl_exec($ch); // Afficher le résultat du serveur
        curl_close($ch);

        SmsSend::create(["destination" => $numero], ["message" => $message]);
        return $output;
    }


    public function exportToExcel($title, $data, $heading)
    {
        Excel::create($title, function ($excel) use ($data, $heading, $title) {
            $excel->setTitle($title);
            $excel->sheet('ExportFile', function ($sheet) use ($data, $heading) {
                $sheet->row(1, $heading);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }

}
