<?php

namespace App\Http\Controllers;

use App\Beneficiaire;
use App\Chat;
use App\ChatTimeLine;
use App\Conjoint;
use App\CPN_Suivi;
use App\DateProbableConsultation;
use App\DateProbableVaccination;
use App\Langue;
use App\LanguePreference;
use App\NotificationMessage;
use App\Notifications\RepliedToThread;
use App\NotifToken;
use App\Pvvih;
use App\Quartier;
use App\User;
use App\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class InnovWebRequestController extends Controller
{
    //

    public function saveSuiviGrossesse(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            try{
                $id = $_GET["id"];
                $nom = $_GET["nom"];
                $prenom = $_GET["prenom"];
                $telephone = $_GET["telephone"];
               // $conjoint = $_GET["conjoint"];
                $languePref = $_GET["langue"];
                $nomConjoint = $_GET["nomConjoint"];
                $prenomConjoint = $_GET["prenomConjoint"];
                $telephoneConjoint = $_GET["telephoneConjoint"];
                $dateRegle = $_GET["dateRegle"];
                $dureeGrossesse = $_GET["dureeGrossesse"];
                $quartierLibelle = $_GET["quartier"];
            }catch (\Exception $e){
                $result["error"] = true;
                $result["message"] = "Erreur lors de la récuperation des données";
                return response()->json($result);
            }

            $quartier = Quartier::where("libelle", $quartierLibelle)->first();

            //$langue_preference = langue_preferences::where("libelle", $langueLibelle)->first();

            /**
             * Enrégistrement des infos du bénéficiaire
             */

            $dateJour = new \DateTime();

           try{

                $beneficiaire = new Beneficiaire();
                $beneficiaire->nom  = $nom;

                $beneficiaire->prenom  = $prenom;
                $beneficiaire->telephone  = $telephone;

              //  $beneficiaire->haveConjoint  = $conjoint;
                $beneficiaire->optionSuivi  = "Suivi de la grossesse";

                $beneficiaire->dateRegle = $dateRegle;
                $beneficiaire->dureeGrossese = $dureeGrossesse;

                $beneficiaire->ptme = false;

                if($quartier != null){
                    $beneficiaire->quartier_id = $quartier->id;
                }

                $beneficiaire->user_id = $id;
                $beneficiaire->telephoneConjoint = $telephoneConjoint;
                $beneficiaire->save();

                $identifiant = $beneficiaire->id;
                $initName = strtoupper(substr($nom, 0,3));
                $initPrenom = strtoupper(substr($prenom,0,3));
                $initMois = strtoupper($dateJour->format("M"));
                $year = $dateJour->format("y");
                $isPMTE = $beneficiaire->ptme ? "O" : "N";

                $beneficiaire->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$isPMTE;

                $beneficiaire->save();
            }catch (\Exception $exception){

                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enregistrement";
                return response()->json($result);
            }

            /**
             * Enrégistrement des infos sur la langue
             */

            try{
                $langue = new LanguePreference();
                $langue->libelle = $languePref;
                $langue->beneficiaire_id = $beneficiaire->id;
                $langue->save();
            }catch (Exception $exception){
                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enregistrement des infos";
                return response()->json($result);
            }

            /**
             * Enrégistrement des infos sur le conjoint
             */

            try{
               /* if($telephoneConjoint != ""){
                    $conjoint  = new Conjoint();
                    $conjoint->nom = $nomConjoint;
                    $conjoint->prenom = $prenomConjoint;
                    $conjoint->telephone = $telephoneConjoint;
                    $conjoint->beneficiaire_id = $beneficiaire->id;
                    $conjoint->save();
                }  */

                $this->saveCPN($beneficiaire->dateRegle,$beneficiaire) ;
            }catch (Exception $exception){
                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enrégistrement des données";
                return response()->json($result);
            }

            $result["error"] = false;
            $result["beneficiaire"] = $beneficiaire->id;
            $result["message"] = "Souscription au suivi de grossesse effectuée.
            Vous recevrez régulièrement des alertes pour un bon suivi de la grossesse";
            return response()->json($result);

        }
        $result["message"] = "Une erreur s'est produite, impossible de souscrire au suivi";
        return response()->json($result);
    }

    public function saveCPN($dateRegle, $beneficiaire){

        $dayCurrent = new \DateTime();
        $dateJour = new Carbon($dayCurrent->format("Y-M-d"));

        $dateLastRegle = new Carbon($dateRegle);

        //  $dateRegleOrigin = new Carbon($dateRegle);

        $nbreSemaine = $dateJour->diffInWeeks($dateLastRegle);


        if($nbreSemaine <= 12){
            $this->storeSuiviGrossesse("CPN 1", $dateLastRegle->addDay(7*12),$beneficiaire->id);
            $dateLastRegle->addDay(-7*12);
        }

        if($nbreSemaine <= 20){
            $this->storeSuiviGrossesse("CPN 2", $dateLastRegle->addDay(7*20),$beneficiaire->id);
            $dateLastRegle->addDay(-7*20);
        }

        if($nbreSemaine <= 26){
            $this->storeSuiviGrossesse("CPN 3", $dateLastRegle->addDay(7*26),$beneficiaire->id);
            $dateLastRegle->addDay(-7*26);
        }

        if($nbreSemaine <= 30){
            $this->storeSuiviGrossesse("CPN 4", $dateLastRegle->addDay(7*30),$beneficiaire->id);
            $dateLastRegle->addDay(-7*30);
        }

        if($nbreSemaine <= 34){
            $this->storeSuiviGrossesse("CPN 5", $dateLastRegle->addDay(7*34),$beneficiaire->id);
            $dateLastRegle->addDay(-7*34);
        }

        if($nbreSemaine <= 36){
            $this->storeSuiviGrossesse("CPN 6", $dateLastRegle->addDay(7*36),$beneficiaire->id);
            $dateLastRegle->addDay(-7*36);
        }

        if($nbreSemaine <= 38){
            $this->storeSuiviGrossesse("CPN 7", $dateLastRegle->addDay(7*38),$beneficiaire->id);
            $dateLastRegle->addDay(-7*38);
        }

        if($nbreSemaine <= 40){
            $this->storeSuiviGrossesse("CPN 8", $dateLastRegle->addDay(7*40),$beneficiaire->id);
            $dateLastRegle->addDay(-7*40);
        }

        $beneficiaire->dateFinSuivi = $dateLastRegle->addDay(7*41);
        $beneficiaire->save();

        $dateLastRegle->addDay(-7*41);

    }

    public function storeSuiviGrossesse($cpn, $dateProbable,$beneficiaireID){
        $consultation = new DateProbableConsultation();
        $consultation->cpn = $cpn;
        $consultation->dateProbable = $dateProbable;
        $consultation->beneficiaire_id = $beneficiaireID;
        $consultation->save();
    }



    /**
     * Suivi vaccinal
     */

    public function saveSuiviInnovVaccination(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            try{
                $id = $_GET["id"];
                $nom = $_GET["nom"];
                $prenom = $_GET["prenom"];
                $telephone = $_GET["telephone"];
                $conjoint = $_GET["conjoint"];
                $languePref = $_GET["langue"];
                $nomConjoint = $_GET["nomConjoint"];
                $prenomConjoint = $_GET["prenomConjoint"];
                $telephoneConjoint = $_GET["telephoneConjoint"];
                $dateAccouchement = $_GET["dateAccouchement"];
                $ageBebe = $_GET["ageBebe"];
                $nomBebe = $_GET["nomBebe"];
            }catch (\Exception $e){
                $result["error"] = true;
                $result["message"] = "Erreur lors de la récuperation des données";
                return response()->json($result);
            }

            /**
             * Enrégistrement des infos du bénéficiaire
             */

            $dateJour = new \DateTime();

            try{

                $beneficiaire = new Beneficiaire();
                $beneficiaire->nom  = $nom;

                $beneficiaire->prenom  = $prenom;
                $beneficiaire->telephone  = $telephone;

                $beneficiaire->haveConjoint  = $conjoint;
                $beneficiaire->optionSuivi  = "Suivi vaccinal";

                $beneficiaire->dateAccouchement = $dateAccouchement;
                $beneficiaire->ageBebe = $ageBebe;
                $beneficiaire->nomBebe = $nomBebe;

                $beneficiaire->ptme = false;
                $beneficiaire->user_id = $id;
                $beneficiaire->telephoneConjoint = $telephoneConjoint;

                $beneficiaire->save();

                $identifiant = $beneficiaire->id;
                $initName = strtoupper(substr($nom, 0,3));
                $initPrenom = strtoupper(substr($prenom,0,3));
                $initMois = strtoupper($dateJour->format("M"));
                $year = $dateJour->format("y");
                $isPMTE = $beneficiaire->ptme ? "O" : "N";

                $beneficiaire->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$isPMTE;

                $beneficiaire->save();
            }catch (\Exception $exception){

                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enregistrement";
                return response()->json($result);
            }

            /**
             * Enrégistrement des infos sur la langue
             */

            try{
                $langue = new LanguePreference();
                $langue->libelle = $languePref;
                $langue->beneficiaire_id = $beneficiaire->id;
                $langue->save();
            }catch (Exception $exception){
                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enregistrement des infos";
                return response()->json();
            }

            /**
             * Enrégistrement des infos sur le conjoint
             */

            try{
              /*  if($beneficiaire->haveConjoint){
                    $conjoint  = new Conjoint();
                    $conjoint->nom = $nomConjoint;
                    $conjoint->prenom = $prenomConjoint;
                    $conjoint->telephone = $telephoneConjoint;
                    $conjoint->beneficiaire_id = $beneficiaire->id;
                    $conjoint->save();
                }  */

                $this->saveSuiviVaccination($beneficiaire->dateAccouchement,$beneficiaire);
            }catch (Exception $exception){
                $result["error"] = true;
                $result["message"] = "Erreur lors de l'enrégistrement des données";
                return response()->json($result);
            }

            $result["error"] = false;
            $result["beneficiaire"] = $beneficiaire->id;
            $result["message"] = "Souscription au suivi de vaccination effectuée.
            Vous recevrez régulièrement des alertes pour un bon suivi de la vaccination de votre enfant";
            return response()->json($result);

        }

        $result["message"] = "Une erreur s'est produite, impossible de souscrire au suivi";
        return response()->json($result);
    }

    public function saveSuiviVaccination($dateAccoucher, $beneficiaire){

        $dateAccouchement = new Carbon($dateAccoucher);

        $this->storeVaccination("Date accouchement", $dateAccouchement, "Polio + BCG", $beneficiaire->id);

        $this->storeVaccination("6ème semaine", $dateAccouchement->addDay(7*6), "Penta 1 + Pneumo 1 + Rota 1 + Polio 1", $beneficiaire->id);

        $dateAccouchement->addDay(-7*6);

        $this->storeVaccination("10ème semaine", $dateAccouchement->addDay(7*10), "Penta 2 + Pneumo 2 + Rota 2 + Polio 2", $beneficiaire->id);

        $dateAccouchement->addDay(-7*10);

        $this->storeVaccination("14ème semaine", $dateAccouchement->addDay(7*14), "Penta 3 + Pneumo 3 + Rota 3  + Polio 3", $beneficiaire->id);

        $dateAccouchement->addDay(-7*14);

        $this->storeVaccination("9ème mois", $dateAccouchement->addDay(7*41), "RR & VAA", $beneficiaire->id);

        $dateAccouchement->addDay(-7*41);

        $beneficiaire->dateFinSuivi = $dateAccouchement->addDay(7*41);
        $beneficiaire->save();
        $dateAccouchement->addDay(-7*41);
    }

    public function  storeVaccination($semaine, $dateProbable,$vaccin, $beneficiaireID){
        $vaccination = new DateProbableVaccination();
        $vaccination->semaine = $semaine;
        $vaccination->dateProbable = $dateProbable;
        $vaccination->libelleVaccin = $vaccin;
        $vaccination->beneficiaire_id = $beneficiaireID;
        $vaccination->save();
    }


    /**
     * Liste de souscription suivi grossesse
     */

    public function getListeSuiviGrossesse(){


        $result["liste"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            $beneID = $_GET["beneficiaire"];

            $beneficiaire = Beneficiaire::where("id", $beneID)->first();

            if($beneficiaire != null){

                $grossesses = DateProbableConsultation::where("beneficiaire_id", $beneID)->get();


                $result["liste"] = $grossesses;
                $result["dateFinGrossesse"] = $beneficiaire->dateFinSuivi;
                $result["error"]  = false;
                return response()->json($result);
            }

            $result["message"] = "Une erreur s'est produite";
            $result["error"]  = true;
            return response()->json($result);
        }
    }


    public function getListeSuiviVaccination(){


        $result["liste"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            $beneID = $_GET["beneficiaire"];

            $beneficiaire = Beneficiaire::where("id", $beneID)->first();

            if($beneficiaire != null){

                $grossesses = DateProbableVaccination::where("beneficiaire_id", $beneID)->get();

                $result["liste"] = $grossesses;
                $result["dateFinSuivi"] = $beneficiaire->dateFinSuivi;
                $result["error"]  = false;
                return response()->json($result);
            }

            $result["message"] = "Une erreur s'est produite";
            $result["error"]  = true;
            return response()->json($result);
        }
    }


    /**
     * Annuler le suivi de femme enceinte
     */

    public function postAnnulerSuiviGrossesse(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            $beneID =  $_GET["beneficiaire"];

            $beneficiaire = Beneficiaire::where("id", $beneID)->first();

            if($beneficiaire != null){
                $beneficiaire->delete();

                $result["message"] = "Souscription annuler avec succès";
                $result["error"]  = false;
                return response()->json($result);
            }
        }

        $result["message"] = "Impossible d'annuler";
        $result["error"]  = true;
        return response()->json($result);
    }


    public function postAnnulerSuiviVaccination(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){
            $pvvihID =  $_GET["beneficiaire"];

            $beneficiaire = Pvvih::where("id", $pvvihID)->first();
            if($beneficiaire != null){
                $beneficiaire->delete();

                $result["message"] = "Souscription annuler avec succès";
                $result["error"]  = false;
                return response()->json($result);
            }
        }
        $result["message"] = "Impossible d'annuler";
        $result["error"]  = true;
        return response()->json($result);

    }

    /**
     * Signaler un abus
     */


    public function saveAbus(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $userID = $_GET["identifiant"];
            $typeAbus = $_GET["typeAbus"];
            $numero = $_GET["telephone"];
            $nom = $_GET["nom"];
            $sexe = $_GET["sexe"];

            $dateJour = new \DateTime();

            $pvvih = new Pvvih();
            $pvvih->nom = $nom;
            $pvvih->prenom = null;
            $pvvih->telephone = "+228 ".$numero;
            $pvvih->region_id = null;
            $pvvih->langue = null;
            $pvvih->sexe = $sexe;
            $pvvih->action = null;
            $pvvih->typePlainte = $typeAbus;
            $pvvih->user_id = $userID;
            $pvvih->origine = "M";
            $pvvih->save();

            $identifiant = $pvvih->id;
            $initName = strtoupper(substr($nom, 0,2));
            $initPrenom = strtoupper(substr("NO-PRENOM",0,2));
            $initMois = strtoupper($dateJour->format("M"));
            $year = $dateJour->format("y");

            $pvvih->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$pvvih->sexe;

            $pvvih->save();

            /**
             * Save du chat
             */

            $user = User::where("id", $identifiant)->first();

            $senderUser = User::where("id", "3783")->first();

            $msg = "Vous venez d'envoyer une plainte pour ".$typeAbus.". Un assistant est en ligne pour
            en savoir davantage sur votre plainte";
            $chat = new Chat();
            $chat->message = $msg;
            $chat->sender_id = "3783";
            $chat->type_sender_id =  $senderUser->type_user_id;
            $chat->receiver_id = $user->id;
            $chat->type_receiver_id = $user->type_user_id;
            $chat->readMessage = false;
            $chat->save();

            $tokens = array();
            if($user->id != null){
                $tokens[] =  NotifToken::where("user_id", $user->id)->first()->token;
            }

            $notifToken = new NotifToken();

            $notifToken->sendNotificationToUser($tokens, "Assistance eConvivial", $msg);


            $result["error"] = false;
            $result["message"] = "Votre requete a été enrégistré.";
            return response()->json($result);
        }

        $result["error"] = true;
        $result["message"] = "Impossible de signaler";
        return response()->json($result);
    }

    /**
     * Récupérer la liste des plaintes
     */

    public function getListePlainte(){

        $result["error"] = false;
        $result["message"] = [];
        if(isset($_GET)) {

            $id = $_GET["id"];


            $user = User::where("id", $id)->first();
            if($user != null){

                $plaintes = Pvvih::where("user_id", $id)->orderBy("id", "desc")->get();

                $result["plaintes"] = $plaintes;
                $result["error"] = false;
                return response()->json($result);

            }
            $result["error"] = true;
            $result["message"] = "Impossible de récupérer les plaintes. Une erreur est survenue";
            return response()->json($result);
        }
        $result["error"] = true;
        $result["message"] = "Impossible de récupérer les plaintes";
        return response()->json($result);

    }


    /**
     * Récupérer les notifications
     * par type et par utilisateurs
     */

    public function getListeUserNotification(){

        $result["error"] = false;
        $result["message"] = [];
        if(isset($_GET)){

            $id = $_GET["id"];
            $type = $_GET["type"];

            $user = User::where("id", $id)->first();
            if($user != null){

                $notifMessages = NotificationMessage::where("user_id", $id)->where("type", $type)->get();

            $result["notification"] = $notifMessages;
            $result["error"] = false;
            return response()->json($result);

            }
            $result["error"] = true;
            $result["message"] = "Utilisateur corrumpue. Impossible de récupérer";
            return response()->json($result);
        }
        $result["error"] = true;
        $result["message"] = "Impossible de récupérer les notifications";
        return response()->json($result);
    }

    /**
     * Envoyé chat à une personne
     */

    public function sendChatMessage(){

        $result["error"] = false;
        $result["message"] = [];

        if(isset($_GET)){

            $identifiant = $_GET["identifiant"];
            $receiverID = $_GET["receiverID"];
            $message = $_GET["message"];

            try{

                $userReceiver = User::where("id", $receiverID)->first();

                $user = User::where("id", $identifiant)->first();

                if($user != null){
                    $chatLines = ChatTimeLine::where('user_id', $identifiant)->get();
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
                            $chatTimeLine->user_id = $identifiant;
                            $chatTimeLine->save();
                        }
                    }
                }

                if($userReceiver != null && $user != null){

                    $chat = new Chat();
                    $chat->message = $message;
                    $chat->sender_id = $identifiant;
                    $chat->type_sender_id =  $user->type_user_id;
                    $chat->receiver_id = $userReceiver->id;
                    $chat->type_receiver_id = $userReceiver->type_user_id;
                    $chat->readMessage = false;
                    $chat->save();

                    /**
                     * Mise à jour de la ligne de chat_time_line correspondante
                     */

                    $chatTime = ChatTimeLine::where("user_id", $user->id)->where("assistant_id", $userReceiver->id)->first();

                    if($chatTime != null){
                        $chatTime->lastMessage = $message;
                        $chatTime->unReadAssistant = $chatTime->unReadAssistant + 1;
                        $chatTime->updateTime = new \DateTime();
                        $chatTime->save();
                    }

                    /**
                     * Notifier  l'assistant de la venu de message
                     */

                    $user->notify(new RepliedToThread("Assistance en ligne",$user));

                    $result["message"] = "Message envoyé";
                    $result["error"] = false;

                    return response()->json($result);
                }

                $result["message"] = "Impossible d'envoyer le message";
                $result["error"] = true;

                return response()->json($result);

            }catch (Exception $e){

                $results["message"] = "Le message n'a pas été envoyé";
                $results["error"] = true;

                return response()->json($result);
            }
        }

    }

    public function getMobileUnreadMessage(){

        $result["error"] = false;
        $result["message"] = [];

        if (isset($_GET)){

            $identifiant = $_GET["identifiant"];
            $receiverID = $_GET["receiverID"];

            $chats = DB::select("select * from chats where readMessage  is false  and receiver_id = '".$identifiant."' and sender_id =".$receiverID."  order by id asc");
            //  $chats = DB::select("select * from chats where readMessage  is false and ( (sender_id = ".Auth::user()->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".Auth::user()->id."))");

            if(count($chats) > 0){

                $chat = Chat::where("id", $chats[0]->id)->first() ;
                $chat->readMessage = true;
                $chat->save();

                $result["error"] = false;
                $result["chats"] = $chats;

                /**
                 * Mettre à jour la table ChatTimeLines
                 */

                $chatTime = ChatTimeLine::where("user_id", $identifiant)->where("assistant_id",$receiverID)->first();

                if($chatTime != null){
                    if($chatTime->unReadMessage > 0){
                        $chatTime->unReadMessage = $chatTime->unReadMessage - 1;
                        $chatTime->save();
                    }
                }

                return response()->json($result);
            }else{
                $result["error"] = false;
                $result["chats"] = $chats;

                return response()->json($result);
            }
        }

        $result["message"] = "Impossible de récupérer le message";
        $result["error"] = true;

        return response()->json($result);
    }

    public function setMobMessageAsRead(){

        $result["error"] = false;
        $result["message"] = [];

        if (isset($_GET)){

            $identifiant = $_GET["identifiant"];
            $receiverID = $_GET["receiverID"];

             DB::update("update chats set readMessage = true where readMessage = false  and   sender_id = ".$receiverID."  and  receiver_id = ".$identifiant);

            DB::update("update chat_time_lines set unReadMessage = 0 where user_id =".$identifiant." and assistant_id =".$receiverID);


            $result["message"] = "Mise à jour effectuée";
            return response()->json($result);
        }

        $result["message"] = "Impossible de récupérer le message";
        $result["error"] = true;

        return response()->json($result);
    }

    public function getListeOfMobileChat(){

        $result["error"] = false;
        $result["message"] = [];

        if (isset($_GET)){

            $identifiant = $_GET["identifiant"];
            $receiverID = $_GET["receiverID"];

            $chats = DB::select("select * from chats where (sender_id = ".$identifiant." and  receiver_id = ".$receiverID.") or ( sender_id = ".$receiverID."  and  receiver_id = ".$identifiant.")  order by id asc");

            DB::update("update chats set readMessage = true where readMessage = false  and ((sender_id = ".$identifiant." and  receiver_id = ".$receiverID.") or ( sender_id = ".$receiverID."  and  receiver_id = ".$identifiant."))");

            $result["error"] = false;
            $result["chats"] = $chats;

            return response()->json($result);
        }

        $result["message"] = "Impossible de récupérer le message";
        $result["error"] = true;

        return response()->json($result);
    }

    /**
     * Récupérer  la liste des pays et des régions
     */

    public function getListeVille(){
        $result["villes"] = [];
        $result["error"] = false;

        $villes = Ville::orderBy("libelle", "asc")->get();

        $liste = array();
        foreach ($villes as $ville) {
            $hash = array();
            $hash["libelle"] = $ville->libelle;
            $hash["quartiers"] = Quartier::where("ville_id", $ville->id)->orderBy("libelle", "asc")->get();
            $liste[] = $hash;
        }
        $result["villes"] =$liste;
        $result["error"] = false;

        return response()->json($result);
    }

}


