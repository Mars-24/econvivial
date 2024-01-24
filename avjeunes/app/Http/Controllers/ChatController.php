<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatTimeLine;
use App\Notifications\RepliedToThread;
use App\NotifToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ChatController extends Controller
{
    //

    public function sendChat(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $this->validate($request,[
            "message" => "required",
        ]);

        if(Auth::user()->typeuser->libelle == "utilisateur"){

                $chatLines = ChatTimeLine::where('user_id', Auth::user()->id)->get();

                if(count($chatLines) == 0){
                    $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();

                    //Affectation des assistants aux utilisateurs
                    foreach ($assistants as $assistant){
                        $chatTimeLine = new ChatTimeLine();
                        $chatTimeLine->unReadMessage = 0;
                        $chatTimeLine->unReadAssistant = 0;
                        $chatTimeLine->lastMessage = null;
                        $chatTimeLine->updateTime = null;
                        $chatTimeLine->assistant_id = $assistant->id;
                        $chatTimeLine->user_id = Auth::user()->id;
                        $chatTimeLine->save();
                    }
                }
        }else{
            $chatLines = ChatTimeLine::where('user_id', $request["receiverID"])->get();

            if(count($chatLines) == 0){
                $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();

                //Affectation des assistants aux utilisateurs
                foreach ($assistants as $assistant){
                    $chatTimeLine = new ChatTimeLine();
                    $chatTimeLine->unReadMessage = 0;
                    $chatTimeLine->unReadAssistant = 0;
                    $chatTimeLine->lastMessage = null;
                    $chatTimeLine->updateTime = null;
                    $chatTimeLine->assistant_id = $assistant->id;
                    $chatTimeLine->user_id = $request["receiverID"];
                    $chatTimeLine->save();
                }
            }
        }

        try{
            $user = User::where("id", $request["receiverID"])->first();

            $chat = new Chat();
            $chat->message = $request["message"];
            $chat->sender_id = Auth::user()->id;
            $chat->type_sender_id =  Auth::user()->type_user_id;
            $chat->receiver_id = $user->id;
            $chat->type_receiver_id = $user->type_user_id;
            $chat->readMessage = false;
            $chat->save();


            /**
             * Mettre à jour la table ChatTimeLines
             */

            if(Auth::user()->typeuser->libelle == "utilisateur"){
                $chatTime = ChatTimeLine::where("user_id", Auth::user()->id)->where("assistant_id",$user->id)->first();

                if($chatTime != null){
                    $chatTime->lastMessage = $request["message"];
                    $chatTime->unReadAssistant = $chatTime->unReadAssistant + 1;
                    $chatTime->updateTime = new \DateTime();
                    $chatTime->save();
                }

            }else{
                $chatTime = ChatTimeLine::where("user_id", $user->id)->where("assistant_id",Auth::user()->id)->first();

                if($chatTime != null){
                    $chatTime->lastMessage = $request["message"];
                    $chatTime->unReadMessage = $chatTime->unReadMessage + 1;
                    $chatTime->updateTime = new \DateTime();
                    $chatTime->save();
                }
            }


          /**
             * Notifier tous les administrateurs de ma demande de suivi
             */

            $user->notify(new RepliedToThread("Assistance en ligne",Auth::user()));

            $tokens = array();

            if($user->id != null){
                $notifKey = NotifToken::where("user_id", $user->id)->first();
                if($notifKey !=null)
                $tokens[] =  $notifKey->token;
            }

            $notifToken = new NotifToken();

            $notifToken->sendNotificationToUser($tokens, "Assistance eConvivial", $request["message"]);


            $results["chat"] = "Message envoyé";
            $results["error"] = false;


        }catch (Exception $e){
            $results["chat"] = "Erreur lors de l'envoie";
            $results["error"] = true;
        }
        return $results;
    }

    public function refreshChat(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $chats = DB::select("select * from chats where readMessage  is false  and receiver_id = '".Auth::user()->id."' and sender_id =".$request["id"]."  order by id asc");
      //  $chats = DB::select("select * from chats where readMessage  is false and ( (sender_id = ".Auth::user()->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".Auth::user()->id."))");

        if(count($chats) > 0){
            $results["error"] = false;
            $results["chats"] = $chats;

            $chat = Chat::where("id", $chats[0]->id)->first() ;
            $chat->readMessage = true;
            $chat->save();

            /**
             * Mettre à jour la table ChatTimeLines
             */

            if(Auth::user()->typeuser->libelle == "utilisateur"){

                $chatTime = ChatTimeLine::where("user_id", Auth::user()->id)->where("assistant_id",$request["id"])->first();

                if($chatTime != null){
                    $results["user"] = "true";
                    if($chatTime->unReadMessage > 0){
                        $chatTime->unReadMessage = $chatTime->unReadMessage - 1;
                        $chatTime->save();
                    }
                }


            }else{
                $chatTime = ChatTimeLine::where("user_id", $request["id"])->where("assistant_id",Auth::user()->id)->first();

                if($chatTime != null){
                    if($chatTime->unReadAssistant > 0){
                        $chatTime->unReadAssistant = $chatTime->unReadAssistant - 1;
                        $chatTime->save();
                    }
                }
            }


            return $results;
        }else{
            $results["error"] = true;
            $results["chats"] = null;
            return $results;
        }
    }

    public function retrieveChatForSpecificUser(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $chats = DB::select("select * from chats where (sender_id = ".Auth::user()->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".Auth::user()->id.")  order by id asc");

        $results["error"] = false;
        $results["chats"] = $chats;

        DB::update("update chats set readMessage = true where readMessage = false  and ((sender_id = ".Auth::user()->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".Auth::user()->id."))");

        /**
         * Mettre à jour la table ChatTimeLines
         */

        /**
         * Mettre à jour la table ChatTimeLines
         */

        if(Auth::user()->typeuser->libelle == "utilisateur"){

            $chatTime = ChatTimeLine::where("user_id", Auth::user()->id)->where("assistant_id",$request["id"])->first();

            if($chatTime != null){
                $chatTime->unReadMessage = 0;
                $chatTime->save();
            }


        }else{
            $chatTime = ChatTimeLine::where("user_id", $request["id"])->where("assistant_id",Auth::user()->id)->first();

            if($chatTime != null){
                $chatTime->unReadAssistant = 0;
                $chatTime->save();
            }
        }



        return $results;
    }

    public function retrieveChatForSpecificUserAndConseiller(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $chats = DB::select("select * from chats where (sender_id = ".$request['conseiller_id']." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".$request['conseiller_id'].") order by id asc");

        $results["error"] = false;
        $results["chats"] = $chats;

        // DB::update("update chats set readMessage = true where sender_id ='".$request["id"]."' and receiver_id =".Auth::user()->id);

        return $results;

    }

    public function isTyping(Request $request){

    }

    public function notTyping(Request $request){

    }

    public function getLastUserMessage(){

        $users = DB::select("select * from users where id in (select distinct sender_id from chats where receiver_id =".Auth::user()->id.") order by created_at asc");

    }

    /**
     * Second assistance en ligne
     */

    public function sendChatTeleConseiller(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $this->validate($request,[
            "message" => "required",
        ]);

        try{

            $user = User::where("id", $request["senderID"])->first();

            $receiverID = User::where("id", $request["receiverID"])->first();

            if($user->typeuser->libelle == "utilisateur"){

                $chatLines = ChatTimeLine::where('user_id', $receiverID->id)->get();

                if(count($chatLines) == 0){
                    $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();

                    //Affectation des assistants aux utilisateurs
                    foreach ($assistants as $assistant){
                        $chatTimeLine = new ChatTimeLine();
                        $chatTimeLine->unReadMessage = 0;
                        $chatTimeLine->unReadAssistant = 0;
                        $chatTimeLine->lastMessage = null;
                        $chatTimeLine->updateTime = null;
                        $chatTimeLine->assistant_id = $assistant->id;
                        $chatTimeLine->user_id = $user->id;
                        $chatTimeLine->save();
                    }
                }
            }else{

                $chatLines = ChatTimeLine::where('user_id', $request["receiverID"])->get();

                if(count($chatLines) == 0){
                    $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();

                    //Affectation des assistants aux utilisateurs
                    foreach ($assistants as $assistant){
                        $chatTimeLine = new ChatTimeLine();
                        $chatTimeLine->unReadMessage = 0;
                        $chatTimeLine->unReadAssistant = 0;
                        $chatTimeLine->lastMessage = null;
                        $chatTimeLine->updateTime = null;
                        $chatTimeLine->assistant_id = $assistant->id;
                        $chatTimeLine->user_id = $request["receiverID"];
                        $chatTimeLine->save();
                    }
                }
            }

            $chat = new Chat();
            $chat->message = $request["message"];
            $chat->sender_id = $user->id;
            $chat->type_sender_id =  $user->type_user_id;
            $chat->receiver_id = $receiverID->id;
            $chat->type_receiver_id = $receiverID->type_user_id;
            $chat->readMessage = false;
            $chat->save();

            /**
             * Mettre à jour la table ChatTimeLines
             */

                $chatTime = ChatTimeLine::where("user_id", $receiverID->id)->where("assistant_id",$user->id)->first();

                if($chatTime != null){
                    $chatTime->lastMessage = $request["message"];
                    $chatTime->unReadMessage = $chatTime->unReadMessage + 1;
                    $chatTime->updateTime = new \DateTime();
                    $chatTime->save();
                }

            /**
             * Notifier tous les administrateurs de ma demande de suivi
             */

            $user->notify(new RepliedToThread("Assistance en ligne",$receiverID));
            $results["chat"] = "Message envoyé";
            $results["error"] = false;

        }catch (Exception $e){

            $results["chat"] = "Erreur lors de l'envoie";
            $results["error"] = true;

        }

        return $results;
    }

    public function refreshChatTeleConseiller(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $sender = User::where("id", $request["senderID"])->first();

        $chats = DB::select("select * from chats where readMessage  is false  and receiver_id = '".$sender->id."' and sender_id =".$request["id"]."  order by id asc");

        //$chats = DB::select("select * from chats where readMessage  is false and ( (sender_id = ".Auth::user()->id."
        //and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."
        //and  receiver_id = ".Auth::user()->id."))");

        if(count($chats) > 0){
            $results["error"] = false;
            $results["chats"] = $chats;

            $chat = Chat::where("id", $chats[0]->id)->first() ;
            $chat->readMessage = true;
            $chat->save();

            /**
             * Mettre à jour la table ChatTimeLines
             */

            $chatTime = ChatTimeLine::where("user_id", $sender->id)->where("assistant_id",$request["id"])->first();

            if($chatTime != null){
                if($chatTime->unReadAssistant > 0){
                    $chatTime->unReadAssistant = $chatTime->unReadAssistant - 1;
                    $chatTime->save();
                }
            }

            return $results;
        }else{
            $results["error"] = true;
            $results["chats"] = null;
            return $results;
        }
    }

    public function retrieveChatForSpecificUserTeleConseiller(Request $request){

        $results["error"] = true;
        $results["chat"] = null;

        $sender = User::where("id", $request["senderID"])->first();

        $chats = DB::select("select * from chats where (sender_id = ".$sender->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".$sender->id.")  order by id asc");

        $results["error"] = false;
        $results["chats"] = $chats;

        DB::update("update chats set readMessage = true where readMessage = false  and ((sender_id = ".$sender->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".$sender->id."))");

        /**
         * Mettre à jour la table ChatTimeLines
         */

        $chatTime = ChatTimeLine::where("user_id", $sender->id)->where("assistant_id",$request["id"])->first();

        if($chatTime != null){
            $chatTime->unReadAssistant = 0;
            $chatTime->save();
        }

        return $results;
    }

}
