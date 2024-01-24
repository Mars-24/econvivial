<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Excel;

class NotifToken extends Model
{
    //

    public function sendNotificationToUser($users,$titre, $message){

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
            'small_icon'=> "logo_notification",
            'large_icon'=> "ic_launcher_ecentre_round",
            'android_led_color'=> "FFFF0000",
            'android_sound'=> "notification"
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



    public function sendSMS($numero, $message){

        try {
            $serverUrl = "http://aspsmsapi.com/http/sendsms.aspx?"; // URL de base
            $dest = $numero; // Numéro du destinataire au foramt international
            $username = "22892391171"; // Votre nom d'utilisateur
            $apikey = "URTX55MUJW"; // Votre clé API
            $msg = $message; // Contenu du message
            $senderid = "ASPSMS"; // Identifiant d'envoi
            $authmode = "http"; // Obligatoire. Ne pas modifier
            // CURL_INIT
            $ch = curl_init($serverUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,"dest=$dest&username=$username&apikey=$apikey&senderid=$senderid&msg=$msg&authmode=$authmode");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $output = curl_exec($ch); // Afficher le résultat du serveur
            curl_close($ch);

            return  $output;

        }catch(Exception $ex) {
            echo $ex;
        }
    }


    public function sendProviderSMS($numero, $message, $source = 'eConvivial')
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


       public function exportToExcel($title,$data, $heading){
        Excel::create($title, function($excel) use($data, $heading,$title) {
            $excel->setTitle($title);
            $excel->sheet('ExportFile', function($sheet) use($data, $heading) {
                $sheet->row(1, $heading);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }

}



class Sender{
var $host="nticsolutions3.com";
/*
* Username that is to be used for submission
*/
var $strUserName="econvivial";
/*
* password that is to be used along with username
*/
var $strPassword="ecentre2019";
/*
* Sender Id to be used for submitting the message
*/
var $strSender;
/*
* Message content that is to be transmitted
*/
var $strMessage;
/*
* Mobile No is to be transmitted.
*/
var $strMobile;
//Constructor..
public function Sender ($sender,$message,$mobile)
{
$this->strSender= $sender;
$this->strMessage=$message; //URL Encode The Message..
$this->strMobile=$mobile;
}

public function Submit()
{

    $this->strMessage=urlencode($this->strMessage);
try{
// http Url to send sms.
$live_url="http://".$this->host."/sendsms/?username=".$this->strUserName."&password=".$this->strPassword."&destination=".$this->strMobile."&source=".$this->strSender."&message=".urlencode($this->strMessage);
$parse_url=file($live_url);
//echo $parse_url["code"];
}catch(Exception $e){
echo 'Message:' .$e->getMessage();
}
return $parse_url[2];
}
}