// <?php

// namespace App\Http\Controllers;

// use App\Beneficiaire;
// use App\Chat;
// use App\Conjoint;
// use App\DateProbableConsultation;
// use App\DateProbableVaccination;
// use App\LanguePreference;
// use App\NotificationMessage;
// use App\Notifications\RepliedToThread;
// use App\NotifToken;
// use App\Pvvih;
// use App\Quartier;
// use App\User;
// use App\Ville;
// use Carbon\Carbon;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Mockery\Exception;

// class InnovWebRequestController extends Controller
// {
//     //

//     public function saveSuiviGrossesse(){

//         $result["message"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){

//             try{
//                 $id = $_GET["id"];
//                 $nom = $_GET["nom"];
//                 $prenom = $_GET["prenom"];
//                 $telephone = $_GET["telephone"];
//               // $conjoint = $_GET["conjoint"];
//                 $languePref = $_GET["langue"];
//                 $nomConjoint = $_GET["nomConjoint"];
//                 $prenomConjoint = $_GET["prenomConjoint"];
//                 $telephoneConjoint = $_GET["telephoneConjoint"];
//                 $dateRegle = $_GET["dateRegle"];
//                 $dureeGrossesse = $_GET["dureeGrossesse"];
//                 $quartierLibelle = $_GET["quartier"];
//             }catch (\Exception $e){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de la récuperation des données";
//                 return response()->json($result);
//             }

