<?php

namespace App\Http\Controllers;

use App\NotifToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifController extends Controller
{
    //

    public function index(){
        $test  = array("1","2", "3");
        return $test;
        return view("Login.notif");
    }

    public function saveTokenInDataBase(){
        $response["etat"] = false;
        if(isset($_GET)){
        $token = $_GET["token"];
        $id = $_GET["identifiant"];

        $verifyNotifUser =   NotifToken::where("user_id", $id)->first();
        if($verifyNotifUser == null){
            $notifUser = new NotifToken();
            $notifUser->token = $token;
            $notifUser->user_id = $id;
            $notifUser->save();
            $response["etat"] = true;
            return response()->json($response);
        }else{
            if($verifyNotifUser->token != $token){
                
                $verifyNotifUser->token = $token;
                $verifyNotifUser->save();
                
                $response["etat"] = true;
                return response()->json($response);
            }
        }
            return response()->json($response);
        }
    }


    public function postSendNotification(Request $request){

        $users = DB::select("select token from notif_tokens");

        $notifToken = new NotifToken();
        
        $tokens = array();
        
        foreach ($users as  $user) {
                $tokens = $user->token;
        }    
       // return $tokens;

        $result = $notifToken->sendNotificationToUser($users, $request["titre"], $request["message"]);

        return $result;
    }
}
