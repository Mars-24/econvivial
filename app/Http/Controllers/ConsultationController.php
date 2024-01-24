<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\FormationSanitaire;
use App\Notifications\RepliedToThread;
use App\ObjetConsultation;
use App\Region;
use App\User;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    //

    public function index(){
        return view("Consultation.index")->with(["page" => "consultation"]);
    }

    public function doConsultation(){
        $page = "consultation";
        $regions = Region::orderBy("id", "asc")->get();
        $objets = ObjetConsultation::orderBy("libelle", "asc")->get();
        return view("Consultation.doConsultation")
            ->with(["regions" => $regions])
            ->with(["objets" => $objets])
            ->with(["page" => $page]);
    }

	public function doConsultationAdmin(){
        $page = "consultation";
        $regions = Region::orderBy("id", "asc")->get();
        $objets = ObjetConsultation::orderBy("libelle", "asc")->get();
        return view("Consultation.doConsultationAdmin")
            ->with(["regions" => $regions])
            ->with(["objets" => $objets])
            ->with(["page" => $page]);
    }

    public function getVille(Request $request){
        $results[] = null;
        $region = Region::where("libelle", $request["libelle"])->first();
        if($region != null){
            $villes = Ville::where("region_id", $region->id)->orderBy("libelle", "asc")->get();
            $results["error"] = false;
            $results["villes"] = $villes;
            return $results;
        }
        $results["error"] = true;
        $results["villes"] = null;
        return $results;
    }

    public function getObjetDetail(Request $request){
        $results[] = null;
        $objet = ObjetConsultation::where("libelle", $request["libelle"])->first();
        if($objet != null){
            $results["error"] = false;
            $results["desc"] = $objet->description;
            return $results;
        }
        $results["error"] = true;
        $results["desc"] = "Une erreur s'est produite";
        return $results;
    }

    public function getFormationSanitaire(Request $request){
        $results[] = null;
        $ville = Ville::where("libelle", $request["libelle"])->first();
        if($ville != null){
        $formations = FormationSanitaire::where("ville_id", $ville->id)->orderBy("libelle", "asc")->get();
        $results["error"] = false;
        $results["formations"] = $formations;
        return $results;
        }
        $results["error"] = true;
        $results["formations"] = null;
        return $results;
    }

    public function saveConsultation(Request $request){

        $formation = FormationSanitaire::where("libelle", $request["formation-sanitaire"])->first();

        if($formation == null){
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante. Veuillez réessayer"]);
        }

        $objet = ObjetConsultation::where("libelle", $request["objet"])->first();

        if($objet == null){
            return redirect()->back()->with(["error" => "Veuillez choisir l'objet de votre consultation"]);
        }
        $consultation = new Consultation();
        $consultation->profession = $request["profession"];
        $consultation->situation = $request["situation-matri"];
        $consultation->nbreEnfant = $request["nbre-enfant"];
        $consultation->voyage = $request["voyage"];
        $consultation->formation_sanitaire_id = $formation->id;
        $consultation->description = $request["description"];
        $consultation->recu = false;
        $consultation->nbreEnfant = $request["nbre-enfant"];
        $consultation->user_id = Auth::user()->id;
        $consultation->objet_consultation_id = $objet->id;
        $consultation->save();

        /**
         * Notifier la formation sanitaire anisi que tous ces utilisateurs
         */

        $users = User::where("formation_sanitaire_id", $formation->id)->get();
        foreach ($users as $user){
            $user->notify(new RepliedToThread("Prise de rendez-vous de consultation",Auth::user()));
        }

        
        Session::put("consultation", true);
        Session::put("formation", $formation);

        return redirect()->back()->with(["message" => "Demande de consultation envoyée. \n Prière vous référer au Centre ".$request['formation-sanitaire']." pour poursuivre votre consultation. Un personnel qualifié est informé de votre arrivée et vous attend.
                                                            Le Centre ".$request['formation-sanitaire']." se situe.
                                                            Tél. : 
                                                            Frais de consultation :
                                                            Disponibilité des médicaments :
                                                            "])->with(["formation" => $formation]);
                                                            
    }

    
    public function saveConsultationAdmin(Request $request){

        $formation = FormationSanitaire::where("libelle", $request["formation-sanitaire"])->first();

        if($formation == null){
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante. Veuillez réessayer"]);
        }

        $objet = ObjetConsultation::where("libelle", $request["objet"])->first();

        if($objet == null){
            return redirect()->back()->with(["error" => "Veuillez choisir l'objet de votre consultation"]);
        }
        $consultation = new Consultation();
        $consultation->profession = $request["profession"];
        $consultation->situation = $request["situation-matri"];
        $consultation->nbreEnfant = $request["nbre-enfant"];
        $consultation->voyage = $request["voyage"];
        $consultation->formation_sanitaire_id = $formation->id;
        $consultation->description = $request["description"];
        $consultation->recu = false;
        $consultation->nbreEnfant = $request["nbre-enfant"];
        $consultation->user_id = Auth::user()->id;
        $consultation->objet_consultation_id = $objet->id;
        $consultation->save();

        /**
         * Notifier la formation sanitaire anisi que tous ces utilisateurs
         */

        $users = User::where("formation_sanitaire_id", $formation->id)->get();
        foreach ($users as $user){
            $user->notify(new RepliedToThread("Prise de rendez-vous de consultation",Auth::user()));
        }

        
        Session::put("consultation", true);
        Session::put("formation", $formation);

        return redirect()->back()->with(["message" => "Demande de consultation envoyée. \n Prière vous référer au Centre ".$request['formation-sanitaire']." pour poursuivre votre consultation. Un personnel qualifié est informé de votre arrivée et vous attend.
                                                            Le Centre ".$request['formation-sanitaire']." se situe.
                                                            Tél. : 
                                                            Frais de consultation :
                                                            Disponibilité des médicaments :
                                                            "])->with(["formation" => $formation]);
                                                            
    }

    public function getDemandesAttente()
    {
        $consultations = Consultation::where("user_id", Auth::user()->id)
                        ->where("result", false)
                        ->orderBy("created_at", "desc")->get();
        
        return view("Consultation.mesConsultations")
                ->with(["consultations" => $consultations])
                ->with(["page" => "consultation-do"]);
    }

    public function getDemandesEffectuee(){
        $consultations = Consultation::where("recu", true)
                        ->where("user_id", Auth::user()->id)
                        ->where("result", false)
                        ->orderBy("created_at", "desc")->get();
                        
        return view("Consultation.mesConsultationsDo")
            ->with(["consultations" => $consultations])
            ->with(["page" => "consultation-do"]);
    }

    /**
     * @return mixed
     * Affichage de l'interface de liste des résultats envoyés aux utilisateurs
     */

    public function getListeResultat(){
        $consultations = Consultation::where("user_id", Auth::user()->id)
                            ->where("result", true)->get();
        return view("Consultation.resultat")
            ->with(["consultations" => $consultations])
            ->with(["page" => "consultation-resultat"]);
    }
}