//             $quartier = Quartier::where("libelle", $quartierLibelle)->first();

//             /**
//              * Enrégistrement des infos du bénéficiaire
//              */

//             $dateJour = new \DateTime();

//           try{

//                 $beneficiaire = new Beneficiaire();
//                 $beneficiaire->nom  = $nom;

//                 $beneficiaire->prenom  = $prenom;
//                 $beneficiaire->telephone  = $telephone;

//               //  $beneficiaire->haveConjoint  = $conjoint;
//                 $beneficiaire->optionSuivi  = "Suivi de la grossesse";

//                 $beneficiaire->dateRegle = $dateRegle;
//                 $beneficiaire->dureeGrossese = $dureeGrossesse;

//                 $beneficiaire->ptme = false;

//                 if($quartier != null){
//                     $beneficiaire->quartier_id = $quartier->id;
//                 }

//                 $beneficiaire->user_id = $id;
//                 $beneficiaire->telephoneConjoint = $telephoneConjoint;
//                 $beneficiaire->save();

//                 $identifiant = $beneficiaire->id;
//                 $initName = strtoupper(substr($nom, 0,2));
//                 $initPrenom = strtoupper(substr($prenom,0,2));
//                 $initMois = strtoupper($dateJour->format("M"));
//                 $year = $dateJour->format("y");
//                 $isPMTE = $beneficiaire->ptme ? "O" : "N";

