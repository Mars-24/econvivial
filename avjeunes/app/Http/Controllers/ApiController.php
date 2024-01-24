<?php

namespace App\Http\Controllers;

use App\ConseilPratique;
use App\FormationSanitaire;
use App\Menstruation;
use App\ObjetConsultation;
use App\Region;
use App\TypeUser;
use App\User;
use App\Ville;
use App\Annulation;
use App\DateProbableConsultation;
use App\SuiviGrosesse;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ApiController extends Controller
{

    //Récupérer les informations utilisateurs parnuméro
    //https://econvivial.org/api/v1/econvivial/user-info/92104584
    public function apiUserInfo($numero){
        $result["userInfo"] = [];
        $result["error"]  = false;

        $number = "+228 ".$numero;
        $user = User::where("numero", $number)->first();

        $infos = [];
        if($user != null){

            $date = new \DateTime();
            $dateJour = new Carbon($date->format("Y-M-d"));

            $infos["id"] = $user->id;
            $infos["username"] = $user->username != null ? $user->username  : "Non défini";
            $infos["email"] = $user->email != null ? $user->email  : "Non défini" ;
            $infos["numero"] = $user->numero;
            $infos["sexe"] = $user->sexe != null ? $user->sexe == "M" : "Masculin" ? "Féminin"  : "Non défini" ;
            $infos["age"] = $dateJour->diffInYears(new \Carbon\Carbon($user->datenaissance));
            $infos["region"] = $user->region != null ? $user->region->libelle : "Non défini";
            $infos["profession"] = $user->profession != null ? $user->profession : "Non défini";
            $infos["dateCreation"] = date_format(date_create($user->created_at), "d/m/y");

            $result["userInfo"] = $infos;
            $result["error"] = false;

            return  response()->json($result);
        }

        $result["error"] = true;
        return  response()->json($result);
    }

    //Liste des régions
    // https://econvivial.org/api/v1/econvivial/list-region
    public function getListeRegion(){

        $result["regions"] = [];
        $result["error"]  = false;

        $regions = Region::orderBy("libelle", "asc")->get();

        $result["regions"] = $regions;

        return response()->json($result);
    }

    //Liste des villes
//  https://econvivial.org/api/v1/econvivial/list-ville/MARITIME
    public function getVille($nomRegion){
        $result["villes"] = [];
        $result["error"]  = false;

        $region = Region::where("libelle", $nomRegion)->first();
        if($region != null){

            $villes = Ville::where("region_id", $region->id)->orderBy("libelle", "asc")->get();

            $result["error"] = false;
            $result["villes"] = $villes;

            return response()->json($result);
        }
        $result["error"] = true;
        return response()->json($result);
    }

    //Liste des formations sanitaires par région
    //  https://econvivial.org/api/v1/econvivial/list-formation-sanitaire/Adjidogome
    public function getListeFormationSanitaire($nomVille){

        $result["formations"] = [];
        $result["error"]  = false;

        $ville = Ville::where("libelle", $nomVille)->first();

        if($ville != null){
            $formations = FormationSanitaire::where("ville_id", $ville->id)->orderBy("libelle", "asc")->get();

            $result["error"] = false;
            $result["formations"] = $formations;

            return response()->json($result);
        }

        $result["error"] = true;
        $result["formations"] = null;

        return response()->json($result);
    }

    //Liste des objets de consultation
    //  https://econvivial.org/api/v1/econvivial/list-objet-consultation
    public function getListeObjetConsultation(){
        $result["objets"] = [];
        $result["error"]  = false;

        $objets = ObjetConsultation::orderBy("libelle", "asc")->get();

        $result["objets"] = $objets;

        return response()->json($result);
    }

    //Liste des conseils pratiques
    //  https://econvivial.org/api/v1/econvivial/conseil-pratique
    public function getListeConseilPratique(){

        $result["conseilPratique"] = [];
        $result["error"]  = false;

        $conseils = ConseilPratique::get();

        $data = [];

        foreach($conseils as $conseil){
            $data2["id"] = $conseil->id;
            $data2["titre"] = $conseil->titre;
            $data2["description"] = $conseil->description;

            $data[] = $data2;
        }

        $result["conseilPratique"] = $data;
        $result["error"]  = false;

        return response()->json($result);
    }
    
    
       //Insertion des utilisateurs
    //  https://econvivial.org/api/v1/econvivial/insert-user
    //Paramètres
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * $_POST["username"] (Nom d'utilisateur de la personne)
     * $_POST["password"] (Mot de passe minimum 6 caractères)
     * $_POST["datenaissance"] ( Date de naissance dont l'age est >= 13 ans)
     * $_POST["sexe"] (Sexe M ou F)
     * $_POST["numero"] (numéro de téléphone sans indicatif)
     * $_POST["region"] (id de la région que la personne choisi)
     * $_POST["profession"]
     */
    public function insertUser()
    {
        $result["message"] = [];
        $result["error"] = false;

        $numero = $_GET["numero"];
        $naissance = $_GET["datenaissance"];
        $username = $_GET["username"];
        $sexe = $_GET["sexe"];
        $password = $_GET["password"];
        $region = $_GET["region"];
        $profession = $_GET["profession"];
        
        //Vérification si le numéro est inférieur à 8 chiffre
        if (strlen($numero) != 8) {
            $result["message"] = "Veuillez saisir un numéro de télephone valide sans indicatif";
            $result["error"] = true;
            return response()->json($result);
        }

        $typeUser = TypeUser::where("libelle", "utilisateur")->first();

       /* if ($request["password"] != $request['confirmation']) {
            $result["message"] = "Veuillez confirmer votre mot de passe";
            $result["error"] = true;
            return response()->json($result);
        } */

        //Vérification de la date de naissance

        $date = new \DateTime();

            if(User::where("numero", "+228 " .$numero)->first()){
                $result["message"]= "Ce numéro est déjà utilisé";
                $result["error"]  = true;
                return  response()->json($result);
            }
            
        try {
            $dateCourante = new Carbon($date->format("Y-M-d"));

            $dateNaissance = new Carbon($naissance);

            if ($dateNaissance->diffInYears($dateCourante) <= 13) {
                $result["message"] = "Veuillez renseigner une date de naissance valide";
                $result["error"] = true;
                return response()->json($result);
            }
        } catch (\Exception $e) {
            $result["message"] = "Le format de la date de naissance n'est pas valide";
            $result["error"] = true;
            return response()->json($result);
        }

        $user = new User();
        $user->username = $username;
        $user->datenaissance = $naissance;
        $user->sexe = $sexe;
        $user->nationalite = "TG";
        $user->numero = "+228 " . $numero;
        $user->password = $password;
        $user->type_user_id = $typeUser->id;

        $user->region_id = $region;
        $user->profession = $profession;
        $user->source = "U";

        $user->activation = true;

            try {
                $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                srand((double)microtime() * 1000000);
                $i = 0;
                $code = '';

                while ($i <= 4) {
                    $num = rand() % 33;
                    $tmp = substr($chars, $num, 1);
                    $code = $code . $tmp;
                    $i++;
                }

                $user->code = $code;
                $user->save();

                //Affectation de code à l'utilisateur
                $date = new \DateTime();
                $carbonDate = new Carbon($date->format("Y-M-d"));
                $age = $carbonDate->diffInYears(new \Carbon\Carbon($user->datenaissance));
                $ageConcat = $age + $user->id;
                $user->codeUser = $user->id . "eCC" . $ageConcat . "U";
                $user->save();

            }catch (\Exception $e) {
                $result["message"] = "Une erreur s'est produite, veuillez réessayer";
                $result["error"] = true;
                return response()->json($result);
            }
        $result["message"] = "Utilisateur enrégistré avec succès";
        $result["error"] = false;
        return response()->json($result);
    }

    //Affichage de la liste des utilisateurs
    //  https://econvivial.org/api/v1/econvivial/show-list-user
    public function getListeUser(){

        $result["list_user"] = [];
        $result["error"] = false;

        $users = User::where("type_user_id", 1)->orderBy("id", "desc")->get();
        $date = new \DateTime();
        $carbonDate = new Carbon($date->format("Y-M-d"));
        $data = [];
        foreach ($users as $user){

            $age = $carbonDate->diffInYears(new \Carbon\Carbon($user->datenaissance));

            $data2["username"] = $user->username ;
            $data2["telephone"] = $user->numero ;
            $data2["sexe"] = $user->sexe ;
            $data2["age"] = $age ;
            $data2["region"] = $user->region != null ? $user->region->libelle : "Non défini" ;
            $data2["profession"] = $user->profession != null ? $user->profession : "Non défini" ;

            $data[] = $data2;
        }

        $result["list_user"] = $data;
        $result["error"]  = false;

        return response()->json($result);
    }
    
    
    /**
     * Api de suivi de menstruation
     */


    public function sendSuiviOvulation(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

            // $id = $_GET["id"];
            $numero = "+228 ".trim($_GET["numero"]);
            $dateRegle = $_GET["dateRegle"];
            $dureeCycle = $_GET["dureeCycle"];

            $user = User::where("numero", $numero)->first();

            if(!is_numeric($dureeCycle)){
                $result["message"] = "Veuillez renseigner la durée du cycle";
                $result["error"]  = true;
                return json_encode($result);
            }
            /* if($dateRegle == null || $dureeCycle == null){
                 $result["message"] = "Veuillez renseigner tous les champs";
                 $result["error"]  = true;
                 return json_encode($result);
             }  */
            if($user){

                $menstruation = Menstruation::where("user_id", $user->id)->where("type", "ovulation")->first();

                if($menstruation != null){
                    $result["message"] = "Vous avez déjà souscri à un suivi d'ovulation.";
                    $result["error"]  = true;
                    return json_encode($result);
                }

                //Calcul pour déterminer la date de la prochaine ovulation
                $carbon = new Carbon($dateRegle);

                $dateProchaineOvulation  = $carbon->addDay($dureeCycle - 13);

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
    
        public function sendSuiviGrossesse(){

        $result["message"] = [];
        $result["error"]  = false;

        if(isset($_GET)){

           // $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            
            $dateRegle = $_GET["dateRegle"];
            $nbreSemaine = $_GET["nbreSemaine"];

            $user = User::where("numero", $numero)->first();

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


            if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }
            
           $user = User::where("numero", $numero)->first();

            if($user == null){
                 $result["message"] = "Une erreur s'est produite";
                    $result["error"]  = true;
                    return response()->json($result);
            }
            
            $beneficiaire = SuiviGrosesse::where("user_id", $user->id)->first();

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
    
    
    /**
     * Get suivi de règle
     */

    public function getSuiviRegle(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

           // $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->first();
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
     * Get suivi d'ovulation
     */

    public function getSuiviOvulation(){

        $result["message"] = [];
        $result["error"]  = false;
        if(isset($_GET)){

          //  $id = $_GET["id"];
             if(strlen( $_GET["numero"])  == 8){
                $numero = "+228 ".trim($_GET["numero"]);
            }else{
                $numero = "+".trim($_GET["numero"]);
            }

            $user = User::where("numero", $numero)->first();
            if($user){

                $menstru = Menstruation::where("user_id",$user->id)->where("type", "ovulation")->first();

                if($menstru != null){
                    $suiviRegle = true;
                    $dateProch = new Carbon($menstru->dateProchainOvulation);
                    $date = new \DateTime();
                    //return json_encode($dateProch);
                    $dateCourant = new Carbon($date->format("Y-M-d"));

                    while($dateProch < $dateCourant){
                        $menstru->dateRegle = $menstru->dateProchainOvulation;
                        $menstru->dateProchainOvulation = $dateProch->addDay($menstru->dureeCycle - 13);
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

}
