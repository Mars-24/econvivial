<?php

namespace App\Http\Controllers;

use Excel;
use App\Chat;
use App\User;
use App\ChatTimeLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeleConseillerController extends Controller
{
    public function getAdminSuivreConseiller()
    {
        $users = User::where("profession_conseiller_id", "<>", "null")->orderBy("id", "asc")->get();
        return view("Admin.Teleconseiller.index")
                ->with(["conseillers" => $users])
                ->with(["page" => "suivre-conseiller"]);
    }

    public function suivreTeleconseiller(){

        if(isset($_GET)){
            $id = $_GET["id"];
        $conseiller = User::where('id', $id)->first();
        if($conseiller == null){
            return redirect()->route('suivre-teleconseiller')->with(["error" => "Utilisateur corrumpu, impossible de suivre cet utilisateur"]);
        }
            $users = DB::select("select * from users where id in (select distinct sender_id from chats where receiver_id =".$conseiller->id.")");

            $chats = DB::select("select * from chats where  (sender_id = ".$conseiller->id." and  receiver_id = ".$users[0]->id.") or ( sender_id = ".$users[0]->id."  and  receiver_id = ".$conseiller->id.")");

        return view("Admin.Teleconseiller.suivreTeleconseiller")
                    ->with(["conseiller" => $conseiller])
                    ->with(["page" => "suivre-conseiller"])
                    ->with(["chats" => $chats])
                    ->with(["users" => $users]);
        }
        return redirect()->route('suivre-teleconseiller')->with(["error" => "Utilisateur corrumpu, impossible de suivre cet utilisateur"]);
    }

    /**
     * Liste des téléconseillers
     */

    public function getListeAssistant(){

        $result["assistants"] = [];
        $result["error"]  = false;

        if($_GET){

            $identifiant = $_GET["identifiant"];

            $chatLines = ChatTimeLine::where('user_id', $identifiant)->get();

            if(count($chatLines) > 0){
                $assistants = DB::select("select u.id , u.username, c.lastMessage, c.updateTime , c.unReadMessage 
                                from users u, chat_time_lines c
                                where user_id =".$identifiant."
                                and c.assistant_id = u.id 
                                order By c.updateTime desc");

                $data = array();
                foreach ($assistants as $assistant){
                    $hash = array();
                    $hash["id"] = $assistant->id;
                    $hash["username"] = $assistant->username;
                    $hash["lastMessage"] = $assistant->lastMessage;
                    $hash["updateTime"] = $assistant->updateTime;
                    $hash["unReadMessage"] = $assistant->unReadMessage;
                    $hash["messages"] = DB::select("select * from chats where readMessage  is false  and receiver_id = '".$identifiant."' and sender_id =".$assistant->id."  order by id asc");

                    $data[] = $hash;
                }

                $result["assistants"] = $data;
                $result["error"]  = false;

            }else{
                $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();
                $result["assistants"] = $assistants;
                $result["error"]  = false;
            }
            return response()->json($result);
        }

        $result["message"] = "Impossible de récupérer la liste des assistants";
        $result["error"]  = true;
        return response()->json($result);
    }


    /**
     * @param Request $request
     * @return mixed
     * Dynamiser la liste des utilisateurs coté assistant
     */

    public function getListeUtilisateurWeb(Request $request){

        $results["error"] = true;
        $results["timeLines"] = [];


        $chatLines = ChatTimeLine::where('assistant_id', $request["id"])->get();


        if(count($chatLines) > 0){

            $users = DB::select("select u.*, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage, c.updateTime , c.unReadAssistant 
                                from users u, chat_time_lines c
                                where assistant_id =".$request["id"]."
                                and c.user_id = u.id 
                                order By c.updateTime desc");


            $results["timeLines"] = $users;
            $results["error"]  = false;

            return $results;
        }else{
            return $results;
        }
    }


    /**
     * @param Request $request
     * @return mixed
     * Dynamiser la liste des assistants coté utilisateur
     */
    public function getListeAssistantWeb(Request $request){

        $results["error"] = true;
        $results["timeLines"] = null;

        $chatLines = ChatTimeLine::where('user_id', $request["id"])->get();

        if(count($chatLines) > 0){
            $assistants = DB::select("select u.*, c.lastMessage, c.updateTime , c.unReadMessage 
                                from users u, chat_time_lines c
                                where user_id =".$request["id"]."
                                and c.assistant_id = u.id 
                                order By c.updateTime desc");

            $results["timeLines"] = $assistants;
            $results["error"]  = false;
            return $results;
        }else{
            $assistants = User::where("type_user_id", 3)->orderBy("id", "desc")->get();
            $result["timeLines"] = $assistants;
            $result["error"]  = false;
            return $results;
        }
    }
    
    
    public function getListeUserAssister()
    {

        // if(isset($_GET["debut"]) && isset($_GET["fin"])) {

        //     $debut = $_GET["debut"];
        //     $fin = $_GET["fin"];

        //     if ($debut > $fin) {
        //         return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
        //     }

        //     $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage
        //                         from users u, chat_time_lines c
        //                         where c.user_id = u.id 
        //                         and  c.created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59'
        //                         group by c.user_id
        //                         order By c.updateTime desc");

        //     return view("Admin.Teleconseiller.suivreUser")
        //         ->with(["page" => "suivre-user"])
        //         ->with(["debut" => $debut])
        //         ->with(["fin" => $fin])
        //         ->with(["users" => $users]);
        // }else{
        //     $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage 
        //                         from users u, chat_time_lines c
        //                         where c.user_id = u.id 
        //                         group by c.user_id
        //                         order By c.updateTime desc");

        //     return view("Admin.Teleconseiller.suivreUser")
        //         ->with(["page" => "suivre-user"])
        //         ->with(["debut" => null])
        //         ->with(["fin" => null])
        //         ->with(["users" => $users]);
        // }
        
        $page = 'suivre-user';
        
        return view('Admin.Teleconseiller.suivreUser', compact('page'));
    }

    public function exportListeMessage(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage
                                from users u, chat_time_lines c
                                where c.user_id = u.id 
                                and  c.created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                group by c.user_id
                                order By c.updateTime desc");
            }else{
                $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage 
                                from users u, chat_time_lines c
                                where c.user_id = u.id 
                                group by c.user_id
                                order By c.updateTime desc");            }

        }else{
            $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage 
                                from users u, chat_time_lines c
                                where c.user_id = u.id 
                                group by c.user_id
                                order By c.updateTime desc");
        }


        Excel::create('Liste_Utilisateur_Assister', function($excel) use($users) {
            $excel->setTitle("Liste des utilisateurs assistés");
            $excel->sheet('ExportFile', function($sheet) use($users) {

                foreach($users as $user) {
                    $data[] = array(
                        $user->codeUser,
                        $user->username != null ? $user->username : "Non défini",
                        $user->numero,
                        $user->sexe == "M" ? "Masculin" : "Féminin",
                        $user->age,
                        \App\User::where("id", $user->assistant_id)->first()->username
                    );
                }

                $headings = array("Code user","Nom utilisateur", 'N° Téléphone', 'Sexe', 'Age','Assistant');
                $sheet->row(1, $headings);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }

    public function detailUserAssister(){
        if(isset($_GET)){
            $userID = $_GET["id"];

            if(isset($_GET["debut"]) && isset($_GET["fin"])) {

                $debut = $_GET["debut"];
                $fin = $_GET["fin"];

                if ($debut > $fin) {
                    return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
                }

                $chats = DB::select("select * from chats where receiver_id = ".$userID." or  sender_id = ".$userID."  and created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59' order by id asc");
                return view("Admin.Teleconseiller.detailSuiviUser")
                    ->with(["page" => "suivre-user"])
                    ->with(["userID" => $userID])
                    ->with(["debut" => $debut])
                    ->with(["fin" => $fin])
                    ->with(["chats" => $chats]);
            }else{
                $chats = DB::select("select * from chats where receiver_id = ".$userID." or  sender_id = ".$userID."   order by id asc");
                return view("Admin.Teleconseiller.detailSuiviUser")
                    ->with(["page" => "suivre-user"])
                    ->with(["userID" => $userID])
                    ->with(["debut" => null])
                    ->with(["fin" => null])
                    ->with(["chats" => $chats]);
            }
        }

        return redirect()->back()->with(["error" => "Impossible de consulter le détail"]);
    }

    public function deleteChat(Request $request){
        $chat = Chat::where("id", $request["id"])->first();
        if($chat != null){
            $chat->delete();
            return "true";
        }
        return "false";
    }
    
    // get covid-19 assistant with chats for the given user
    public function getCovid19Assistant(Request $request)
    {
        // get user chat time lines
        $query = ChatTimeLine::with([
                'assistant' => function($query) use($request) {
                    // covid 19 assistant messages
                    $query
                        ->select('id', 'username')
                        ->with([
                            'chatsendMessages' => function($query) use($request) {
                                $query->latest()
                                    // ->with(['receiver:id,username'])
                                    // ->where('readMessage', false)
                                    ->where('receiver_id', $request->user);
                                
                                // info('chats', ['query' => $query->toSql()]);
                            }
                        ]);
                }
            ])
            ->whereHas('assistant', function($query) {
                // only covid 19 assistant
                $query->where('type_user_id', 3)->covid19();
            })
            ->where('user_id', $request->user)
            ->orderBy('updateTime', 'DESC');
            
        // info('covid-19 assistant query', ['query' => $query->toSql()]);
        
        $chatTimeLine = $query->first();
            
        return response()->json($chatTimeLine);
            
            
        $query = User::where('type_user_id', 3)->covid19();
        
        $assistant = $query->first(['id', 'username', 'type_user_id', 'teleconseiller_service_type']);
        
        return response()->json($assistant);
            
            
        // $assistants = DB::select("select u.id , u.username, c.lastMessage, c.updateTime , c.unReadMessage 
        //                 from users u, chat_time_lines c
        //                 where user_id =".$request."
        //                 and c.assistant_id = u.id 
        //                 order By c.updateTime desc");
    
        // $data = array();
        // foreach ($assistants as $assistant){
        //     $hash = array();
        //     $hash["id"] = $assistant->id;
        //     $hash["username"] = $assistant->username;
        //     $hash["lastMessage"] = $assistant->lastMessage;
        //     $hash["updateTime"] = $assistant->updateTime;
        //     $hash["unReadMessage"] = $assistant->unReadMessage;
        //     $hash["messages"] = DB::select("select * from chats where readMessage  is false  and receiver_id = '".$identifiant."' and sender_id =".$assistant->id."  order by id asc");
    
        //     $data[] = $hash;
        // }
    
        // $result["assistants"] = $data;
        // $result["error"]  = false;
        
        // // $assistant = $query->first(['id', 'username', 'type_user_id', 'teleconseiller_service_type']);
        
        // return response()->json($assistant);
    }
}
