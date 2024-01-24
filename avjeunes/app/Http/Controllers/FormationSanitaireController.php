<?php

namespace App\Http\Controllers;

use App\User;
use App\Ville;
use App\NotifToken;
use App\Consultation;
use App\FormationSanitaire;
use Illuminate\Http\Request;
use App\ResultatConsultation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Notifications\RepliedToThread;
use Illuminate\Support\Facades\Storage;

class FormationSanitaireController extends Controller
{
    public function dashboard(){
        $consultations = Consultation::where("formation_sanitaire_id", Auth::user()->formation_sanitaire_id)->where("recu", false)->orderBy("id", "desc")->get();
        return view("FormationSanitaire.dashboard")
                    ->with(["consultations" => $consultations])
                    ->with(["page" => "demande-consultation"]);
    }

    public function confirmReception(Request $request){

        $consultation = Consultation::where("id", $request["id"])->first();
        if($consultation){
            $consultation->recu = true;
            $consultation->user_repondeur = Auth::user()->id;
            $consultation->date_reponse = new \DateTime();
            $consultation->save();
            return redirect()->route("demande-consultation-effectuee")->with(["message" => "Validation effectuée"]);
        }
        return redirect()->back()->with(["error" => "Impossible de confirmer, consultation inexistante"]);
    }

