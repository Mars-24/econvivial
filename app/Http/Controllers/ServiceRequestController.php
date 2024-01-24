<?php

namespace App\Http\Controllers;

use App\Annulation;
use App\DateProbableConsultation;
use App\Menstruation;
use App\SuiviGrosesse;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    //

    public function sendSuiviGrossesse(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            $dateRegle = $_GET["dateRegle"];
            $nbreSemaine = $_GET["nbreSemaine"];

            $user = User::where("id", $id)->first();

            if($user){

                $suiviGrossesse = SuiviGrosesse::where("user_id", $user->id)->first();

                if($suiviGrossesse != null){
                    $result["message"] = "Vous avez déjà souscri à un suivi de grossesse.";
                    $result["error"]  = true;
                    return json_encode($result);
                }

                $suivi = new SuiviGrosesse();
                $suivi->dateRegle = $dateRegle;
                $suivi->nbreSemaine = $nbreSemaine;
                $suivi->suivi  = true;
                $suivi->user_id =$user->id;
                $suivi->save();

                $this->saveCPN($dateRegle, $suivi);

                $result["message"] = "Demande de suivi de grossesse prise en compte. \n Vous recevrez régulièrement des notifications pour un bon suivi.";
                $result["error"]  = false;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible de souscrire au suivi de grossesse";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
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

    public function storeSuiviGrossesse($cpn, $dateProbable,$grossesseID){
        $consultation = new DateProbableConsultation();
        $consultation->cpn = $cpn;
        $consultation->dateProbable = $dateProbable;
        $consultation->suivi_grossesse_id = $grossesseID;
        $consultation->save();
    }
/**
* Liste de souscription suivi grossesse
*/

    public function getListeSuiviGrossesse(){

        $result["liste"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

            $beneID = $_GET["identifiant"];

            if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            
            $beneficiaire = SuiviGrosesse::where("user_id", $beneID)->first();

            if($beneficiaire != null){

                $grossesses = DateProbableConsultation::where("suivi_grossesse_id", $beneficiaire->id)->get();


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

    public function sendSuiviRegle(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            $dateRegle = $_GET["dateRegle"];
            $dureeCycle = $_GET["dureeCycle"];

            $user = User::where("numero", $numero)->where("id", $id)->first();
            if($user){

                $menstruation = Menstruation::where("user_id", $user->id)->where("type", "regle")->first();

                if($menstruation != null){
                    $result["message"] = "Vous avez déjà souscri à un suivi de règle.";
                    $result["error"]  = true;
                    return json_encode($result);
                }

                //Calcul pour déterminer la date de la prochaine règle
                $carbon = new Carbon($dateRegle);
                $dateProchaineRegle  = $carbon->addDay($dureeCycle);

                $menstru = new Menstruation();
                $menstru->dateRegle = $dateRegle;
                $menstru->dureeCycle = $dureeCycle;
                $menstru->type = "regle";
                $menstru->dateProchainRegle = $dateProchaineRegle;
                $menstru->user_id = $user->id;
                $menstru->save();

                $result["message"] = "Demande de suivi de règle prise en compte. \n Vous recevrez régulièrement 
                des notifications pour un bon suivi.";

                $result["error"]  = false;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible de souscrire au suivi de grossesse";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);

    }


    public function sendSuiviOvulation(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            $dateRegle = $_GET["dateRegle"];
            $dureeCycle = $_GET["dureeCycle"];

            $user = User::where("numero", $numero)->where("id", $id)->first();
            
            if($dateRegle == null || $dureeCycle == "Sélectionner le nombre de jours"){
                $result["message"] = "Veuillez renseigner tous les champs";
                $result["error"]  = true;
                return json_encode($result);
            }
            
             if(!is_numeric($dureeCycle)){
                $result["message"] = "Veuillez renseigner la durée du cycle";
                $result["error"]  = true;
                return json_encode($result);
            }
            
            if($user){

                $menstruation = Menstruation::where("user_id", $user->id)->where("type", "ovulation")->first();

                if($menstruation != null){
                    $result["message"] = "Vous avez déjà souscri à un suivi d'ovulation.";
                    $result["error"]  = true;
                    return json_encode($result);
                }

                //Calcul pour déterminer la date de la prochaine ovulation
                $carbon = new Carbon($dateRegle);

              
                $dateProchaineOvulation  = $carbon->addDay($dureeCycle - 15);

            
                $menstru = new Menstruation();
                $menstru->dateRegle = $dateRegle;
                $menstru->dureeCycle = $dureeCycle;
                $menstru->type = "ovulation";
                $menstru->dateProchainOvulation = $dateProchaineOvulation;
                $menstru->user_id = $user->id;
                $menstru->save();

                 //Gestion de suivi de règle

                $menstruation = Menstruation::where("user_id", $user->id)->where("type", "regle")->first();

                if($menstruation != null){
                    $result["message"] = "Vous avez déjà souscri à un suivi de règle.";
                    $result["error"]  = true;
                    return json_encode($result);
                }

                //Calcul pour déterminer la date de la prochaine règle
                $carbon = new Carbon($dateRegle);
                $dateProchaineRegle  = $carbon->addDay($dureeCycle);

                $menstru = new Menstruation();
                $menstru->dateRegle = $dateRegle;
                $menstru->dureeCycle = $dureeCycle;
                $menstru->type = "regle";
                $menstru->dateProchainRegle = $dateProchaineRegle;
                $menstru->user_id = $user->id;
                $menstru->save();

                $result["message"] = "Demande de suivi de menstruation  prise en compte. \n Vous recevrez régulièrement 
                des notifications pour un bon suivi.";

                $result["error"]  = false;
                return json_encode($result);

            }
            $result["message"] = "Utilisateur corrumpue. Impossible de souscrire au suivi de grossesse";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);

    }


    /**
     * Get suivi grossesse
     */

    public function getSuiviGrossesseInfo(){
        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();
            if($user){
                $grossesse = SuiviGrosesse::where("user_id", $user->id)->get();
                $result["message"] = $grossesse;
                $result["error"]  = false;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible de souscrire au suivi de grossesse";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
    }

    /**
     * @return string
     * @throws \ExceptionAnnuler suivi de grossesse
     */
    public function postAnnulerSuiviGrossesse(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
            $motif = $_GET["motif"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();
            if($user){

                $grossesse = SuiviGrosesse::where("user_id", $user->id)->first();

                if($grossesse != null){

                    $annulation = new Annulation();
                    $annulation->motif = $motif;
                    $annulation->user_id = $user->id;
                    $annulation->suivi = "grossesse";
                    $annulation->save();

                    $grossesse->delete();

                    $result["message"] = "Souscription au suivi de grossesse annulée";
                    $result["error"]  = false;
                    return json_encode($result);

                }
                $result["message"] = "Impossible d'annuler une erreur s'est produite";
                $result["error"]  = true;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible d'afficher les informations";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
    }

    /**
     * Get suivi de règle
     */

    public function getSuiviRegle(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();
            if($user){

                $menstru = Menstruation::where("user_id",$user->id)->where("type", "regle")->first();

                if($menstru != null){
                    $dateProch = new Carbon($menstru->dateProchainRegle);
                    $date = new \DateTime();
                    $dateCourant = new Carbon($date->format("Y-M-d"));

                    while($dateProch < $dateCourant){
                        $menstru->dateRegle = $menstru->dateProchainRegle;
                        $menstru->dateProchainRegle = $dateProch->addDay($menstru->dureeCycle);
                        $menstru->save();
                        $dateProch = new Carbon($menstru->dateProchainRegle);
                    }
                }

                $menstruations = Menstruation::where("user_id", $user->id)->where("type", "regle")->get();

                $result["error"]  = false;
                $result["message"]  = $menstruations;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible d'afficher les informations";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
    }

    /**
     * @return string
     * @throws \ExceptionAnnuler suivi de règle
     */
    public function posteAnnulerSuiviRegle(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
            $motif = $_GET["motif"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();

            if($user){

                $menstru = Menstruation::where("user_id" , $user->id)->where("type", "regle")->first();

                if($menstru != null){
                    $annulation = new Annulation();
                    $annulation->motif = $motif;
                    $annulation->user_id = $user->id;
                    $annulation->suivi = "regle";
                    $annulation->save();

                    $menstru->delete();

                    $result["message"] = "Suivi de règle annulé. Vous ne recevrez pas de notifications d'alerte pour le suivi.";
                    $result["error"]  = false;
                    return json_encode($result);
                }

                $result["message"] = "Impossible d'annuler une erreur s'est produite";
                $result["error"]  = true;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible d'afficher les informations";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
    }



    /**
     * Get suivi d'ovulation
     */

    public function getSuiviOvulation(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();
            if($user){

                $menstru = Menstruation::where("user_id",$user->id)->where("type", "ovulation")->first();

                if($menstru != null){
                    $suiviRegle = true;
                    $dateProch = new Carbon($menstru->dateProchainOvulation);
                    $date = new \DateTime();
                   
                   // return "Date Regle ==> ".$menstru->dateRegle."  and Proch Ovulation : ".$dateProch;
                    $dateCourant = new Carbon($date->format("Y-M-d"));
                   /*   if($dateProch < $dateCourant){
                          return "Date courant ==> ".$dateCourant." and date Proch ==> ".$dateProch;
                         return "true";
                     }else{
                         return "false";
                     } */
                   // if($date)

                    while($dateProch < $dateCourant){
                        /*$menstru->dateRegle = $menstru->dateProchainOvulation;
                        $menstru->dateProchainOvulation = $dateProch->addDay($menstru->dureeCycle - 15);
                        $menstru->save();
                        $dateProch = new Carbon($menstru->dateProchainOvulation); */
                        
                        /*$menstru->dateRegle = $menstru->dateProchainOvulation;
                        $menstru->dateProchainOvulation = $dateProch->addDay($menstru->dureeCycle - 15);
                        $menstru->save();
                        $dateProch = new Carbon($menstru->dateProchainOvulation); */
                        
                    $dateProbProchaineRegle = $dateProch->addDay(15);
                    $dateRegle = new Carbon($dateProbProchaineRegle);
                    $menstru->dateRegle = $dateProbProchaineRegle;
                    $menstru->dateProchainOvulation = $dateRegle->addDay($menstru->dureeCycle - 15);
                    $menstru->save();
                    $dateProch = new Carbon($menstru->dateProchainOvulation);
                    }
                }

                $menstruations = Menstruation::where("user_id", $user->id)->where("type", "ovulation")->get();

                $result["error"]  = false;
                $result["message"]  = $menstruations;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible d'afficher les informations";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);
    }

    /**
     * @return string
     * @throws \ExceptionAnnuler suivi de règle
     */
    public function posteAnnulerSuiviOvulation(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            $id = $_GET["id"];
            $motif = $_GET["motif"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->where("id", $id)->first();

            if($user){

                $menstru = Menstruation::where("user_id" , $user->id)->where("type", "ovulation")->first();
                $menstruRegle = Menstruation::where("user_id" , $user->id)->where("type", "regle")->first();

                if($menstru != null || $menstruRegle != null){

                    $annulation = new Annulation();
                    $annulation->motif = $motif;
                    $annulation->user_id = $user->id;
                    $annulation->suivi = "regle";
                    $annulation->save();

                    if($menstru != null)
                    $menstru->delete();

                    if($menstruRegle != null)
                    $menstruRegle->delete();

                    $result["message"] = "Suivi d'ovulation annulé. Vous ne recevrez pas de notifications d'alerte pour le suivi.";
                    $result["error"]  = false;
                    return json_encode($result);

                }

                $result["message"] = "Impossible d'annuler une erreur s'est produite";
                $result["error"]  = true;
                return json_encode($result);
            }
            $result["message"] = "Utilisateur corrumpue. Impossible d'afficher les informations";
            $result["error"]  = true;
            return json_encode($result);

        }
        $result["message"] = "Impossible de poursuivre, une erreur s'est produite";
        $result["error"]  = true;
        return json_encode($result);

    }

}