//                 $beneficiaire->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$isPMTE;

//                 $beneficiaire->save();
//             }catch (\Exception $exception){

//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement";
//                 return response()->json($result);
//             }

//             /**
//              * Enrégistrement des infos sur la langue
//              */

//             try{
//                 $langue = new LanguePreference();
//                 $langue->libelle = $languePref;
//                 $langue->beneficiaire_id = $beneficiaire->id;
//                 $langue->save();
//             }catch (Exception $exception){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement des infos";
//                 return response()->json($result);
//             }

//             /**
//              * Enrégistrement des infos sur le conjoint
//              */

//             try{
//               /* if($telephoneConjoint != ""){
//                     $conjoint  = new Conjoint();
//                     $conjoint->nom = $nomConjoint;
//                     $conjoint->prenom = $prenomConjoint;
//                     $conjoint->telephone = $telephoneConjoint;
//                     $conjoint->beneficiaire_id = $beneficiaire->id;
//                     $conjoint->save();
//                 }  */

//                 $this->saveCPN($beneficiaire->dateRegle,$beneficiaire) ;
//             }catch (Exception $exception){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement des données";
//                 return response()->json($result);
//             }

//             $result["error"] = false;
//             $result["beneficiaire"] = $beneficiaire->id;
//             $result["message"] = "Souscription au suivi de grossesse effectuée.
//             Vous recevrez régulièrement des alertes pour un bon suivi de la grossesse";
//             return response()->json($result);

