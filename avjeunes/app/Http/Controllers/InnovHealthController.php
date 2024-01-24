<?php

namespace App\Http\Controllers;

use App\Beneficiaire;
use App\Conjoint;
use App\CPN_Suivi;
use App\DateProbableConsultation;
use App\DateProbableVaccination;
use App\Langue;
use App\LanguePreference;
use App\MessageGrossesse;
use App\MessageGrossesseUser;
use App\NotificationMessage;
use App\NotifToken;
use App\Q;
use App\Quartier;
use App\RapportAlerteSms;
use App\Region;
use App\Site_Consult;
use App\User;
use App\Vacci_Nature;
use App\Vacci_Type;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InnovHealthController extends Controller
{
    //

    public function getBeneficiairePage(){
        $quartiers = Quartier::orderBy("libelle", "asc")->get();

        $langues = Langue::orderBy("libelle_langue", "asc")->get();

        return view("InnovHealth.index")->with(["page" => "dashboard"])->with(["quartiers" => $quartiers])->with(["langues" => $langues]);

    }

    public function getlisteLangue(){
        $langues = Langue::orderBy("libelle_langue", "asc")->get();
        dd($langues);
        return view("InnovHealth.index")->with(["langues" => $langues]);
    }


    public function saveSuiviBeneficiaire(Request $request){

        /**
         * Enrégistrement des infos du bénéficiaire
         */

      /*  $dateLastRegle = new Carbon($request["dateRegle"]);
        $dateLastRegle->addDay(7*12);
        return json_encode($dateLastRegle);  */

        $dateJour = new \DateTime();

        $beneficiaire = new Beneficiaire();
        $beneficiaire->nom  = $request["name"];

        $beneficiaire->prenom  = $request["prenom"];
        $beneficiaire->telephone  = "+228 ".$request["telephone"];
        $beneficiaire->quartier_id  = $request["quartier"];
        $beneficiaire->ptme  = $request["typePatient"];
        $beneficiaire->haveConjoint  = $request["conjoint"];
        $beneficiaire->optionSuivi  = $request["optionSuivi"];

        if($request["optionSuivi"] == "Suivi de la grossesse"){

            $beneficiaire->dateRegle = $request["dateRegle"];
            $beneficiaire->dureeGrossese = $request["dureeGrossesse"];
        }

        if($request["optionSuivi"] == "Suivi vaccinal"){
            $beneficiaire->dateAccouchement = $request["dateAccouchement"];
            $beneficiaire->ageBebe = $request["ageBebe"];
            $beneficiaire->nomBebe = $request["nomBebe"];
        }

        $beneficiaire->save();

        $identifiant = $beneficiaire->id;
        $initName = strtoupper(substr($request["name"], 0,3));
        $initPrenom = strtoupper(substr($request["prenom"],0,3));
        $initMois = strtoupper($dateJour->format("M"));
        $year = $dateJour->format("y");
        $isPMTE = $beneficiaire->ptme ? "O" : "N";


        $beneficiaire->code  = $identifiant.$initName."-".$initPrenom."-".$initMois.$year."-".$isPMTE;

        $beneficiaire->save();
        /**
         * Enrégistrement des infos sur la langue
         */

        $langue = new LanguePreference();
        $langue->libelle = $request["langue"];
        $langue->beneficiaire_id = $beneficiaire->id;
        $langue->save();


        /**
         * Enrégistrement des infos sur le conjoint
         */

        if($beneficiaire->haveConjoint){
            $conjoint  = new Conjoint();
            $conjoint->nom = $request["nomConjoint"];
            $conjoint->prenom = $request["prenomConjoint"];
            $conjoint->telephone = $request["telephoneConjoint"];
            $conjoint->beneficiaire_id = $beneficiaire->id;
            $conjoint->save();
        }

        if($request["optionSuivi"] == "Suivi de la grossesse"){
        $this->saveCPN($beneficiaire->dateRegle,$beneficiaire) ;
        }

        if($request["optionSuivi"] == "Suivi vaccinal"){
            $this->saveSuiviVaccination($beneficiaire->dateAccouchement,$beneficiaire);
        }

        if($request["optionSuivi"] == "Suivi de la grossesse"){
            return redirect()->route("liste-demande-suivi-grossesse")->with(["message" => "Bénéficiaire enregistré avec succès"]);
        }else{
            return redirect()->route("suivi-vaccination-en-cours")->with(["message" => "Bénéficiaire enregistré avec succès"]);
        }

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
     * @param $semaine
     * @param $dateProbable
     * @param $vaccin
     *
     * @param $beneficiaireIDEnrégistrer les suivi de vaccination
     */


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
     * Liste de suivi des grosesses en cours
     */


    public function getListeSuiviGrossesse(){
        $dateJour = new \DateTime();
        // $grosseses = Beneficiaire::where("optionSuivi","Suivi de la grossesse")->where("dateFinSuivi", ">", $dateJour->format("Y-m-d"))->get();
        $grosseses = Beneficiaire::where("optionSuivi","Suivi de la grossesse")->where("dureeGrossese", "<", 36)->get();
        return view("InnovHealth.Grossesse.liste")
                ->with(["grossesses" => $grosseses])
                ->with(["page" => "grossesse-en-cours"]);

    }

    public function getListeSuiviTerme(){
        $dateJour = new \DateTime();
        // $grosseses = Beneficiaire::where("optionSuivi","Suivi de la grossesse")->where("dateFinSuivi", "<=", $dateJour->format("Y-m-d"))->get();
        $grosseses = Beneficiaire::where("optionSuivi","Suivi de la grossesse")->where("dureeGrossese", ">=", 36)->get();
        return view("InnovHealth.Grossesse.terme")
                ->with(["grossesses" => $grosseses])
                ->with(["page" => "grossesse-terme"]);

    }

    public function getDetailSuiviGrossesse(){
        $page = "";
        if(isset($_GET)){
            $ref = $_GET["ref"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            if($beneficiaire != null){
                $dateCPNS =  DateProbableConsultation::where("beneficiaire_id", $beneficiaire->id)->get();

                if($_GET["page"] == "liste"){
                    $page = "grossesse-en-cours";
                }else{
                    $page = "grossesse-terme";
                }
                return view("InnovHealth.Grossesse.detailCPN")
                        ->with(["dateCPNS" => $dateCPNS])
                        ->with(["beneficiaire" => $beneficiaire])
                        ->with(["page" => $page]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la page"]);
    }


    /**
     * Liste des suivi de vaccination
     */

    public function getBeneficiaireVaccin(){
        $quartiers = Quartier::orderBy("libelle", "asc")->get();

        $langues = Langue::orderBy("libelle_langue", "asc")->get();

        // $VaccinNats = vacci_nature::orderBy("id_vacci_nat", "asc")->get();
        $VaccinNats = vacci_nature::all();
        return view("InnovHealth.Vaccin.index")->with(["page" => "dashboard"])->with(["quartiers" => $quartiers])->with(["langues" => $langues])->with(["VaccinNats" => $VaccinNats]);

    }

    public function listVaccinPTME($vaccinId)
    {
        // Retour des vaccin pour PTME sélectionné 
        return vacci_type::where("id_vacci_nat",$vaccinId)->get(['code_vacci_typ', 'lib_vacci_typ', 'id_vacci_nat']);
    }   

    public function getListeSuiviVaccination(){
        $dateJour = new \DateTime();
        $grosseses = Beneficiaire::where("optionSuivi","Suivi vaccinal")->where("dateFinSuivi", ">", $dateJour->format("Y-m-d"))->get();
        return view("InnovHealth.Vaccin.liste")
            ->with(["grossesses" => $grosseses])
            ->with(["page" => "vaccin-en-cours"]);
    }

    public function getListeSuiviVaccinationTerme(){
        $dateJour = new \DateTime();
        $grosseses = Beneficiaire::where("optionSuivi","Suivi vaccinal")->where("dateFinSuivi", "<=", $dateJour->format("Y-m-d"))->get();
        return view("InnovHealth.Vaccin.terme")
            ->with(["grossesses" => $grosseses])
            ->with(["page" => "vaccin-a-terme"]);
    }

    public function getDetailSuiviVacination(){

        $page = "";
        if(isset($_GET)){
            $ref = $_GET["ref"];
            $beneficiaire = Beneficiaire::where("id", $ref)->first();
            if($beneficiaire != null){
                $dateVaccinations =  DateProbableVaccination::where("beneficiaire_id", $beneficiaire->id)->get();

                if($_GET["page"] == "liste"){
                    $page = "vaccin-en-cours";
                }else{
                    $page = "vaccin-a-terme";
                }
                return view("InnovHealth.Vaccin.detailVaccination")
                    ->with(["dateVaccinations" => $dateVaccinations])
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["page" => $page]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la page"]);

    }

    /**
     * Rapport journalier d'envoie de SMS suivi grossesse
     */

    public function getRapportJournalierSuiviGrossesse(){

        $dateJour = new \DateTime();
        $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
        $dateFin = $dateJour->format("y-m-d")." 23:59:59";

        $rapports = RapportAlerteSms::where("type", "Suivi de grossesse")->where("created_at", ">=",$dateDebut)
                                        ->where("created_at", "<=", $dateFin)
                                          ->orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.smsJournalier")
            ->with(["page" => "grossessese-journalier", "rapports" => $rapports]);
    }


    public function getRapportPeriodiqueSuiviGrossesse(){

        $rapports = RapportAlerteSms::where("type", "Suivi de grossesse")->orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.smsPeriodique")
            ->with(["page" => "grossessese-periodique", "rapports" => $rapports]);
    }

    public function  getDetailRapportSuiviGrossesse(){

        $page = "";
        if(isset($_GET)){

            $rapportID = $_GET["ref"];

            $rapport = RapportAlerteSms::where("id", $rapportID)->first();

            if($page == "journalier"){
                $page = "grossessese-journalier";
            }else{
                $page = "grossessese-periodique";
            }

            if($rapport != null){

                $details = RapportAlerteUser::where("rapport_alerte_sms_id", $rapport->id)->get();


                return view("InnovHealth.Grossesse.detailRapport")
                    ->with(["page" => $page, "details" => $details, "rapport" => $rapport]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
        }

        return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
    }


    /**
     * Rapport journalier d'envoie de SMS suivi vaccination
     */

    public function getRapportJournalierSuiviVaccination(){

        $dateJour = new \DateTime();
        $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
        $dateFin = $dateJour->format("y-m-d")." 23:59:59";

        $rapports = RapportAlerteSms::where("type", "Suivi vaccination")->where("created_at", ">=",$dateDebut)
            ->where("created_at", "<=", $dateFin)
            ->orderBy("id", "desc")->get();
        return view("InnovHealth.Vaccin.smsJournalier")
            ->with(["page" => "vaccination-journalier", "rapports" => $rapports]);
    }


    public function getRapportPeriodiqueSuiviVaccination(){

        $rapports = RapportAlerteSms::where("type", "Suivi vaccination")->orderBy("id", "desc")->get();
        return view("InnovHealth.Vaccin.smsPeriodique")
            ->with(["page" => "vaccination-periodique", "rapports" => $rapports]);
    }

    public function  getDetailRapportSuiviVaccination(){

        $page = "";
        if(isset($_GET)){

            $rapportID = $_GET["ref"];

            $rapport = RapportAlerteSms::where("id", $rapportID)->first();

            if($page == "journalier"){
                $page = "vaccination-journalier";
            }else{
                $page = "vaccination-periodique";
            }

            if($rapport != null){

                $details = RapportAlerteUser::where("rapport_alerte_sms_id", $rapport->id)->get();


                return view("InnovHealth.Vaccin.detailRapport")
                    ->with(["page" => $page, "details" => $details, "rapport" => $rapport]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
        }

        return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
    }


    /**
     * Page d'envoie de sms femmes enceintes
     */
    public function getPageEnvoieSms(){
        $dateJour = new \DateTime();
        $grosseses = Beneficiaire::where("optionSuivi","Suivi de la grossesse")->where("dateFinSuivi", ">", $dateJour->format("Y-m-d"))->get();
        return view("InnovHealth.Grossesse.message")
            ->with(["grossesses" => $grosseses])
            ->with(["page" => "message-grossesse"]);
    }

    public function postMessageFemmeEnceinte(Request $request){

        if(count($request["choix"]) == 0){
            return redirect()->back()
                ->with(["error" => "Impossible de diffuser le message. Veuillez sélectionner les destinataires"])
                ->withInput();
        }

        $ids = $request["choix"];

        //Enrégistrement du message

        $message = new MessageGrossesse();
        $message->message = $request["message"];
        $message->user_id = Auth::user()->id;
        $message->save();

        $count = 0;
        $tokens = array();

        foreach ($ids as $id) {

            $beneficiaire = Beneficiaire::where("id", $id)->first();
            if($beneficiaire != null){

                  //Récupérer l'le token de l'utilisateur s'il en a

                if($beneficiaire->user_id != null){
                    $tokens[] =  NotifToken::where("user_id", $beneficiaire->user_id)->first()->token;
                }

                 //   return "Impossible de message";
                    $userNumber = preg_replace('/\s+/', '', substr($beneficiaire->telephone,1));

                    $client = new Client();
                   //$res = $client->request('GET', "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".$request["message"]);

                    //if($res->getStatusCode() == 200){
                        //Enrégistrer la ligne ds MessageGrossesseUser
                        $msgUser = new MessageGrossesseUser();
                        $msgUser->recu = true;
                        $msgUser->message_grossesse_id = $message->id;
                        $msgUser->beneficiaire_id = $beneficiaire->id;
                        $msgUser->save();
                        $count++;
                    /*}else{
                        return "Impossible d'envoyer";
                    } */

                /**
                 * Enregistrement des notifications
                 */

                $notifMessage = new NotificationMessage();
                $notifMessage->message = $request["message"];
                $notifMessage->type = "Grossesse";
                $notifMessage->user_id = $beneficiaire->user_id;
                $notifMessage->save();
            }
        }

       // return json_encode($tokens);

        $message->delivrer = true;
        $message->nbreRecu = $count;
        $message->save();

       $notifToken = new NotifToken();

       $notifToken->sendNotificationToUser($tokens, "Alerte femmes enceintes", $request["message"]);

       return redirect()->route("liste-message-grossesse-diffuser")->with(["message" => "Message diffusé avec succès"]);
    }

    public function getListeMessageGrossesse(){
        $messages = MessageGrossesse::orderBy("id", "desc")->get();
        return view("InnovHealth.Grossesse.listeMessage")
            ->with(["messages" => $messages])
            ->with(["page" => "liste-message-grossesse"]);
    }

    public function detailMessageGrossesse(){
        if(isset($_GET)){
            $ref = $_GET["ref"];
            $message = MessageGrossesse::where("id", $ref)->first();
            $beneficiaire = Beneficiaire::where("id", $message->beneficiaire_id)->first();
           // return json_encode($beneficiaire);
            if($message != null){
                $detailMessages = MessageGrossesseUser::where("message_grossesse_id", $message->id)->get();
                return view("InnovHealth.Grossesse.detailListeMessage")
                    ->with(["detailMessages" => $detailMessages])
                    ->with(["message" => $message])
                    ->with(["beneficiaire" => $beneficiaire])
                    ->with(["page" => "liste-message-grossesse"]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de consulter la liste des destinataires"]);
    }


}
