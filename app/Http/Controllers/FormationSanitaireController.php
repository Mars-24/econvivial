<?php

namespace App\Http\Controllers;

use App\ObjetConsultation;
use App\User;
use App\Ville;
use App\NotifToken;
use App\Consultation;
use App\EntretienPair;
use App\TypeEntretien;
use App\ProduitIST;
use App\Syndrome;
use App\Choix;
use App\ChoixProduit;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\RapportConsultation;
use App\RapportFacturation;
use App\TypeActivite;
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
        $consultations = Consultation::where("formation_sanitaire_id",
		Auth::user()->formation_sanitaire_id)->where("recu", false)->orderBy("id", "desc")->get();
        return view("FormationSanitaire.dashboard")
                    ->with(["consultations" => $consultations])
                    ->with(["page" => "demande-consultation"]);
    }

    public function confirmReception(Request $request){

        $consultation = Consultation::where("id", $request["id"])->first();
        if($consultation){
            $consultation->recu = true;
            $consultation->user_repondeur = Auth::user()->id;
            $consultation->date_reponse = new DateTime();
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
        $produits = ProduitIST::All();
        $syndromes = Syndrome::All();

		$choixMedocs1 = DB::table('choixes')
        ->join('choix_produits', 'choixes.choix_produit_id', '=', 'choix_produits.id')
        ->join('syndromes', 'choixes.syndrome_id', '=', 'syndromes.id')
		->where("choixes.id", "=", 1)
		->where("choixes.syndrome_id", "=", 1)
        ->get();

		//dd($choixMedocs1);

        return view("FormationSanitaire.consultationDo")
            ->with(["consultations" => $consultations])
            ->with(["syndromes" => $syndromes])
            ->with(["produits" => $produits])
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

        $consultation = Consultation::where("id", $request["id"])->first();

        if($consultation){
            if($request["noOrdonnance"] == true)
			{
                $resultat = new ResultatConsultation();
                $resultat->natureTraitement = "Conseils pratiques";
                $resultat->traitement = "Aucun médicament associé au résultat";
                $resultat->consultation_id = $consultation->id;
                $resultat->save();
            }
			elseif($request["consultationIST"] == true)
			{
				//foreach ($request["medicament"]  as $medoc){
					$resultat = new ResultatConsultation();
                    $resultat->natureTraitement = "Consultation IST";
                    $resultat->choix = $request["choix"];
                    $resultat->syndrome = $request["syndrome"];

					$choix_produits = ChoixProduit::All();

					$choixes = Choix::All();

						foreach ($choixes as $choixe) {
							switch ($choixe->syndrome_id) {
								case 1:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 2:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 3:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 4:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;
							}
						}

                    $resultat->consultation_id = $consultation->id;
                    $resultat->save();
				 //}
            }
			elseif($request["contraception"] == true)
			{
					$resultat = new ResultatConsultation();
                    $resultat->natureTraitement = "Contraception";
                    $resultat->methode = $request["methode"];
                    $resultat->periode = $request["periode"];
                    $resultat->consultation_id = $consultation->id;
                    $resultat->save();
            }else
			{
					$resultat = new ResultatConsultation();
                    $resultat->natureTraitement = "Consultation IST + Contraception";
                    $resultat->choix = $request["choix"];
                    $resultat->syndrome = $request["syndrome"];


					$choix_produits = ChoixProduit::All();

					$choixes = Choix::All();

						foreach ($choixes as $choixe) {
							switch ($choixe->syndrome_id) {
								case 1:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 2:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 3:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;

								case 4:
									switch ($choixe->choix) {
										case 1:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
										case 2:
											$choix_produit = DB::table('choixes')
											->where("choix", "=", $request["choix"])
											->where("syndrome_id", "=", $request["syndrome"])
											->first();
											$resultat->choix_produit_id = $choix_produit->choix_produit_id;
										break;
									}
								break;
							}
						}

                    $resultat->methode = $request["methode"];
                    $resultat->periode = $request["periode"];
					$resultat->consultation_id = $consultation->id;
					 $resultat->save();
			}


					$consultation->result = 1;
                    $resultat->save();

            $user = User::where("id", $consultation->user_id)->first();
            $formationSainatire = FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first();

            if($user != null && $formationSainatire != null){
                $user->notify(new RepliedToThread("Résultat de consultation auprès de la formation
				sanitaire <<".$formationSainatire->libelle.">>",Auth::user()));
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

		$consultations = DB::table('resultat_consultations')
        ->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
        ->where("consultations.result", "=", 1)
		->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
		->orderBy("resultat_consultations.created_at", "desc")
        ->get();

		$ordonnances = ResultatConsultation::All();

		$produits = Choix::All();

		$syndromes = Syndrome::All();

		$choixProduits = ChoixProduit::All();

		$produitISTs = ProduitIST::All();

			return view("FormationSanitaire.resultat")
                    ->with(["consultations" => $consultations])
                    ->with(["ordonnances" => $ordonnances])
                    ->with(["produits" => $produits])
                    ->with(["syndromes" => $syndromes])
                    ->with(["choixProduits" => $choixProduits])
                    ->with(["produitISTs" => $produitISTs])
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
                      User::where("id", $consultation->user_id)->first()->codeUser,
                      User::where("id", $consultation->user_id)->first()->username,
                      ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle,
                      $consultation->description,
                      "Non défini",
                      "Attente",
                      FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle,
            );
        }
        $headings = array("Date","Code User", "Consultant", 'Objet Consulation', 'Motif de la consultation', 'Résultat de la consultation','Status','Formation Sanitaire');

        $notifToken = new NotifToken();

		$notifToken->exportToExcel("Consultations attente", $data,$headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }

    /**
     * Envoie de rapport d'activités
     */
    public function saveRapportConsultation(Request $request) {

        $date = new DateTime();

		$userID = Auth::user()->id;

		$resultatConsult = Consultation::where("id", $request["id"])->first();

		$rapports = RapportConsultation::all();

		$nbre = count($rapports) + 1;

		$debut = $request["debut"];
        $fin = $request["fin"];

		$codeRapport = $nbre . "/RP-CON-" . $date->format("d-M-y");

		$rapport = new RapportConsultation();
        $rapport->code = $codeRapport;
        $rapport->debut = $request["debut"];
        $rapport->fin = $request["fin"];
        $rapport->user_id = Auth::user()->id;
		$rapport->save();

         return redirect()->route("historique-rapport-consultation")->with(["message" => "Rapport enrégistrer avec succès"]);

	}

	/**
     * Envoie de rapport facturation
     */
    public function saveRapportFacturation(Request $request) {

        $date = new DateTime();

		$userID = Auth::user()->id;

		$resultatConsult = Consultation::where("id", $request["id"])->first();

		$rapports = RapportFacturation::all();

		$nbre = count($rapports) + 1;

		$debut = $request["debut"];
        $fin = $request["fin"];

		$codeRapport = $nbre . "/RP-FACTU-" . $date->format("d-M-y");

		$rapport = new RapportFacturation();
        $rapport->code = $codeRapport;
        $rapport->debut = $request["debut"];
        $rapport->fin = $request["fin"];
        $rapport->user_id = Auth::user()->id;
        $rapport->etat = 0;
		$rapport->save();

        return redirect()->route("historique-facturation-des-consultations")->with(["message" => "Rapport enrégistrer avec succès"]);

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
                ->orderBy("id", "desc")->get();
			}

        $data[]= [];
        foreach($consultations as $consultation) {
            $data[] = array(
                date_format(date_create($consultation->created_at),"d/m/Y"),
                User::where("id", $consultation->user_id)->first()->codeUser,
                User::where("id", $consultation->user_id)->first()->username,
                ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle,
                $consultation->description,
                "Reçu",
                FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle,
            );
        }
        $headings = array("Date","Code User", "Consultant", 'Objet Consulation', 'Motif de la consultation','Status','Formation Sanitaire');

        $notifToken = new NotifToken();
        $notifToken->exportToExcel("Consultations effectués", $data,$headings);

        return redirect()->with(["message" => "Fichier exporté"]);
    }


	public function generateRapportConsultation() {
        $id = Auth::user()->id;
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

			$consultations = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "!=", null)
			->where("consultations.result", true)
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->groupBy("resultat_consultations.consultation_id")
			->orderBy("resultat_consultations.id", "desc")
			->get();

			 $syndromes = Syndrome::All();

            return view("FormationSanitaire.generer-rapport")
                            ->with(["consultations" => $consultations])
                            ->with(["syndromes" => $syndromes])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rapport"]);
        } else {
            $debut = null;
            $fin = null;

            $consultations = Consultation::where("result", 1)
			->whereBetween("date_reponse", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->orderBy("id", "desc")
			->get();

            return view("FormationSanitaire.generer-rapport")
                            ->with(["consultations" => $consultations])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rapport"]);
        }
    }

	/**
     * Envoie de rapport d'activités
     */


	public function getHistoriqueRapportConsultation(){

        $rapports = RapportConsultation::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

		$syndromes = Syndrome::All();

        return view("FormationSanitaire.historique-rapport-consultation")
                        ->with(["rapports" => $rapports])
                        ->with(["syndromes" => $syndromes])
                        ->with(["page" => "historique-rapport-consultation"]);
    }


	public function getHistoriqueRapportConsultationAdmin(){
		$users = User::All();

		$formations = FormationSanitaire::All();

        $rapports = RapportConsultation::orderBy("id", "desc")->get();
        return view("Admin.Consultation.liste-rapport-consultation")
                        ->with(["rapports" => $rapports])
                        ->with(["users" => $users])
                        ->with(["formations" => $formations])
                        ->with(["page" => "liste-rapport-consultation"]);
    }

	public function getDetailRapportConsultation() {

        $id = Auth::user()->id;
        if (isset($_GET)) {
            $idRapport = $_GET["id"];

		$rapportUser = RapportConsultation::where("id", $idRapport)->first();

        if ($rapportUser != null) {

                $debut = $rapportUser->debut;
                $fin = $rapportUser->fin;

		$consultations = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "!=", null)
			->where("consultations.result", true)
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->groupBy("resultat_consultations.consultation_id")
			->orderBy("resultat_consultations.id", "desc")
			->get();


		$ordonnances = ResultatConsultation::All();

		$produits = Choix::All();

		$syndromes = Syndrome::All();

		$choixProduits = ChoixProduit::All();

		$produitISTs = ProduitIST::All();

		return view("FormationSanitaire.detail-rapport-consultation")
                    ->with(["consultations" => $consultations])
                    ->with(["ordonnances" => $ordonnances])
                    ->with(["produits" => $produits])
                    ->with(["syndromes" => $syndromes])
                    ->with(["rapportUser" => $rapportUser])
                    ->with(["choixProduits" => $choixProduits])
                    ->with(["produitISTs" => $produitISTs])
					->with(["debut" => $debut])
					->with(["fin" => $fin])
					->with(["userID" => $id])
                    ->with(["page" => "detail-rapport-consultation"]);
			}
		}
	}

	public function getDetailRapportConsultationAdmin() {

        $id = Auth::user()->id;
        if (isset($_GET)) {
            $idRapport = $_GET["id"];

		$rapportUser = RapportConsultation::where("id", $idRapport)->first();

        if ($rapportUser != null) {

                $debut = $rapportUser->debut;
                $fin = $rapportUser->fin;

		$consultations = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "!=", null)
			->where("consultations.result", true)
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->groupBy("resultat_consultations.consultation_id")
			->orderBy("resultat_consultations.id", "desc")
			->get();


		$ordonnances = ResultatConsultation::All();

		$produits = Choix::All();

		$syndromes = Syndrome::All();

		$choixProduits = ChoixProduit::All();

		$produitISTs = ProduitIST::All();

		$users = User::All();

		$formations = FormationSanitaire::All();

		return view("Admin.Consultation.detail-rapport-consultation")
                    ->with(["consultations" => $consultations])
                    ->with(["ordonnances" => $ordonnances])
                    ->with(["produits" => $produits])
                    ->with(["users" => $users])
                    ->with(["formations" => $formations])
                    ->with(["syndromes" => $syndromes])
                    ->with(["rapportUser" => $rapportUser])
                    ->with(["choixProduits" => $choixProduits])
                    ->with(["produitISTs" => $produitISTs])
					->with(["debut" => $debut])
					->with(["fin" => $fin])
					->with(["userID" => $id])
                    ->with(["page" => "detail-rapport-consultation"]);
			}
		}
	}

	public function getFacturationFormationSanitaire() {
        $id = Auth::user()->id;
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $consultations = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->groupBy("resultat_consultations.natureTraitement")
			->orderBy("consultations.id", "desc")
			->get();

			$nbrePersoIST1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			//->whereBetween('resultat_consultations.syndrome', [1, 3])
			->where('resultat_consultations.syndrome', "=", 1)
			->count();

			$nbrePersoIST2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 2)
			->count();

			$nbrePersoIST3 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 3)
			->count();

			$nbrePersoISTCH1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 1)
			->count();

			$nbrePersoISTCH2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 2)
			->count();

			$nbrePersoContrap = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "=", "Contraception")
			->count();

            return view("FormationSanitaire.facturation-consultation")
                    ->with(["consultations" => $consultations])
                    ->with(["nbrePersoIST1" => $nbrePersoIST1])
                    ->with(["nbrePersoIST2" => $nbrePersoIST2])
                    ->with(["nbrePersoIST3" => $nbrePersoIST3])
                    ->with(["nbrePersoISTCH1" => $nbrePersoISTCH1])
                    ->with(["nbrePersoISTCH2" => $nbrePersoISTCH2])
                    ->with(["nbrePersoContrap" => $nbrePersoContrap])
					->with(["debut" => $debut])
                    ->with(["fin" => $fin])
                    ->with(["userID" => $id])
                    ->with(["page" => "facturation-consultation"]);
        } else {
            $debut = null;
            $fin = null;

            $consultations = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->whereBetween("consultations.date_reponse", [$debut." 00:00:00", $fin.' 23:59:59'])
			->groupBy("resultat_consultations.natureTraitement")
			->orderBy("consultations.id", "desc")
			->get();

			$nbrePersoIST1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			//->whereBetween('resultat_consultations.syndrome', [1, 3])
			->where('resultat_consultations.syndrome', "=", 1)
			->count();

			$nbrePersoIST2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->where('resultat_consultations.syndrome', "=", 2)
			->count();

			$nbrePersoIST3 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->where('resultat_consultations.syndrome', "=", 3)
			->count();

			$nbrePersoISTCH1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 1)
			->count();

			$nbrePersoISTCH2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 2)
			->count();

			$nbrePersoContrap = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Contraception")
			->count();

			return view("FormationSanitaire.facturation-consultation")
                    ->with(["consultations" => $consultations])
                    ->with(["nbrePersoIST1" => $nbrePersoIST1])
                    ->with(["nbrePersoIST2" => $nbrePersoIST2])
                    ->with(["nbrePersoIST3" => $nbrePersoIST3])
                    ->with(["nbrePersoISTCH1" => $nbrePersoISTCH1])
                    ->with(["nbrePersoISTCH2" => $nbrePersoISTCH2])
                    ->with(["nbrePersoContrap" => $nbrePersoContrap])
					->with(["debut" => null])
                    ->with(["fin" => null])
                    ->with(["userID" => $id])
                    ->with(["page" => "facturation-consultation"]);

		}
	}

	public function getHistoriqueFacturationFormationSanitaire() {

		$rapports = RapportFacturation::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        return view("FormationSanitaire.historique-facturation-consultation")
						->with(["rapports" => $rapports])
                        ->with(["page" => "historique-facturation-consultation"]);
    }

	public function getHistoriqueFacturationFormationSanitaireAdmin() {

		$rapports = RapportFacturation::orderBy("id", "desc")->get();

		$users = User::All();

		$formations = FormationSanitaire::All();

        return view("Admin.Consultation.liste-rapport-facturation")
						->with(["rapports" => $rapports])
						->with(["users" => $users])
						->with(["formations" => $formations])
                        ->with(["page" => "liste-rapport-facturation"]);
    }

	public function getPayerFacture(){

		$rapports = RapportFacturation::where("id", $request["id"])->first();

		if($rapports == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de payer cette facture."]);
        }

        $rapport->etat = 1;
		$rapport->save();

        return redirect()->back()->with(["message" => "Cette facture est marquée comme payer avec succès"]);
    }

	public function getDetailRapportFacturation() {
        $id = Auth::user()->id;
        if (isset($_GET)) {
            $idRapport = $_GET["id"];

		$rapportUser = RapportFacturation::where("id", $idRapport)->first();

        if ($rapportUser != null) {

                $debut = $rapportUser->debut;
                $fin = $rapportUser->fin;


			$nbrePersoIST1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 1)
			->count();

			$nbrePersoIST2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 2)
			->count();

			$nbrePersoIST3 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 3)
			->count();

			$nbrePersoISTCH1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 1)
			->count();

			$nbrePersoISTCH2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 2)
			->count();

			$nbrePersoContrap = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "=", "Contraception")
			->count();

            return view("FormationSanitaire.detail-rapport-facturation")
                    ->with(["nbrePersoIST1" => $nbrePersoIST1])
                    ->with(["nbrePersoIST2" => $nbrePersoIST2])
                    ->with(["nbrePersoIST3" => $nbrePersoIST3])
                    ->with(["nbrePersoISTCH1" => $nbrePersoISTCH1])
                    ->with(["nbrePersoISTCH2" => $nbrePersoISTCH2])
                    ->with(["nbrePersoContrap" => $nbrePersoContrap])
                    ->with(["rapportUser" => $rapportUser])
					->with(["debut" => $debut])
                    ->with(["fin" => $fin])
                    ->with(["userID" => $id])
                    ->with(["page" => "detail-rapport-facturation"]);
			}
		}
	}

	public function getDetailRapportFacturationAdmin() {
        $id = Auth::user()->id;
        if (isset($_GET)) {
            $idRapport = $_GET["id"];

		$rapportUser = RapportFacturation::where("id", $idRapport)->first();

        if ($rapportUser != null) {

                $debut = $rapportUser->debut;
                $fin = $rapportUser->fin;


			$nbrePersoIST1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 1)
			->count();

			$nbrePersoIST2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 2)
			->count();

			$nbrePersoIST3 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', "=", 3)
			->count();

			$nbrePersoISTCH1 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 1)
			->count();

			$nbrePersoISTCH2 = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->where("resultat_consultations.natureTraitement", "=", "Consultation IST")
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where('resultat_consultations.syndrome', '=', 4)
			->where('resultat_consultations.choix', '=', 2)
			->count();

			$nbrePersoContrap = DB::table('resultat_consultations')
			->join('consultations', 'resultat_consultations.consultation_id', '=', 'consultations.id')
			//->where("consultations.formation_sanitaire_id", Auth::user()->formation_sanitaire_id)
			->whereBetween("resultat_consultations.created_at", [$debut." 00:00:00", $fin.' 23:59:59'])
			->where("resultat_consultations.natureTraitement", "=", "Contraception")
			->count();

			$users = User::All();

		$formations = FormationSanitaire::All();

            return view("Admin.Consultation.detail-rapport-facturation-admin")
                    ->with(["nbrePersoIST1" => $nbrePersoIST1])
                    ->with(["nbrePersoIST2" => $nbrePersoIST2])
                    ->with(["nbrePersoIST3" => $nbrePersoIST3])
                    ->with(["nbrePersoISTCH1" => $nbrePersoISTCH1])
                    ->with(["nbrePersoISTCH2" => $nbrePersoISTCH2])
                    ->with(["nbrePersoContrap" => $nbrePersoContrap])
                    ->with(["rapportUser" => $rapportUser])
                    ->with(["users" => $users])
                    ->with(["formations" => $formations])
					->with(["debut" => $debut])
                    ->with(["fin" => $fin])
                    ->with(["userID" => $id])
                    ->with(["page" => "detail-rapport-facturation-admin"]);
			}
		}
	}

}