//         }
//         $result["message"] = "Une erreur s'est produite, impossible de souscrire au suivi";
//         return response()->json($result);
//     }

//     public function saveCPN($dateRegle, $beneficiaire){

//         $dayCurrent = new \DateTime();
//         $dateJour = new Carbon($dayCurrent->format("Y-M-d"));

//         $dateLastRegle = new Carbon($dateRegle);

//         //  $dateRegleOrigin = new Carbon($dateRegle);

//         $nbreSemaine = $dateJour->diffInWeeks($dateLastRegle);


//         if($nbreSemaine <= 12){
//             $this->storeSuiviGrossesse("CPN 1", $dateLastRegle->addDay(7*12),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*12);
//         }

//         if($nbreSemaine <= 20){
//             $this->storeSuiviGrossesse("CPN 2", $dateLastRegle->addDay(7*20),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*20);
//         }

//         if($nbreSemaine <= 26){
//             $this->storeSuiviGrossesse("CPN 3", $dateLastRegle->addDay(7*26),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*26);
//         }

//         if($nbreSemaine <= 30){
//             $this->storeSuiviGrossesse("CPN 4", $dateLastRegle->addDay(7*30),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*30);
//         }

//         if($nbreSemaine <= 34){
//             $this->storeSuiviGrossesse("CPN 5", $dateLastRegle->addDay(7*34),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*34);
//         }

