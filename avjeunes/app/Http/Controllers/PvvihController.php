<?php

namespace App\Http\Controllers;

use App\MessagePvvih;
use App\MessagePvvihUser;
use App\NotificationMessage;
use App\NotifToken;
use App\Pvvih;
use App\Region;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PvvihController extends Controller
{
    //

    public function getFormPvvih(){
        $regions  = Region::all();
        return view("InnovHealth.Pvvih.agent.index")
            ->with(["regions" => $regions])
            ->with(["page" => "dashboard"]);
    }

    public function savePvvih(Request $request){

        $dateJour = new \DateTime();

        $pvvih = new Pvvih();
        $pvvih->nom = $request["name"];
        $pvvih->prenom = $request["prenom"];
        $pvvih->telephone = "+228 ".$request["telephone"];
        $pvvih->region_id = $request["region"];
        $pvvih->langue = $request["langue"];
        $pvvih->sexe = $request["sexe"];
        $pvvih->action = $request["action"];
        $pvvih->typePlainte = $request["typePlainte"];
        $pvvih->origine = "W";
        $pvvih->save();

        $identifiant = $pvvih->id;
        $initName = strtoupper(substr($request["name"], 0,2));
        $initPrenom = strtoupper(substr($request["prenom"],0,2));
        $initMois = strtoupper($dateJour->format("M"));
        $year = $dateJour->format("y");

        $pvvih->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$pvvih->sexe;

        $pvvih->save();

        return redirect()->route("liste-pvvih-attente-validation")
                        ->with(["message" => "Personne enrégistrer avec succès"]);
    }

    public function getListeAttente(){
        $pvvihs = Pvvih::where("validation1", false)->get();
        return view("InnovHealth.Pvvih.agent.attente")->with(["page" => "pvvih-non-valider"])->with(["pvvihs" => $pvvihs]);
    }

    public function getListeValider(){
        $pvvihs = Pvvih::where("validation1", true)->get();
        return view("InnovHealth.Pvvih.agent.valider")->with(["page" => "pvvih-valider"])->with(["pvvihs" => $pvvihs]);
    }

    /**
     * Superviseur de PVVIH
     */

    public function getListeAttenteSup(){
        $pvvihs = Pvvih::where("validation1", false)->get();
        return view("InnovHealth.Pvvih.sup.attente")->with(["page" => "pvvih-non-valider-sup"])->with(["pvvihs" => $pvvihs]);
    }

    public function getListeValiderSup(){
        $pvvihs = Pvvih::where("validation1", true)->get();
        return view("InnovHealth.Pvvih.sup.valider")->with(["page" => "pvvih-valider-sup"])->with(["pvvihs" => $pvvihs]);
    }

    public function postValidation(Request $request){

        $pvvih = Pvvih::where("id", $request["id"])->first();

        if($pvvih != null){
            $pvvih->validation1 = true;
            $pvvih->save();
            return redirect()->route("liste-pvvih-valider-superviseur")->with(["message" => "Enrégistrement validé"]);
        }

        return redirect()->back()->with(["error" => "Impossible de valider"]);
    }


    /**
     * Page d'envoie de sms aux pvvih
     */

    public function getPageEnvoieSms(){
        $pvvihs = Pvvih::orderBy("id", "desc")->get();
        return view("InnovHealth.Pvvih.agent.message")
            ->with(["pvvihs" => $pvvihs])
            ->with(["page" => "message-pvvih"]);
    }

    public function postMessagePvvih(Request $request){

        if(count($request["choix"]) == 0){
            return redirect()->back()
                ->with(["error" => "Impossible de diffuser le message. Veuillez sélectionner les destinataires"])
                ->withInput();
        }

        $ids = $request["choix"];

        //Enrégistrement du message

        $message = new MessagePvvih();
        $message->message = $request["message"];
        $message->user_id = Auth::user()->id;
        $message->save();

        $count = 0;
        $tokens = array();

        foreach ($ids as $id) {

            $beneficiaire = Pvvih::where("id", $id)->first();

            if($beneficiaire != null){

                if($beneficiaire->user_id != null){
                    $tokens[] =  NotifToken::where("user_id", $beneficiaire->user_id)->first()->token;
                }

                    $userNumber = preg_replace('/\s+/', '', substr($beneficiaire->numero,1));
                    $client = new Client();
                  //  $res = $client->request('GET', "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".$request["message"]);

                    //if($res->getStatusCode() == 200){
                        //Enrégistrer la ligne ds MessageGrossesseUser

                        $msgUser = new MessagePvvihUser();
                        $msgUser->recu = true;
                        $msgUser->message_pvvih_id = $message->id;
                        $msgUser->pvvih_id = $beneficiaire->id;
                        $msgUser->save();
                        $count++;
                   /* }else{

                    }  */

                    /**
                     * Enregistrement des notifications
                     */

                    $notifMessage = new NotificationMessage();
                    $notifMessage->message = $request["message"];
                    $notifMessage->type = "PVVIH";
                    $notifMessage->user_id = $beneficiaire->user_id;
                    $notifMessage->save();
            }
        }

        $message->delivrer = true;
        $message->nbreRecu = $count;
        $message->save();

        $notifToken = new NotifToken();

        $notifToken->sendNotificationToUser($tokens, "Alerte PVVIH", $request["message"]);



        return redirect()->route("liste-message-pvvih-diffuser")->with(["message" => "Message diffusé avec succès"]);
    }

    public function getListeMessagePvvih(){
        $messages = MessagePvvih::orderBy("id", "desc")->get();
        return view("InnovHealth.Pvvih.agent.listeMessage")
            ->with(["messages" => $messages])
            ->with(["page" => "liste-message-pvvih"]);
    }

    public function detailMessagePvvih(){
        if(isset($_GET)){
            $ref = $_GET["ref"];
            $message = MessagePvvih::where("id", $ref)->first();

            if($message != null){
                $detailMessages = MessagePvvihUser::where("message_pvvih_id", $message->id)->get();
                return view("InnovHealth.Pvvih.agent.detailListeMessage")
                    ->with(["detailMessages" => $detailMessages])
                    ->with(["message" => $message])
                    ->with(["page" => "liste-message-pvvih"]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la liste des destinataires"]);

    }

    public function getListePlainteMobile(){
        $pvvihs = Pvvih::where("origine", "M")->get();
        return view("InnovHealth.Pvvih.agent.listePlainteMobile")->with(["page" => "plainte-mobile"])->with(["plaintes" => $pvvihs]);
    }

    public function getPageAssistanceLigne(){

        $dateJour = new \DateTime();
        $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
        $dateFin = $dateJour->format("y-m-d")." 23:59:59";

        //$users = User::where("profession_conseiller_id", "<>", "null")->orderBy("id", "asc")->get();
        //$users = DB::select("select * from users where id in (select distinct sender_id from chats where receiver_id =".Auth::user()->id." order by created_at desc) ");
        $users = DB::select("select DISTINCT u.* from chats c, users u where c.sender_id = u.id and c.receiver_id = ".Auth::user()->id." order by c.created_at desc");

        $chats = [];

        if(count($users) > 0)
            $chats = DB::select("select * from chats where  (sender_id = ".Auth::user()->id." and  receiver_id = ".$users[0]->id.") or ( sender_id = ".$users[0]->id."  and  receiver_id = ".Auth::user()->id.")  order by id asc");

        $date = new \DateTime();

        return view("InnovHealth.Pvvih.agent.assistance")
            ->with(["chats" => $chats])
            ->with(["user" => null])
            ->with(["date" => new Carbon($date->format("Y-M-d"))])
            ->with(["page" => "assistance-en-ligne"])
            ->with(["users" => $users]);

    }
}