    public function consultationDo(){
        $consultations = Consultation::where("formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
                                        ->where("recu", true)
                                        ->where("result", false)
                                        ->orderBy("id", "desc")->get();
        return view("FormationSanitaire.consultationDo")
            ->with(["consultations" => $consultations])
            ->with(["page" => "consultation-effectuee"]);
    }

    public function attachFile(Request $request){

        $consultation = Consultation::where("id", $request['id'])->first();
        if ($consultation){

            if($request->file("fichier")){
                $file = $request->file("fichier");
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time()."file_attach.".$fileExtension;
                Storage::disk('attach')->put($fileName,File::get($file));
                $consultation->resultat = $fileName;
                $consultation->save();
                return redirect()->back()->with(["message" => "Fichier attaché avec succès"]);
            }
            return redirect()->back()->with(["error" => "Aucun fichier attaché"]);
        }
        return redirect()->back()->with(["error" => "Impossible d'attacher un fichier"]);
    }

    public function sendResult(Request $request){

        $this->validate($request, [
            "recommandation" => "required",
        ]);

        $consultation = Consultation::where("id", $request["id"])->first();
        if($consultation){
            if($request["noOrdonnance"] == true){
                $resultat = new ResultatConsultation();
                $resultat->recommandation = $request["recommandation"];
                $resultat->ordonnance = "Aucun médicament associé au résultat";
                $resultat->consultation_id = $consultation->id;
                $resultat->save();
            }else{
                foreach ($request["medicament"]  as $medoc){
                    $resultat = new ResultatConsultation();
                    $resultat->recommandation = $request["recommandation"];
                    $resultat->ordonnance = $medoc;
                    $resultat->consultation_id = $consultation->id;
                    $resultat->save();
                }
            }

            $consultation->result = true;
            $consultation->save();

            $user = User::where("id", $consultation->user_id)->first();
            $formationSainatire = FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first();

            if($user != null && $formationSainatire != null){
                $user->notify(new RepliedToThread("Résultat de consultation auprès de la formation sanitaire <<".$formationSainatire->libelle.">>",Auth::user()));
            }

            return redirect()->route("resultat-consultation-utilisateur")->with(["message" => "Résultat envoyé au patient avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, veuillez réessayer"]);
    }

    /**
     * @return mixed
     * Affichage de l'interface de liste des résultats envoyés aux utilisateurs
     */

    public function getListeResultat(){
        $consultations = Consultation::where("result", true)->where("formation_sanitaire_id", Auth::user()->formation_sanitaire_id)->get();
        return view("FormationSanitaire.resultat")
                    ->with(["consultations" => $consultations])
                    ->with(["page" => "consultation-resultat"]);
    }

    ///Admini formation sanitaire
    public function  index(){
        $villes = Ville::orderBy("libelle", "asc")->get();
        $formations = FormationSanitaire::orderBy("libelle" , "asc")->get();

        return view("Admin.FormationSanitaire.index")
                ->with(["villes" => $villes])
                ->with(["formations" => $formations])
                ->with(["page" => "formation-sanitaire"]);
    }

    public function saveFormation(Request $request){

        $ville = Ville::where("libelle", $request["ville"])->first();
        if($ville == null){
            return redirect()->back()->with(["error" => "Ville inexistante. Veuillez réessayer"]);
        }
        $formation = new FormationSanitaire();
        $formation->libelle = $request["formation"];
        $formation->lienLocalisation = $request["lienLocalisation"];
        $formation->service = $request["service"];
        $formation->contact = $request["contact"];
        $formation->pointFocal = $request["pointFocal"];
        $formation->frais = $request["frais"];
        $formation->telephone = $request["telephone"];
        $formation->situationGeo = $request["situationGeo"];
        $formation->ville_id = $ville->id;
        $formation->save();
        return redirect()->back()->with(["message" => "Formation sanitaire enrégistrée  avec succès"]);
    }

    public function postEditFormationSanitaire(Request $request){

        $formation = FormationSanitaire::where("id", $request['id'])->first();
        if($formation == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier"]);
        }
        $ville = Ville::where("libelle", $request["ville"])->first();
        if($ville == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier"]);
        }

        $formation->libelle = $request["libelle"];
        $formation->ville_id  = $ville->id;
        $formation->lienLocalisation = $request["lienLocalisation"];
        $formation->service = $request["service"];
        $formation->contact = $request["contact"];
        $formation->pointFocal = $request["pointFocal"];
        $formation->frais = $request["frais"];
        $formation->telephone = $request["telephone"];
        $formation->situationGeo = $request["situationGeo"];
        $formation->save();
        return redirect()->back()->with(["message" => "Modification apporté avec succès"]);
    }

    public function  postDeleteFormationSanitaire(Request $request){
        $formation = FormationSanitaire::where("id", $request['id'])->first();
        if($formation == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier"]);
        }
        $formation->delete();
        return redirect()->back()->with(["message" => "Supression effectuée avec succès"]);
    }
    
    
    // Demande de consultations à voir par l'admin
    public function getListeDemandeConsultation(Request $request)
    {
        $page = 'demande-consultation';

        return view('Admin.Consultation.demandeConsultation', compact('page'));
    }

    // Liste des consultations effectuées
    public function getListeConsultationEffectuee()
    {

    //  if(isset($_GET["debut"]) && isset($_GET["fin"])){

    //         $debut = $_GET["debut"];
    //         $fin = $_GET["fin"];

    //         if($debut > $fin){
    //             return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
    //         }

    //         $consultations = Consultation::where("recu", true)
    //             ->where("result", false)
    //             ->where("created_at", ">=", $debut." 00:00:00")
    //             ->where("created_at", "<=", $fin." 23:59:59")
    //             ->orderBy("id", "desc")->get();

    //         return view("Admin.Consultation.consultationDo")
    //             ->with(["consultations" => $consultations])
    //             ->with(["debut" => $debut])
    //             ->with(["fin" => $fin])
    //             ->with(["page" => "consultation-effectuee"]);
    //     }else{
    //         $consultations = Consultation::where("recu", true)
    //             ->where("result", false)
    //             ->orderBy("id", "desc")->get();

    //         return view("Admin.Consultation.consultationDo")
    //             ->with(["consultations" => $consultations])
    //             ->with(["debut" => null])
    //             ->with(["fin" => null])
    //             ->with(["page" => "consultation-effectuee"]);
    //     }
        $page = 'consultation-effectuee';

        return view('Admin.Consultation.consultationDo', compact('page'));
    }

    // Résultats de consultations effectuées par les utilisateurs
    public function getListeResultatConsultation()
    {
        $page = 'consultation-resultat';

        return view('Admin.Consultation.resultatConsultation', compact('page'));
    }
    
    
        public function exportDemandeConsultation(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $consultations = Consultation::where("recu", false)
                    ->where("created_at", ">=", $debut." 00:00:00")
                    ->where("created_at", "<=", $fin." 23:59:59")
                    ->orderBy("id", "desc")->get();
            }else{
                $consultations = Consultation::where("recu", false)->orderBy("id", "desc")->get();
            }

        }else{
            $consultations = Consultation::where("recu", false)->orderBy("id", "desc")->get();
        }

        $data[]= [];
        foreach($consultations as $consultation) {
            $data[] = array(
                      date_format(date_create($consultation->created_at),"d M Y"),
                      \App\User::where("id", $consultation->user_id)->first()->codeUser,
                      \App\User::where("id", $consultation->user_id)->first()->username,
                      \App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle,
                      $consultation->description,
                      "Non défini",
                      "Attente",
                      \App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle,
            );
        }
        $headings = array("Date","Code User", "Consultant", 'Objet Consulation', 'Motif de la consultation', 'Résultat de la consultation','Status','Formation Sanitaire');

        $notifToken = new NotifToken();
        $notifToken->exportToExcel("Consultations attente", $data,$headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }
    
    
    
    public function exportConsultationEffectue(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $consultations = Consultation::where("recu", true)
                    ->where("result", false)
                    ->where("created_at", ">=", $debut." 00:00:00")
                    ->where("created_at", "<=", $fin." 23:59:59")
                    ->orderBy("id", "desc")->get();
            }else{
                $consultations = Consultation::where("recu", true)
                    ->where("result", false)
                    ->orderBy("id", "desc")->get();            }

        }else{
            $consultations = Consultation::where("recu", true)
                ->where("result", false)
                ->orderBy("id", "desc")->get();        }

        $data[]= [];
        foreach($consultations as $consultation) {
            $data[] = array(
                date_format(date_create($consultation->created_at),"d/m/Y"),
                \App\User::where("id", $consultation->user_id)->first()->codeUser,
                \App\User::where("id", $consultation->user_id)->first()->username,
                \App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle,
                $consultation->description,
                "Reçu",
                \App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle,
            );
        }
        $headings = array("Date","Code User", "Consultant", 'Objet Consulation', 'Motif de la consultation','Status','Formation Sanitaire');

        $notifToken = new NotifToken();
        $notifToken->exportToExcel("Consultations effectués", $data,$headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }
    
}