//         if($nbreSemaine <= 36){
//             $this->storeSuiviGrossesse("CPN 6", $dateLastRegle->addDay(7*36),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*36);
//         }

//         if($nbreSemaine <= 38){
//             $this->storeSuiviGrossesse("CPN 7", $dateLastRegle->addDay(7*38),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*38);
//         }

//         if($nbreSemaine <= 40){
//             $this->storeSuiviGrossesse("CPN 8", $dateLastRegle->addDay(7*40),$beneficiaire->id);
//             $dateLastRegle->addDay(-7*40);
//         }

//         $beneficiaire->dateFinSuivi = $dateLastRegle->addDay(7*41);
//         $beneficiaire->save();

//         $dateLastRegle->addDay(-7*41);

//     }

//     public function storeSuiviGrossesse($cpn, $dateProbable,$beneficiaireID){
//         $consultation = new DateProbableConsultation();
//         $consultation->cpn = $cpn;
//         $consultation->dateProbable = $dateProbable;
//         $consultation->beneficiaire_id = $beneficiaireID;
//         $consultation->save();
//     }



//     /**
//      * Suivi vaccinal
//      */

//     public function saveSuiviInnovVaccination(){

//         $result["message"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){

//             try{
//                 $id = $_GET["id"];
//                 $nom = $_GET["nom"];
//                 $prenom = $_GET["prenom"];
//                 $telephone = $_GET["telephone"];
//                 $conjoint = $_GET["conjoint"];
//                 $languePref = $_GET["langue"];
//                 $nomConjoint = $_GET["nomConjoint"];
//                 $prenomConjoint = $_GET["prenomConjoint"];
//                 $telephoneConjoint = $_GET["telephoneConjoint"];
//                 $dateAccouchement = $_GET["dateAccouchement"];
//                 $ageBebe = $_GET["ageBebe"];
//                 $nomBebe = $_GET["nomBebe"];
//             }catch (\Exception $e){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de la récuperation des données";
//                 return response()->json($result);
//             }

//             /**
//              * Enrégistrement des infos du bénéficiaire
//              */

//             $dateJour = new \DateTime();

//             try{

//                 $beneficiaire = new Beneficiaire();
//                 $beneficiaire->nom  = $nom;

//                 $beneficiaire->prenom  = $prenom;
//                 $beneficiaire->telephone  = $telephone;

//                 $beneficiaire->haveConjoint  = $conjoint;
//                 $beneficiaire->optionSuivi  = "Suivi vaccinal";

//                 $beneficiaire->dateAccouchement = $dateAccouchement;
//                 $beneficiaire->ageBebe = $ageBebe;
//                 $beneficiaire->nomBebe = $nomBebe;

//                 $beneficiaire->ptme = false;
//                 $beneficiaire->user_id = $id;
//                 $beneficiaire->telephoneConjoint = $telephoneConjoint;

//                 $beneficiaire->save();

//                 $identifiant = $beneficiaire->id;
//                 $initName = strtoupper(substr($nom, 0,2));
//                 $initPrenom = strtoupper(substr($prenom,0,2));
//                 $initMois = strtoupper($dateJour->format("M"));
//                 $year = $dateJour->format("y");
//                 $isPMTE = $beneficiaire->ptme ? "O" : "N";

//                 $beneficiaire->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$isPMTE;

//                 $beneficiaire->save();
//             }catch (\Exception $exception){

//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement";
//                 return response()->json($result);
//             }

//             /**
//              * Enrégistrement des infos sur la langue
//              */

//             try{
//                 $langue = new LanguePreference();
//                 $langue->libelle = $languePref;
//                 $langue->beneficiaire_id = $beneficiaire->id;
//                 $langue->save();
//             }catch (Exception $exception){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement des infos";
//                 return response()->json();
//             }

//             /**
//              * Enrégistrement des infos sur le conjoint
//              */

//             try{
//               /*  if($beneficiaire->haveConjoint){
//                     $conjoint  = new Conjoint();
//                     $conjoint->nom = $nomConjoint;
//                     $conjoint->prenom = $prenomConjoint;
//                     $conjoint->telephone = $telephoneConjoint;
//                     $conjoint->beneficiaire_id = $beneficiaire->id;
//                     $conjoint->save();
//                 }  */

//                 $this->saveSuiviVaccination($beneficiaire->dateAccouchement,$beneficiaire);
//             }catch (Exception $exception){
//                 $result["error"] = true;
//                 $result["message"] = "Erreur lors de l'enrégistrement des données";
//                 return response()->json($result);
//             }

//             $result["error"] = false;
//             $result["beneficiaire"] = $beneficiaire->id;
//             $result["message"] = "Souscription au suivi de vaccination effectuée.
//             Vous recevrez régulièrement des alertes pour un bon suivi de la vaccination de votre enfant";
//             return response()->json($result);

//         }

//         $result["message"] = "Une erreur s'est produite, impossible de souscrire au suivi";
//         return response()->json($result);
//     }

//     public function saveSuiviVaccination($dateAccoucher, $beneficiaire){

//         $dateAccouchement = new Carbon($dateAccoucher);

//         $this->storeVaccination("Date accouchement", $dateAccouchement, "Polio + BCG", $beneficiaire->id);

//         $this->storeVaccination("6ème semaine", $dateAccouchement->addDay(7*6), "Penta 1 + Pneumo 1 + Rota 1 + Polio 1", $beneficiaire->id);

//         $dateAccouchement->addDay(-7*6);

//         $this->storeVaccination("10ème semaine", $dateAccouchement->addDay(7*10), "Penta 2 + Pneumo 2 + Rota 2 + Polio 2", $beneficiaire->id);

//         $dateAccouchement->addDay(-7*10);

//         $this->storeVaccination("14ème semaine", $dateAccouchement->addDay(7*14), "Penta 3 + Pneumo 3 + Rota 3  + Polio 3", $beneficiaire->id);

