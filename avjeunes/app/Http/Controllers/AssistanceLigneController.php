<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatTimeLine;
use App\Presence;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssistanceLigneController extends Controller
{
    //

    public function index(){
        return view("AssistanceLigne.index");
    }

    public function dashBoard(){

        $dateJour = new \DateTime();
        $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
        $dateFin = $dateJour->format("y-m-d")." 23:59:59";

        $presence = Presence::where("user_id", Auth::user()->id)
            ->where("created_at",">=", $dateDebut )
            ->where("created_at","<=", $dateFin )
            ->first();

        if($presence == null){
            return redirect()->route("marquer-presence-arrivee");
        }

        //$users = User::where("profession_conseiller_id", "<>", "null")->orderBy("id", "asc")->get();
        //$users = DB::select("select * from users where id in (select distinct sender_id from chats where receiver_id =".Auth::user()->id." order by created_at desc) ");
        $users = DB::select("select DISTINCT u.* from chats c, users u where c.sender_id = u.id and c.receiver_id = ".Auth::user()->id." order by c.created_at desc");

        //Ajout de la ligne de chat utilisateur au ChatLine

        foreach ($users as $user){

            $chatLines = ChatTimeLine::where('user_id', $user->id)->get();

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
        }


        $chats = [];

        //Récupération des utilisateurs
        $users = DB::select("select u.* , TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage, c.updateTime , c.unReadAssistant 
                                from users u, chat_time_lines c
                                where assistant_id =".Auth::user()->id."
                                and c.user_id = u.id 
                                order By c.updateTime desc");
                                
        if(count($users) > 0)
        $chats = DB::select("select * from chats where  (sender_id = ".Auth::user()->id." and  receiver_id = ".$users[0]->id.") or ( sender_id = ".$users[0]->id."  and  receiver_id = ".Auth::user()->id.")  order by id asc");

        $date = new \DateTime();

      

        return view("AssistanceLigne.dashboard")
                    ->with(["chats" => $chats])
                    ->with(["date" => new Carbon($date->format("Y-M-d"))])
                    ->with(["page" => "assistance"])
                    ->with(["users" => $users]);
    }

    public function agenda(){
    	return view("Agenda.index");
    }

    public function jeux(){
    	return view("Agenda.jeux");
    }

    public function inscription(){
    	return view("Agenda.inscription");
    }

    public function getMedecinForm(){

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

        $assistants = DB::select("select u.*, c.lastMessage, c.updateTime , c.unReadMessage 
                                from users u, chat_time_lines c
                                where user_id =".Auth::user()->id."
                                and c.assistant_id = u.id 
                                order By c.updateTime desc");

        $chats = DB::select("select * from chats where  (sender_id = ".Auth::user()->id." and  receiver_id = ".$assistants[0]->id.") or ( sender_id = ".$assistants[0]->id."  and  receiver_id = ".Auth::user()->id.")  order by id asc" );

        return view("AssistanceLigne.Medecin.medecin")
                ->with(["chats" => $chats])
                ->with(["page" => "assistance-medecin"])
                ->with(["users" => $assistants]);
    }
    
    
    
    /**
     * Second assistance en ligne
     */

    public function getSecondAssistantChat(){

        if(isset($_GET)){

            $id = $_GET["ref"];

            $teleconseiller = User::where("id", $id)->first();

            if($teleconseiller == null){
                return redirect()->back()->with(["error" => "Impossible de récupérer les infos sur le profil voulu"]);
            }

        $users = DB::select("select DISTINCT u.* from chats c, users u where c.sender_id = u.id and c.receiver_id = ".$id." order by c.created_at desc");

            //Ajout de la ligne de chat utilisateur au ChatLine

            foreach ($users as $user){

                $chatLines = ChatTimeLine::where('user_id', $user->id)->get();

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
            }

        $chats = [];
        if(count($users) > 0)
        $chats = DB::select("select * from chats where  (sender_id = ".$id." and  receiver_id = ".$users[0]->id.") or ( sender_id = ".$users[0]->id."  and  receiver_id = ".$id.")  order by id asc");

        return view("AssistanceLigne.Medecin.teleconseiller")
            ->with(["chats" => $chats])
            ->with(["userID" => $id])
            ->with(["page" => "assistance-teleconseiller"])
            ->with(["users" => $users]);

        }
        return redirect()->back()->with(["error" => "Impossible de récupérer les infos sur le profil voulu"]);
    }


    /**
     * Présence des téléconseillers
     */

    public function getArriverForm(){

        return view("AssistanceLigne.Medecin.arrivee");
    }
	
	public function postPresenceArriverApi(Request $request){

        $presence = new Presence();
        $presence->nom = $request["nom"];
        $presence->prenom = $request["prenom"];
        $presence->fonction = $request["fonction"];
        $presence->programmer = $request["programmer"];
        $presence->periode = $request["periode"];
        $presence->user_id = Auth::user()->id;
        $presence->valider = false;
		
		$presence->save();

        $result['presence'] = $presence;
        return json_encode($result);
    }


    public function postPresenceArriver(Request $request){

        $presence = new Presence();
        $presence->nom = $request["nom"];
        $presence->prenom = $request["prenom"];
        $presence->fonction = $request["fonction"];
        $presence->programmer = $request["programmer"];
        $presence->periode = $request["periode"];
        $presence->user_id = Auth::user()->id;
        $presence->valider = false;

        if($presence->save()){
            return redirect()->route("espacemembre-assistance-en-ligne")
			->with(["message" => "Votre présence a été bien signalé dans le système"]);
        }else{
            return redirect()
			->back()
			->with(["error" => "Impossible d'enrégistrer. Veuillez réessayer"])
			->withInput();
        }
    }

    public function getDepartForm(){

        $dateJour = new \DateTime();
        $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
        $dateFin = $dateJour->format("y-m-d")." 23:59:59";

        $presence = Presence::where("user_id", Auth::user()->id)
            ->where("created_at",">=", $dateDebut )
            ->where("created_at","<=", $dateFin )
            ->where("heureDepart","=", null )
            ->first();

        if($presence == null){
            return redirect()->back()->with(["message" => "Impossible d'afficher la page"]);
        }

        return view("AssistanceLigne.Medecin.depart")
                ->with(["page" => "terminer-activite"])
                ->with(["presence" => $presence]);

    }

    public function postDepartTeleConseiller(Request $request){

        $presence = Presence::where("id", $request["presence"])->first();

        if($presence == null){
            return redirect()->back()->with(["error" => "Impossible d'enrégistrer"]);
        }

        $presence->recuMasculin = $request["recuMasculin"];
        $presence->recuFeminin = $request["recuFeminin"];
        $presence->conseillerMasculin = $request["conseillerMasculin"];
        $presence->conseillerFeminin = $request["conseillerFeminin"];
        $presence->refererMasculin = $request["refererMasculin"];
        $presence->refererFeminin = $request["refererFeminin"];
        $presence->incident = $request["incident"];
        $presence->commentaire = $request["commentaire"];
        $presence->heureDepart = new \DateTime();
        $presence->save();

        if(Auth::check()){
            Auth::logout();
            //Session::clearResolvedInstances();
            return redirect()->route("connexion")->with(["message" => "Vous etes déconnectés"]);
        }
        return redirect()->back();
    }


}
