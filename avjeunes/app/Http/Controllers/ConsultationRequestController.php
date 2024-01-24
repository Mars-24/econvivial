<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\NotifToken;
use App\FormationSanitaire;
use App\Notifications\RepliedToThread;
use App\ObjetConsultation;
use App\User;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationRequestController extends Controller
{
    //
    public function getObjetConsultation()
    {

        $result["objets"] = [];
        $result["error"] = false;

        $objets = ObjetConsultation::orderBy("libelle", "asc")->get();

        $result["objets"] = $objets;
        $result["error"] = false;
        return response()->json($result);
    }

    public function getFormationSanitaire()
    {
        $result["formation"] = [];
        $result["error"] = false;

        // $formation = DB::select("select * from formation_sanitaires order by rand() limit 1");

        $formation = DB::select("select * from formation_sanitaires order by libelle asc");
        $result["formation"] = $formation;
        $result["error"] = false;

        return response()->json($result);
    }

    public function getFormationSanitaireByVille()
    {
        $result["villes"] = [];
        $result["error"] = false;

        $villes = Ville::orderBy("libelle", "asc")->get();
        $data["ville"]["formations"] = array();
        $finalData = array();
        foreach ($villes as $ville) {
            $data = $ville;
            $formations = FormationSanitaire::where('ville_id', $ville->id)->orderBy("libelle", "asc")->get();
            $data["formations"] = $formations;
            array_push($finalData, $data);
        }
        $result["villes"] = $finalData;
        return response()->json($result);
    }

    public function postDemandeConsultationIst()
    {
        $result["message"] = [];
        $result["error"] = false;

        if (isset($_GET)) 
		{
            $identifiant = $_GET["identifiant"];
            $profession = $_GET["profession"];
            $situation = $_GET["situation"];
            $formationSanitaire = $_GET["formation"];
            $objetConsultation = $_GET["objetConsultation"];
            $nbreEnfant = $_GET["nbreEnfant"];
            $voyage = $_GET["voyage"];
            $description = $_GET["description"];

            $formation = FormationSanitaire::where("libelle", $formationSanitaire)->first();

            if ($formation == null) {
                $result["message"] = "Formation sanitaire inconnue";
                $result["error"] = true;
                return response()->json($result);
            }

            $objet = ObjetConsultation::where("libelle", $objetConsultation)->first();

            if ($objet == null) {
                $result["message"] = "Objet de consultation inconnue";
                $result["error"] = true;
                return response()->json($result);
            }

            $user = User::where("id", $identifiant)->first();
            if ($user == null) {
                $result["message"] = "Utilisateur corrumpu";
                $result["error"] = true;
                return response()->json($result);
            }
            $consultation = new Consultation();
            $consultation->profession = $profession;
            $consultation->situation = $situation;
            $consultation->nbreEnfant = $nbreEnfant;
            $consultation->voyage = $voyage;
            $consultation->formation_sanitaire_id = $formation->id;
            $consultation->description = $description;
            $consultation->recu = false;
            $consultation->user_id = $user->id;
            $consultation->objet_consultation_id = $objet->id;
            $consultation->save();

            /**
             * Notifier la formation sanitaire anisi que tous ces utilisateurs
             */

            $users = User::where("formation_sanitaire_id", $formation->id)->get();

            foreach ($users as $user) {
                $user->notify(new RepliedToThread("Prise de rendez-vous de consultation", $user));
            }

            $result["message"] = "Rendez-vous pris au " . $formation->libelle . ", frais de consultation : " . $formation->frais . "
                                , nom du prestataire " . $formation->pointFocal . ". Contact : " . $formation->contact . ".";

            $this->sendMessageToPrestataire($formation);
            $result["error"] = false;
            return response()->json($result);
        }

        $result["message"] = "Impossible de traiter la requete";
        $result["error"] = true;
        return response()->json($result);
    }

    public function sendMessageToPrestataire($formation)
    {
        $prestataireNumber = preg_replace('/\s+/', '', '228'.$formation->contact, 1);
        $message = "Cher-e prestataire, prière consulter votre compte eConvivial pour découvrir les rendez-vous
                    de consultation des jeunes enregistrés.";
        $sendSMS = new NotifToken();
        $sendSMS->sendProviderSMS($prestataireNumber, $message);
    }

    public function getListeConsultationAttente()
    {

        $result["message"] = [];
        $result["consultations"] = [];
        $result["error"] = false;

        if (isset($_GET)) {
            $identifiant = $_GET["identifiant"];

            $user = User::where("id", $identifiant)->first();
            if ($user == null) {
                $result["message"] = "Utilisateur corrumpu";
                $result["error"] = true;
                return response()->json($result);
            }

            $consultations = Consultation::where("user_id", $user->id)->where("result", false)
                ->orderBy("created_at", "desc")->get();

            $consultations = DB::select("select c.created_at as date, c.description as motif, o.libelle as objet, f.libelle as formation
                                      from consultations c, objet_consultations o, formation_sanitaires f 
                                      where c.user_id = " . $user->id . " 
                                      and c.result is false
                                      and c.objet_consultation_id = o.id
                                      and c.formation_sanitaire_id = f.id
                                      order by date desc");

            $result["consultations"] = $consultations;
            $result["error"] = false;
            return response()->json($result);
        }
        $result["message"] = "Impossible de traiter la requete";
        $result["error"] = true;
        return response()->json($result);
    }

    public function getListeConsultationEffectuee()
    {

        $result["message"] = [];
        $result["consultations"] = [];
        $result["error"] = false;

        if (isset($_GET)) {
            $identifiant = $_GET["identifiant"];

            $user = User::where("id", $identifiant)->first();
            if ($user == null) {
                $result["message"] = "Utilisateur corrumpu";
                $result["error"] = true;
                return response()->json($result);
            }

            $consultations = Consultation::where("recu", true)
                ->where("user_id", $user->id)
                ->where("result", false)
                ->orderBy("created_at", "desc")->get();

            $consultations = DB::select("select c.created_at as date, c.description as motif, o.libelle as objet, f.libelle as formation, r.recommandation as recommandation, r.ordonnance as ordonnance
                                      from consultations c, objet_consultations o, formation_sanitaires f ,resultat_consultations r
                                      where c.user_id = " . $user->id . " 
                                      and c.result is true
                                      and c.objet_consultation_id = o.id
                                      and c.formation_sanitaire_id = f.id
                                      and c.id = r.consultation_id
                                      order by date desc");

            $result["consultations"] = $consultations;
            $result["error"] = false;
            return response()->json($result);
        }
        $result["message"] = "Impossible de traiter la requete";
        $result["error"] = true;
        return response()->json($result);
    }
}