//         $dateAccouchement->addDay(-7*14);

//         $this->storeVaccination("9ème mois", $dateAccouchement->addDay(7*41), "RR & VAA", $beneficiaire->id);

//         $dateAccouchement->addDay(-7*41);

//         $beneficiaire->dateFinSuivi = $dateAccouchement->addDay(7*41);
//         $beneficiaire->save();
//         $dateAccouchement->addDay(-7*41);
//     }

//     public function  storeVaccination($semaine, $dateProbable,$vaccin, $beneficiaireID){
//         $vaccination = new DateProbableVaccination();
//         $vaccination->semaine = $semaine;
//         $vaccination->dateProbable = $dateProbable;
//         $vaccination->libelleVaccin = $vaccin;
//         $vaccination->beneficiaire_id = $beneficiaireID;
//         $vaccination->save();
//     }


//     /**
//      * Liste de souscription suivi grossesse
//      */

//     public function getListeSuiviGrossesse(){


//         $result["liste"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){

//             $beneID = $_GET["beneficiaire"];

//             $beneficiaire = Beneficiaire::where("id", $beneID)->first();

//             if($beneficiaire != null){

//                 $grossesses = DateProbableConsultation::where("beneficiaire_id", $beneID)->get();


//                 $result["liste"] = $grossesses;
//                 $result["dateFinGrossesse"] = $beneficiaire->dateFinSuivi;
//                 $result["error"]  = false;
//                 return response()->json($result);
//             }

//             $result["message"] = "Une erreur s'est produite";
//             $result["error"]  = true;
//             return response()->json($result);
//         }
//     }


//     public function getListeSuiviVaccination(){


//         $result["liste"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){

//             $beneID = $_GET["beneficiaire"];

//             $beneficiaire = Beneficiaire::where("id", $beneID)->first();

//             if($beneficiaire != null){

//                 $grossesses = DateProbableVaccination::where("beneficiaire_id", $beneID)->get();

//                 $result["liste"] = $grossesses;
//                 $result["dateFinSuivi"] = $beneficiaire->dateFinSuivi;
//                 $result["error"]  = false;
//                 return response()->json($result);
//             }

//             $result["message"] = "Une erreur s'est produite";
//             $result["error"]  = true;
//             return response()->json($result);
//         }
//     }


//     /**
//      * Annuler le suivi de femme enceinte
//      */

//     public function postAnnulerSuiviGrossesse(){

//         $result["message"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){

//             $beneID =  $_GET["beneficiaire"];

//             $beneficiaire = Beneficiaire::where("id", $beneID)->first();

//             if($beneficiaire != null){
//                 $beneficiaire->delete();

//                 $result["message"] = "Souscription annuler avec succès";
//                 $result["error"]  = false;
//                 return response()->json($result);
//             }
//         }

//         $result["message"] = "Impossible d'annuler";
//         $result["error"]  = true;
//         return response()->json($result);
//     }


//     public function postAnnulerSuiviVaccination(){

//         $result["message"] = [];
//         $result["error"]  = false;

//         if(isset($_GET)){
//             $pvvihID =  $_GET["beneficiaire"];

//             $beneficiaire = Pvvih::where("id", $pvvihID)->first();
//             if($beneficiaire != null){
//                 $beneficiaire->delete();

//                 $result["message"] = "Souscription annuler avec succès";
//                 $result["error"]  = false;
//                 return response()->json($result);
//             }
//         }
//         $result["message"] = "Impossible d'annuler";
//         $result["error"]  = true;
//         return response()->json($result);

//     }

//     /**
//      * Signaler un abus
//      */


//     public function saveAbus(){

//         $result["message"] = [];
//         $result["error"]  = false;
//         if(isset($_GET)){

//             $userID = $_GET["identifiant"];
//             $typeAbus = $_GET["typeAbus"];
//             $numero = $_GET["telephone"];
//             $nom = $_GET["nom"];
//             $sexe = $_GET["sexe"];

//             $dateJour = new \DateTime();

//             $pvvih = new Pvvih();
//             $pvvih->nom = $nom;
//             $pvvih->prenom = null;
//             $pvvih->telephone = "+228 ".$numero;
//             $pvvih->region_id = null;
//             $pvvih->langue = null;
//             $pvvih->sexe = $sexe;
//             $pvvih->action = null;
//             $pvvih->typePlainte = $typeAbus;
//             $pvvih->user_id = $userID;
//             $pvvih->origine = "M";
//             $pvvih->save();

//             $identifiant = $pvvih->id;
//             $initName = strtoupper(substr($nom, 0,2));
//             $initPrenom = strtoupper(substr("NO-PRENOM",0,2));
//             $initMois = strtoupper($dateJour->format("M"));
//             $year = $dateJour->format("y");

//             $pvvih->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$pvvih->sexe;

//             $pvvih->save();

//             /**
//              * Save du chat
//              */

//             $user = User::where("id", $identifiant)->first();

//             $senderUser = User::where("id", "1609")->first();

//             $msg = "Vous venez d'envoyer une plainte pour ".$typeAbus.". Un assistant est en ligne pour
//             en savoir davantage sur votre plainte";
//             $chat = new Chat();
//             $chat->message = $msg;
//             $chat->sender_id = "1609";
//             $chat->type_sender_id =  $senderUser->type_user_id;
//             $chat->receiver_id = $userID;
//             $chat->type_receiver_id = $user->type_user_id;
//             $chat->readMessage = false;
//             $chat->save();

//             $tokens = array();




//             if($user->id != null){
//               $tokens[] =  NotifToken::where("user_id", $userID)->first()->token;
//             }

//             $notifToken = new NotifToken();

//             $notifToken->sendNotificationToUser($tokens, "Assistance eConvivial", $msg);


//             $result["error"] = false;
//             $result["message"] = "Votre requete a été enrégistré.";
//             return response()->json($result);
//         }

//         $result["error"] = true;
//         $result["message"] = "Impossible de signaler";
//         return response()->json($result);
//     }

//     /**
//      * Récupérer la liste des plaintes
//      */

//     public function getListePlainte(){

//         $result["error"] = false;
//         $result["message"] = [];
//         if(isset($_GET)) {

//             $id = $_GET["id"];


//             $user = User::where("id", $id)->first();
//             if($user != null){

//                 $plaintes = Pvvih::where("user_id", $id)->orderBy("id", "desc")->get();

//                 $result["plaintes"] = $plaintes;
//                 $result["error"] = false;
//                 return response()->json($result);

//             }
//             $result["error"] = true;
//             $result["message"] = "Impossible de récupérer les plaintes. Une erreur est survenue";
//             return response()->json($result);
//         }
//         $result["error"] = true;
//         $result["message"] = "Impossible de récupérer les plaintes";
//         return response()->json($result);

//     }


//     /**
//      * Récupérer les notifications
//      * par type et par utilisateurs
//      */

//     public function getListeUserNotification(){

//         $result["error"] = false;
//         $result["message"] = [];
//         if(isset($_GET)){

//             $id = $_GET["id"];
//             $type = $_GET["type"];

//             $user = User::where("id", $id)->first();
//             if($user != null){

//                 $notifMessages = NotificationMessage::where("user_id", $id)->where("type", $type)->get();

//             $result["notifications"] = $notifMessages;
//             $result["error"] = false;
//             return response()->json($result);

//             }
//             $result["error"] = true;
//             $result["message"] = "Utilisateur corrumpue. Impossible de récupérer";
//             return response()->json($result);
//         }
//         $result["error"] = true;
//         $result["message"] = "Impossible de récupérer les notifications";
//         return response()->json($result);
//     }

//     /**
//      * Envoyé chat à une personne
//      */

//     public function sendChatMessage(){

//         $result["error"] = false;
//         $result["message"] = [];

//         if(isset($_GET)){

//             $identifiant = $_GET["identifiant"];
//             $receiverID = $_GET["receiverID"];
//             $message = $_GET["message"];

//             try{

//                 $userReceiver = User::where("id", $receiverID)->first();

//                 $user = User::where("id", $identifiant)->first();

//                 $chat = new Chat();
//                 $chat->message = $message;
//                 $chat->sender_id = $identifiant;
//                 $chat->type_sender_id =  $user->type_user_id;
//                 $chat->receiver_id = $userReceiver->id;
//                 $chat->type_receiver_id = $userReceiver->type_user_id;
//                 $chat->readMessage = false;
//                 $chat->save();

//                 /**
//                  * Notifier tous les administrateurs de ma demande de suivi
//                  */

//                 $user->notify(new RepliedToThread("Assistance en ligne",$user));

//                 $result["message"] = "Message envoyé";
//                 $result["error"] = false;

//                 return response()->json($result);
//             }catch (Exception $e){

//                 $results["message"] = "Le message n'a pas été envoyé";
//                 $results["error"] = true;

//                 return response()->json($result);
//             }
//         }

//     }

//     public function getMobileUnreadMessage(){

//         $result["error"] = false;
//         $result["message"] = [];

//         if (isset($_GET)){

//             $identifiant = $_GET["identifiant"];
//             $receiverID = $_GET["receiverID"];

//             $chats = DB::select("select * from chats where readMessage  is false  and receiver_id = '".$identifiant."' and sender_id =".$receiverID."  order by id asc");
//             //  $chats = DB::select("select * from chats where readMessage  is false and ( (sender_id = ".Auth::user()->id." and  receiver_id = ".$request["id"].") or ( sender_id = ".$request["id"]."  and  receiver_id = ".Auth::user()->id."))");

//             if(count($chats) > 0){

//                 $chat = Chat::where("id", $chats[0]->id)->first() ;
//                 $chat->readMessage = true;
//                 $chat->save();

//                 $result["error"] = false;
//                 $result["chats"] = $chats;

//                 return response()->json($result);
//             }else{
//                 $result["error"] = false;
//                 $result["chats"] = $chats;

//                 return response()->json($result);
//             }
//         }

//         $result["message"] = "Impossible de récupérer le message";
//         $result["error"] = true;

//         return response()->json($result);
//     }

//     public function getListeOfMobileChat(){

//         $result["error"] = false;
//         $result["message"] = [];

//         if (isset($_GET)){

//             $identifiant = $_GET["identifiant"];
//             $receiverID = $_GET["receiverID"];

//             $chats = DB::select("select * from chats where (sender_id = ".$identifiant." and  receiver_id = ".$receiverID.") or ( sender_id = ".$receiverID."  and  receiver_id = ".$identifiant.")  order by id asc");

//             DB::update("update chats set readMessage = true where readMessage = false  and ((sender_id = ".$identifiant." and  receiver_id = ".$receiverID.") or ( sender_id = ".$receiverID."  and  receiver_id = ".$identifiant."))");

//             $result["error"] = false;
//             $result["chats"] = $chats;

//             return response()->json($result);
//         }

//         $result["message"] = "Impossible de récupérer le message";
//         $result["error"] = true;

//         return response()->json($result);
//     }


//     /**
//      * Récupérer  la liste des pays et des régions
//      */

//     public function getListeVille(){
//         $result["villes"] = [];
//         $result["error"] = false;

//         $villes = Ville::orderBy("libelle", "asc")->get();

//         $liste = array();
//         foreach ($villes as $ville) {
//             $hash = array();
//             $hash["libelle"] = $ville->libelle;
//             $hash["quartiers"] = Quartier::where("ville_id", $ville->id)->orderBy("libelle", "asc")->get();
//             $liste[] = $hash;
//         }
//         $result["villes"] =$liste;
//         $result["error"] = false;

//         return response()->json($result);
//     }

// }
