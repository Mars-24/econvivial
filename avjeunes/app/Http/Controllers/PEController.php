<?php

namespace App\Http\Controllers;

use App\Imports\EntretienDetails;
use Illuminate\Support\Facades\Storage;
use App\EntretienParticipant;
use App\Imports\EntretienPairImport;
use App\ContenuEntretien;
use App\Ecole;
use App\Entretien;
use App\EntretienPair;
use App\PairEducateur;
use App\RapportPE;
use App\RapportUserPe;
use App\Region;
use App\TypeActivite;
use App\TypeEntretien;
use App\TypeUser;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PEController extends Controller {

    public function index()
    {
        $themes = TypeEntretien::orderBy("libelle", "asc")->get();
        $types = TypeActivite::get();

        return view("PaireEducateur.PE.dashboard")
                        ->with(["types" => $types])
                        ->with(["themes" => $themes])
                        ->with(["page" => "new-entretien"]);
    }

    public function getContenuByType(Request $request) {

        $type = TypeEntretien::where("id", $request["id"])->first();
        if ($type != null) {
            $contenus = ContenuEntretien::where("type_entretien_id", $type->id)->get();
            return $contenus;
        }
        return null;
    }

    /**
     * Inscrire un élève
     */
    public function getUtilisateurForm() {

        $ecole = Auth::user()->paireducateur->ecole;
        $region = Auth::user()->paireducateur->region;
        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc limit 5");

        return view("PaireEducateur.PE.inscription")
                        ->with(["region" => $region])
                        ->with(["ecole" => $ecole])
                        ->with(["page" => "new-utilisateur"])
                        ->with(["users" => $users]);
    }

    /**
     * Save compte étudiant / élève
     */
    public function saveCompteUtilisateur(Request $request) {

        $this->validate($request, [
            "nom" => "required",
            "prenom" => "required",
            "region" => "required",
            "numero" => "required | unique:users",
            "ecole" => "required",
        ]);

        //Recupération de l'école
        $ecole = Ecole::where("id", $request["ecole"])->first();

        if ($ecole)
            $typeUser = TypeUser::where("libelle", $ecole->apprenant)->first();

        if ($request["password"] != $request['confirmation']) {
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }

        $users = User::all();
        $number = count($users) + 1;
        $formatEmail = "user" . $number . "@e-centreconvivial.org";

        try {

            /**
             * Enrégistrement du paire educateur
             */
            $pairEducateur = new PairEducateur();
            $pairEducateur->nom = $request["nom"];
            $pairEducateur->prenom = $request["prenom"];
            $pairEducateur->ecole_id = $request["ecole"];
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->age = $request["age"];
            $pairEducateur->save();

            $ecole = Ecole::where("id", $request["ecole"])->first();

            /**
             * Enrégistrement des informations utilisateurs
             */
            $user = new User();
            $user->username = $request["prenom"];
            $user->numero = $request["numero"];
            $user->sexe = $request["sexe"];
            $user->email = $formatEmail;
            $user->password = $request["password"];
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->valider = true;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            $dateNaiss = new Carbon($user->datenaissance);
            $pairNom = $pairEducateur->nom;
            $pairPrenom = $pairEducateur->prenom;
            $userInitial = $number . "-" . $pairNom[0] . $pairPrenom[0] . $request["age"] . $request["sexe"] . "-" . $ecole->code . "-" . date("y");

            $pairEducateur->code = $userInitial;
            $pairEducateur->save();

            return redirect()->back()->with(["message" => "Compte de l'utilisateur crée avec succès"]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer l'utilisateur"]);
        }
    }

    /**
     * @return mixed
     * Modifier un utilisateur
     */
    public function postEditCompteUtilisateur(Request $request) {


        $this->validate($request, [
            "nom" => "required",
            "prenom" => "required",
        ]);

        //Recupération de l'école
        $ecole = Auth::user()->paireducateur->ecole;

        if ($ecole)
            $typeUser = TypeUser::where("libelle", $ecole->apprenant)->first();

        if ($request["password"] != $request['confirmation']) {
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }


        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["erreur" => "Impossible de modifier"]);
        }

        $pairEducateur = $user->paireducateur;

        if ($pairEducateur == null) {
            return redirect()->back()->with(["erreur" => "Impossible de modifier"]);
        }

        $users = DB::select("select count(*) as nbre from users where id <= " . $user->id);
        $number = 0;
        foreach ($users as $use) {
            $number = $use->nbre;
        }

        try {

            /**
             * Modification du paire educateur
             */
            $pairEducateur->nom = $request["nom"];
            $pairEducateur->prenom = $request["prenom"];
            $pairEducateur->age = $request["age"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */
            $user->username = $request["prenom"];
            $user->numero = $request["numero"];
            $user->sexe = $request["sexe"];
            $user->valider = true;
            $user->save();

            $pairNom = $pairEducateur->nom;
            $pairPrenom = $pairEducateur->prenom;
            $userInitial = $number . "-" . $pairNom[0] . $pairPrenom[0] . $request["age"] . $request["sexe"] . "-" . $ecole->code . "-" . date("y");

            $pairEducateur->code = $userInitial;
            $pairEducateur->save();

            return redirect()->back()->with(["message" => "Compte de l'utilisateur modifié avec succès"]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier l'utilisateur"]);
        }
    }

    public function deleteCompteUser(Request $request) {

        $user = User::where("id", $request["id"])->first();
        if ($user != null) {
            try {
                $user->delete();
                return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
            } catch (Exception $e) {
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer l'utilisateur"]);
            }
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer l'utilisateur"]);
    }

    public function getListeUtilisateur() {
        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc");

        return view("PaireEducateur.PE.listeUtilisateur")
                        ->with(["ecole" => $ecole])
                        ->with(["page" => "liste-utilisateur"])
                        ->with(["users" => $users]);
    }

    /**
     * Get user information by code
     */
    public function getUserInfoByCode(Request $request)
    {
        $pairEducateur = PairEducateur::where('code', $request->code)->first();
        
        if ($pairEducateur != null) {
            return $pairEducateur;
        }
        
        return false;
    }

    /**
     * Enrégistrer un entretien
     */
    public function postSaveEntretien(Request $request) {

        $this->validate($request, [
            "difficulte" => "required",
            "code" => "required",
            "contenu" => "required"
        ]);

        $contenu = ContenuEntretien::where("id", $request["contenu"])->first();

        $user = PairEducateur::where("code", $request["code"])->first();

        if ($contenu != null && $user != null) {

            $entretien = new Entretien();
            $entretien->difficulte = $request["difficulte"];
            $entretien->statut = $request["statut"];
            $entretien->contenu_entretien_id = $contenu->id;
            $entretien->user_id = $user->id;
            $entretien->pair_educateur_id = Auth::user()->paireducateur->id;
            $entretien->save();

            return redirect()->route("liste-entretien-attente-validation-pe")->with(["message" => "Entretien sauvegardé avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible d'enrégistrer l'entretien. Veuillez bien vérifier les données saisis"])->withInput();
    }

    public function getHistoriqueEntretien() {

        $entretiens = Entretien::where("pair_educateur_id", Auth::user()->paireducateur->id)
                ->where("supValidation", false)
                ->orderBy("id", "desc")
                ->get();
        return view("PaireEducateur.PE.histoEntretien")
                        ->with(["page" => "entretien-attente"])
                        ->with(["entretiens" => $entretiens]);
    }

    public function getHistoriqueEntretienValide() {
        $entretiens = Entretien::where("pair_educateur_id", Auth::user()->paireducateur->id)
                ->where("supValidation", true)
                ->orderBy("id", "desc")
                ->get();
        return view("PaireEducateur.PE.histoEntretienValide")
                        ->with(["page" => "entretien-valider"])
                        ->with(["entretiens" => $entretiens]);
    }

    public function getInscriptionAttente() {

        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and u.valider = false
                       and u.rejeter = false
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc");

        return view("PaireEducateur.PE.valideInscription")
                        ->with(["ecole" => $ecole])
                        ->with(["page" => "valide-inscription"])
                        ->with(["users" => $users]);
    }

    public function getInscriptionValider() {

        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and u.valider = true
                       and u.rejeter = false
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc");

        return view("PaireEducateur.PE.inscriptionValide")
                        ->with(["ecole" => $ecole])
                        ->with(["page" => "inscription-valider"])
                        ->with(["users" => $users]);
    }

    public function getInscriptionRejeter() {

        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and u.valider = false
                       and u.rejeter = true
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc");

        return view("PaireEducateur.PE.inscriptionRejeter")
                        ->with(["ecole" => $ecole])
                        ->with(["page" => "inscription-rejeter"])
                        ->with(["users" => $users]);
    }

    /**
     * Valider une inscription
     */
    public function postValiderUserInscription(Request $request) {

        $user = User::where("id", $request["id"])->first();
        if ($user != null) {
            $user->valider = true;
            $user->save();
            return redirect()->route("liste-inscription-user-pe-valider")->with(["message" => "Inscription validée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Inpossible de valider l'inscription. Veuillez réessayer"]);
    }

    public function postRejeterUserInscription(Request $request) {
        $user = User::where("id", $request["id"])->first();
        if ($user != null) {
            $user->rejeter = true;
            $user->motifRejet = $request["motif"];
            $user->save();
            return redirect()->route("liste-inscription-user-pe-rejeter")->with(["message" => "Inscription rejetée"]);
        }
        return redirect()->back()->with(["error" => "Inpossible de rejeter l'inscription. Veuillez réessayer"]);
    }

    /**
     * Pair educateur Espace membre
     */
    public function getPeUnivEspaceMembre() {

        $ecole = Auth::user()->paireducateur->ecole;
        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = " . $ecole->id . "  ) order by id desc limit 5");

        $themes = TypeEntretien::orderBy("libelle", "asc")->get();
        $types = TypeActivite::get();

        $entretiens = EntretienPair::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        return view("PeUniversitaire.index")
                        ->with(["types" => $types])
                        ->with(["themes" => $themes])
                        ->with(["entretiens" => $entretiens])
                        ->with(["users" => $users])
                        ->with(["page" => "new-entretien"]);
    }

    /**
     * Génération de rapport d'activités peUniversitaire
     */
    public function generateRapportPage() {
        $id = Auth::user()->id;
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $entretiens = EntretienPair::where("user_id", Auth::user()->id)
                            ->orderBy("id", "desc")->get();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();

            $entretienPair = new EntretienPair();

            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PeUniversitaire.rapport")
                            ->with(["themes" => $themes])
                            ->with(["entretiens" => $entretiens])
                            ->with(["pair" => $entretienPair])
                            ->with(["types" => $typeActivity])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rap"]);
        } else {
            $debut = null;
            $fin = null;

            $entretiens = EntretienPair::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();

            $entretienPair = new EntretienPair();

            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();


            return view("PeUniversitaire.rapport")
                            ->with(["themes" => $themes])
                            ->with(["entretiens" => $entretiens])
                            ->with(["pair" => $entretienPair])
                            ->with(["types" => $typeActivity])
                            ->with(["debut" => null])
                            ->with(["fin" => null])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rapport"]);
        }
    }

    /**
     * Envoie de rapport d'activités
     */
    public function generateRapport(Request $request) {

        $date = new \DateTime();

        $userID = Auth::user()->id;

        //Nbre total de rapport;
        $rapports = RapportPE::all();

        $nbre = count($rapports) + 1;

        $debut = $request["debut"];
        $fin = $request["fin"];

        $codeRapport = $nbre . "/RP-PE-" . $date->format("d-M-y");

        $rapport = new RapportPE();
        $rapport->code = $codeRapport;
        $rapport->debut = $request["debut"];
        $rapport->fin = $request["fin"];
        $rapport->user_id = Auth::user()->id;

        $rapport->save();

        //Insertion du rapport dans la table

        $themes = TypeEntretien::orderBy("libelle", "asc")->get();
        $pair = new EntretienPair();
        $types = TypeActivite::orderBy("libelle", "desc")->get();

        $rapportUserPe = new RapportUserPe();
        $rapportUserPe->codeRapport = $codeRapport;
        $rapportUserPe->codePE = Auth::user()->paireducateur->code;
        $rapportUserPe->debut = $debut;
        $rapportUserPe->fin = $fin;

        foreach ($types as $type) {
            if ($type->libelle == "Individuel") {
                $rapportUserPe->individuel = $pair->getStatisticByTypeActivite("Ancien", "M", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Ancien", "F", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Nouveau", "M", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Nouveau", "F", $type->id, $debut, $fin, $userID);
            }

            if ($type->libelle == "Causerie / Groupe de parole") {
                $rapportUserPe->causerie = $pair->getStatisticByTypeActivite("Ancien", "M", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Ancien", "F", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Nouveau", "M", $type->id, $debut, $fin, $userID) +
                        $pair->getStatisticByTypeActivite("Nouveau", "F", $type->id, $debut, $fin, $userID);
            }
        }

        foreach ($themes as $theme) {
            switch ($theme->code) {
                case "AS":
                    $rapportUserPe->ABS = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "CDV":
                    $rapportUserPe->CDV = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "GP":
                    $rapportUserPe->GP = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "HS":
                    $rapportUserPe->HS = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "CM":
                    $rapportUserPe->CM = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "PLF":
                    $rapportUserPe->PLF = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "PM":
                    $rapportUserPe->PM = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "PF":
                    $rapportUserPe->PF = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;

                case "AUTRE":
                    $rapportUserPe->AUTRE = $this->getCountByTheme($pair, $theme->id, $debut, $fin, $userID);
                    break;
            }
        }

        $rapportUserPe->condomMasculin = $pair->getStatisticByCondom("Ancien", "M", "condomMasculin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Ancien", "F", "condomMasculin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Nouveau", "M", "condomMasculin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Nouveau", "F", "condomMasculin", $debut, $fin, $userID);

        $rapportUserPe->condomFeminin = $pair->getStatisticByCondom("Ancien", "M", "condomFeminin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Ancien", "F", "condomFeminin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Nouveau", "M", "condomFeminin", $debut, $fin, $userID) +
                $pair->getStatisticByCondom("Nouveau", "F", "condomFeminin", $debut, $fin, $userID);

        $rapportUserPe->ouiRefere = $pair->getStatisticByRefere("Ancien", "M", "OUI", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Ancien", "F", "OUI", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Nouveau", "M", "OUI", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Nouveau", "F", "OUI", $debut, $fin, $userID);

        $rapportUserPe->nonRefere = $pair->getStatisticByRefere("Ancien", "M", "NON", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Ancien", "F", "NON", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Nouveau", "M", "NON", $debut, $fin, $userID) +
                $pair->getStatisticByRefere("Nouveau", "F", "NON", $debut, $fin, $userID);

        $rapportUserPe->user_id = $userID;
        $rapportUserPe->destinataire = \App\User::where("id", \App\AffectationPE::where("educateur_id", $userID)->first()->affectant_id)->first()->id;
        $rapportUserPe->save();

        if (Auth::user()->typeuser->libelle == "PE Univ")
            return redirect()->route("historique-rapport-pair-educateur-universitaire")->with(["message" => "Rapport  du " . $request["debut"] . " au " . $request["fin"] . " généré avec succès"]);
        else
            return redirect()->route("historique-rapport-superviseur-educateur-ecole")->with(["message" => "Rapport  du " . $request["debut"] . " au " . $request["fin"] . " généré avec succès"]);
    }

    public function getCountByTheme($pair, $themeID, $debut, $fin, $userID) {
        return $pair->getStatisticByTheme("Ancien", "M", $themeID, $debut, $fin, $userID) +
                $pair->getStatisticByTheme("Ancien", "F", $themeID, $debut, $fin, $userID) +
                $pair->getStatisticByTheme("Nouveau", "M", $themeID, $debut, $fin, $userID) +
                $pair->getStatisticByTheme("Nouveau", "F", $themeID, $debut, $fin, $userID);
    }

    /**
     * Historique des rapports envoyés
     */
    public function getHistoriqueRapportEnvoye() {

        //  $rapports = RapportPE::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        $rapports = RapportUserPe::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        $entretienPair = new EntretienPair();
        $themes = TypeEntretien::orderBy("libelle", "asc")->get();
        $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

        return view("PeUniversitaire.historique")
                        ->with(["rapports" => $rapports])
                        ->with(["pair" => $entretienPair])
                        ->with(["themes" => $themes])
                        ->with(["types" => $typeActivity])
                        ->with(["page" => "historique-rapport"]);
    }

    /**
     * Génération de rapport d'activités superViseur Scolaire
     */
    public function generateRapportPageSupScolaire() {
        $id = Auth::user()->id;
        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];
            $entretiens = EntretienPair::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $entretienPair = new EntretienPair();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.Superviseur.rapport")
                            ->with(["themes" => $themes])
                            ->with(["entretiens" => $entretiens])
                            ->with(["pair" => $entretienPair])
                            ->with(["types" => $typeActivity])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rapport"]);
        } else {
            $debut = null;
            $fin = null;

            $entretiens = EntretienPair::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $entretienPair = new EntretienPair();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.Superviseur.rapport")
                            ->with(["themes" => $themes])
                            ->with(["entretiens" => $entretiens])
                            ->with(["pair" => $entretienPair])
                            ->with(["types" => $typeActivity])
                            ->with(["debut" => null])
                            ->with(["fin" => null])
                            ->with(["userID" => $id])
                            ->with(["page" => "generer-rapport"]);
        }
    }

    /**
     * Historique des rapports envoyés par le superviseur école
     */
    public function getHistoriqueRapportEnvoyeSupEcole() {
        // $rapports = RapportPE::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        $rapports = RapportUserPe::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        $entretienPair = new EntretienPair();
        $themes = TypeEntretien::orderBy("libelle", "asc")->get();
        $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

        return view("PaireEducateur.Superviseur.historique")
                        ->with(["rapports" => $rapports])
                        ->with(["pair" => $entretienPair])
                        ->with(["themes" => $themes])
                        ->with(["types" => $typeActivity])
                        ->with(["page" => "historique-rapport"]);
    }

    public function getDetailRapportSupEcole() {

        $id = Auth::user()->id;
        if (isset($_GET)) {
            $idRapport = $_GET["id"];
            $typeUser = $_GET["type"];

            $rapportUserPe = RapportUserPe::where("id", $idRapport)->first();

            //  return json_encode($rapportUserPe);

            if ($rapportUserPe != null) {

                $debut = $rapportUserPe->debut;
                $fin = $rapportUserPe->fin;

                $themes = TypeEntretien::orderBy("libelle", "asc")->get();

                $entretienPair = new EntretienPair();

                $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

                switch ($typeUser) {

                    case "Sup":
                        return view("PaireEducateur.Superviseur.detailRapport")
                                        ->with(["themes" => $themes])
                                        ->with(["pair" => $entretienPair])
                                        ->with(["types" => $typeActivity])
                                        ->with(["debut" => $debut])
                                        ->with(["fin" => $fin])
                                        ->with(["userID" => $id])
                                        ->with(["page" => "historique-rapport"]);
                        break;

                    case "Pe Univ":
                        return view("PeUniversitaire.detailRapport")
                                        ->with(["themes" => $themes])
                                        ->with(["pair" => $entretienPair])
                                        ->with(["types" => $typeActivity])
                                        ->with(["debut" => $debut])
                                        ->with(["fin" => $fin])
                                        ->with(["userID" => $id])
                                        ->with(["page" => "historique-rapport"]);
                        break;

                    case "Sup Univ":
                        return view("PaireEducateur.SupUniversitaire.detailRapport")
                                        ->with(["themes" => $themes])
                                        ->with(["pair" => $entretienPair])
                                        ->with(["types" => $typeActivity])
                                        ->with(["debut" => $debut])
                                        ->with(["fin" => $fin])
                                        ->with(["userID" => $id])
                                        ->with(["page" => "historique-rapport"]);
                        break;
                }
            }
        }
    }

    /**
     * Espace membre du superviseur Universitaire
     */
    public function getSupUniversitaireEspaceMembre() {
        //$paireEducateurs = DB::select("select * from users where id in (select educateur_id from affectation_p_es where affectant_id = ".Auth::user()->id.")");

        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id . " and created_at between '" . $debut . " 00:00:00' and '" . $fin . " 23:59:59'");

            // $rapports = DB::select("select * from rapport_p_es where user_id in (select educateur_id from affectation_p_es where affectant_id = ".Auth::user()->id.")");

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;

            $entretienPair = new EntretienPair();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();

            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.SupUniversitaire.index")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["page" => "rapport"]);
        } else {

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id);

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;
            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.SupUniversitaire.index")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["debut" => null])
                            ->with(["fin" => null])
                            ->with(["page" => "rapport"]);
        }
    }

    //Générer le rapport du superviseur

    public function generateSupRapport(Request $request) {

        $date = new \DateTime();

        $userID = Auth::user()->id;

        //Nbre total de rapport;
        $rapports = RapportPE::all();

        $nbre = count($rapports) + 1;

        $debut = $request["debut"];
        $fin = $request["fin"];

        $codeRapport = $nbre . "/RP-SUP-" . $date->format("d-M-y");

        $rapport = new RapportPE();
        $rapport->code = $codeRapport;
        $rapport->debut = $request["debut"];
        $rapport->fin = $request["fin"];
        $rapport->user_id = Auth::user()->id;

        $rapport->save();

        //Insertion du rapport dans la table

        $preRapport = DB::select("select SUM(individuel) as individuel, SUM(causerie) as causerie, SUM(ABS) as ABS, SUM(CDV) as CDV,SUM(GP) as GP, 
                                    SUM(HS) as HS,SUM(IST) as IST,SUM(CM) as CM,SUM(PLF) as PLF,SUM(PM) as PM,SUM(PF) as PF,
                                    SUM(AUTRE) as AUTRE,SUM(condomMasculin) as condomMasculin,SUM(condomFeminin) as condomFeminin,
                                    SUM(ouiRefere) as ouiRefere,SUM(nonRefere) as nonRefere from rapport_user_pes where destinataire = " . $userID . " and  created_at 
                                    between '" . $debut . " 00:00:00' and '" . $fin . " 23:59:59'");

        foreach ($preRapport as $rapportPe) {

            $rapportUserPe = new RapportUserPe();
            $rapportUserPe->codeRapport = $codeRapport;
            $rapportUserPe->codePE = Auth::user()->paireducateur->code;
            $rapportUserPe->debut = $debut;
            $rapportUserPe->fin = $fin;

            $rapportUserPe->individuel = $rapportPe->individuel;
            $rapportUserPe->causerie = $rapportPe->causerie;
            $rapportUserPe->ABS = $rapportPe->ABS;
            $rapportUserPe->CDV = $rapportPe->CDV;
            $rapportUserPe->GP = $rapportPe->GP;
            $rapportUserPe->HS = $rapportPe->HS;
            $rapportUserPe->CM = $rapportPe->CM;
            $rapportUserPe->PLF = $rapportPe->PLF;
            $rapportUserPe->PM = $rapportPe->PM;
            $rapportUserPe->PF = $rapportPe->PF;
            $rapportUserPe->AUTRE = $rapportPe->AUTRE;

            $rapportUserPe->condomMasculin = $rapportPe->condomMasculin;
            $rapportUserPe->condomFeminin = $rapportPe->condomFeminin;
            $rapportUserPe->ouiRefere = $rapportPe->ouiRefere;
            $rapportUserPe->nonRefere = $rapportPe->nonRefere;

            $rapportUserPe->user_id = $userID;
            $rapportUserPe->destinataire = \App\User::where("id", \App\AffectationPE::where("educateur_id", $userID)->first()->affectant_id)->first()->id;
            $rapportUserPe->save();
        }

        if (Auth::user()->typeuser->libelle == "Sup Univ")
            return redirect()->route("historique-rapport-travail")->with(["message" => "Rapport  du " . $request["debut"] . " au " . $request["fin"] . " généré avec succès"]);
        else if (Auth::user()->typeuser->libelle == "admin ong")
            return redirect()->route("historique-rapport-travail")->with(["message" => "Rapport  du " . $request["debut"] . " au " . $request["fin"] . " généré avec succès"]);
    }

    public function getHistoriqueRapportSup() {

        if (Auth::user()->typeuser->libelle == "Sup Univ") {
            $rapports = RapportUserPe::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.SupUniversitaire.histoRapport")
                            ->with(["rapports" => $rapports])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["page" => "historique-rapport-sup"]);
        } else if (Auth::user()->typeuser->libelle == "admin ong") {
            $rapports = RapportUserPe::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminOng.histoRapport")
                            ->with(["rapports" => $rapports])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["page" => "historique-rapport"]);
        } else if (Auth::user()->typeuser->libelle == "admin regionaux") {
            $rapports = RapportUserPe::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminRegionaux.histoRapport")
                            ->with(["rapports" => $rapports])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["page" => "historique-rapport"]);
        }
    }

    public function detailMesRapport() {
        if (isset($_GET)) {

            $id = $_GET["id"];

            $rapportUserPe = RapportUserPe::where("id", $id)->first();

            if ($rapportUserPe != null) {
                $debut = $rapportUserPe->debut;
                $fin = $rapportUserPe->fin;

                $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id . " and created_at between '" . $debut . " 00:00:00' and '" . $fin . " 23:59:59'");

                $entretienPair = new EntretienPair();

                $themes = TypeEntretien::orderBy("libelle", "asc")->get();

                $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();


                if (Auth::user()->typeuser->libelle == "Sup Univ") {
                    return view("PaireEducateur.SupUniversitaire.detailMesRapport")
                                    ->with(["rapports" => $rapports])
                                    ->with(["pair" => $entretienPair])
                                    ->with(["themes" => $themes])
                                    ->with(["debut" => $debut])
                                    ->with(["fin" => $fin])
                                    ->with(["types" => $typeActivity])
                                    ->with(["page" => "rapport"]);
                } else if (Auth::user()->typeuser->libelle == "admin ong") {
                    return view("PaireEducateur.AdminOng.detailRapportSup")
                                    ->with(["rapports" => $rapports])
                                    ->with(["pair" => $entretienPair])
                                    ->with(["themes" => $themes])
                                    ->with(["debut" => $debut])
                                    ->with(["fin" => $fin])
                                    ->with(["types" => $typeActivity])
                                    ->with(["page" => "rapport"]);
                } else if (Auth::user()->typeuser->libelle == "admin regionaux") {
                    return view("PaireEducateur.AdminRegionaux.detailRapportSup")
                                    ->with(["rapports" => $rapports])
                                    ->with(["pair" => $entretienPair])
                                    ->with(["themes" => $themes])
                                    ->with(["debut" => $debut])
                                    ->with(["fin" => $fin])
                                    ->with(["types" => $typeActivity])
                                    ->with(["page" => "rapport"]);
                }
            }
        }
    }

    public function getDetailRapportPE() {

        if (isset($_GET)) {
            $userID = $_GET["id"];

            $rapports = RapportPE::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();
            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.Superviseur.historique")
                            ->with(["rapports" => $rapports])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["page" => "historique-rapport"]);
        }
    }

    /**
     * Rapport des M&E ONG
     */
    public function getEncadreurOngEspace() {

        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id . " and created_at between '" . $debut . " 00:00:00' and '" . $fin . " 23:59:59'");

            // $rapports = DB::select("select * from rapport_p_es where user_id in (select educateur_id from affectation_p_es where affectant_id = ".Auth::user()->id.")");

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;

            $entretienPair = new EntretienPair();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();

            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminOng.dashboard")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["page" => "rapport"]);
        } else {

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id);

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;
            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminOng.dashboard")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["debut" => null])
                            ->with(["fin" => null])
                            ->with(["page" => "rapport"]);
        }
    }

    /**
     * Rapport des M&E Régionaux
     */
    public function getEncadreurRegionaux() {

        if (isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id . " and created_at between '" . $debut . " 00:00:00' and '" . $fin . " 23:59:59'");

            // $rapports = DB::select("select * from rapport_p_es where user_id in (select educateur_id from affectation_p_es where affectant_id = ".Auth::user()->id.")");

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;

            $entretienPair = new EntretienPair();

            $themes = TypeEntretien::orderBy("libelle", "asc")->get();

            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminRegionaux.dashboard")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["debut" => $debut])
                            ->with(["fin" => $fin])
                            ->with(["page" => "rapport"]);
        } else {

            $rapports = DB::select("select * from rapport_user_pes where destinataire  = " . Auth::user()->id);

            $universite = Auth::user()->paireducateur->ecole;
            $region = Auth::user()->paireducateur->region;
            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            return view("PaireEducateur.AdminRegionaux.dashboard")
                            ->with(["rapports" => $rapports])
                            ->with(["universite" => $universite])
                            ->with(["pair" => $entretienPair])
                            ->with(["themes" => $themes])
                            ->with(["types" => $typeActivity])
                            ->with(["region" => $region])
                            ->with(["debut" => null])
                            ->with(["fin" => null])
                            ->with(["page" => "rapport"]);
        }
    }

    /**
     * Suivi des PE universitaire
     * par les superviseurs
     */
    public function getSuiviPeUnivBySup() {

        $currentUser = Auth::user();

        //return $currentUser->id;
        $affectations = DB::select("select educateur_id from affectation_p_es where affectant_id = " . Auth::user()->id);

        $arrayID = array();
        foreach ($affectations as $aff) {
            array_push($arrayID, $aff->educateur_id);
        }

        $users = User::whereIn("id", $arrayID)->get();

        if ($currentUser->typeuser->libelle == "Sup Univ") {
            return view("PaireEducateur.SupUniversitaire.suiviPE")
                            ->with(["page" => "pe-univ-associe"])
                            ->with(["users" => $users]);
        } else if ($currentUser->typeuser->libelle == "admin ong") {
            return view("PaireEducateur.AdminOng.suiviSup")
                            ->with(["page" => "pe-univ-associe"])
                            ->with(["users" => $users]);
        } else if ($currentUser->typeuser->libelle == "admin regionaux") {
            return view("PaireEducateur.AdminRegionaux.suiviOng")
                            ->with(["page" => "pe-univ-associe"])
                            ->with(["users" => $users]);
        }
    }

    /**
     * Suivi du détail des
     * rapports des PE universitaires
     */
    public function getListeRapportPeUniv() {

        $currentUser = Auth::user();

        if (isset($_GET)) {
            $userID = $_GET["ref"];
            $user = User::find($userID);
            $rapports = DB::select("select * from rapport_user_pes where user_id = " . $userID . " and destinataire  = " . Auth::user()->id);

            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            if ($currentUser->typeuser->libelle == "Sup Univ") {
                return view("PaireEducateur.SupUniversitaire.detailRapportSuiviPE")
                                ->with(["rapports" => $rapports])
                                ->with(["pair" => $entretienPair])
                                ->with(["themes" => $themes])
                                ->with(["user" => $user])
                                ->with(["types" => $typeActivity])
                                ->with(["page" => "pe-univ-associe"]);
            } else if ($currentUser->typeuser->libelle == "admin ong") {
                return view("PaireEducateur.AdminOng.detailRapportSuiviSup")
                                ->with(["rapports" => $rapports])
                                ->with(["pair" => $entretienPair])
                                ->with(["themes" => $themes])
                                ->with(["user" => $user])
                                ->with(["types" => $typeActivity])
                                ->with(["page" => "pe-univ-associe"]);
            } else if ($currentUser->typeuser->libelle == "admin regionaux") {
                return view("PaireEducateur.AdminRegionaux.detailRapportSuiviOng")
                                ->with(["rapports" => $rapports])
                                ->with(["pair" => $entretienPair])
                                ->with(["themes" => $themes])
                                ->with(["user" => $user])
                                ->with(["types" => $typeActivity])
                                ->with(["page" => "pe-univ-associe"]);
            }
        }
        return redirect()->back()->with(["error" => "Impossible de voir la liste des rapports"]);
    }

    public function importEntretienPair(Request $request) {
        try {
            $this->validate($request, [
                'fichierImporte' => 'required|file|max:2048|mimes:xls,xlsx',
            ]);

            $path = $request->file('fichierImporte')->store('importsPE', 'public');
            $url = Storage::url($path);
            \Excel::filter('chunk')->load('/public/' . $url)->chunk(500, function ($results) {

                foreach ($results as $row) {
                    \DB::transaction(function () use ($row) {
                        $codification = array("L" => "LC", "M" => "MT", "P" => "PT", "C" => "CT",
                            "K" => "KR", "S" => "SV", "EL" => "Elève", "ET" => "Etudiant", "AU" => "Autres");

                        $details = new EntretienDetails(Carbon::now(), $row["code_beneficiaire"], $row["sexe"], $row["profession"], $row["region"], $row["age"], $row["type_activite"], $row["theme_iecccc"], $row["statut"], $row["cond_masculin"], $row["con_feminin"], $row["reference"]);
//                    $details = new EntretienDetails($row["date"], $row["code"], $row["sexe"], $row["profession"], $row["region"], $row["age"], $row["type_activite"],
//                        $row["theme_iecccc"], $row["statut"], $row["cond_masculin"], $row["con_feminin"], $row["reference"]);
//                    $date_formatted = \PHPExcel_Style_NumberFormat::toFormattedString($details->getDate(), 'YYYY-MM-DD HH:i:ss');

                        if (Auth::user() != null && !empty($details->getTypeActivite()) && !empty($details->getTypeEntretien()) && !empty($details->getRegion())) {
                            /**
                             * Enrégistrement des infortations basiques d'entretiens
                             */
                            $entretien = new EntretienPair();
                            $entretien->nbreParticipant = 1;
                            $entretien->referer = $details->getReferer();
                            $entretien->condomMasculin = $details->getCondomMasculin();
                            $entretien->condomFeminin = $details->getCondomFeminin();

                            $typeActivite = TypeActivite::where("libelle", 'like', $details->getTypeActivite() . '%')->first();
                            $causerie = TypeActivite::where('libelle', 'like', 'Causerie%')->first();
                            $individuel = TypeActivite::where('libelle', 'like', 'Individuel%')->first();
                            $autres = TypeActivite::where('libelle', 'Autres')->first();
                            if ($typeActivite != null) {
                                if ($causerie != null && ($typeActivite->id == $causerie->id)) {
                                    $typeActivite = $causerie;
                                } else {
                                    $typeActivite = $individuel;
                                }
                            } else {
                                $typeActivite = $autres;
                            }

                            $typeEntretien = TypeEntretien::where('libelle', 'like', '%' . $details->getTypeEntretien() . '%')->first();
                            $autres = TypeEntretien::where('libelle', 'Autres')->first();
                            $cycleMenstruel = TypeEntretien::where('libelle', 'like', '%Cycle Menstruel%')->first();
                            $ist = TypeEntretien::where('libelle', 'like', 'IST%')->first();
                            $grossesse = TypeEntretien::where('libelle', 'like', '%Grossesse%')->first();

                            if ($typeEntretien != null) {
                                if ($cycleMenstruel != null && ($typeEntretien->id == $cycleMenstruel->id)) {
                                    $typeEntretien = $cycleMenstruel;
                                } else if ($ist != null && ($typeEntretien->id == $ist->id)) {
                                    $typeEntretien = $ist;
                                } else if ($grossesse != null && ($typeEntretien->id == $grossesse->id)) {
                                    $typeEntretien = $grossesse;
                                } else {
                                    //
                                }
                            } else {
                                $typeEntretien = $autres;
                            }

                            $entretien->type_activite_id = $typeActivite->id;
                            $entretien->type_entretien_id = $typeEntretien->id;
                            $entretien->user_id = Auth::user()->id;
                            $entretien->created_at = $details->getDate();
//                    $entretien->created_at = $date_formatted;
                            $entretien->save();

                            /**
                             * Enrégistrement des personnes ou participants
                             */
                            $participant = new EntretienParticipant();
                            $participant->code = $details->getCode();
                            $participant->sexe = $details->getSexe();
                            $participant->age = $details->getAge() ?: 0;
                            $participant->statut = explode(" ", $details->getStatut())[0];

                            $region = Region::where('code', $codification[$details->getRegion()])->first();
                            $regionAutres = Region::where('code', 'AUT');
                            $newRegion = $region ?: $regionAutres;

                            $entretien_find = EntretienPair::where("id", $entretien->id)->first();
//                            dump($typeActivite, $typeEntretien, $region, $entretien_find);
                            $participant->region_id = $newRegion->id;
                            $participant->profession = $codification[$details->getProfession()];
                            $participant->entretien_pair_id = $entretien_find->id;
                            $participant->created_at = $details->getDate();
//                    $participant->created_at = $date_formatted;
                            $participant->save();
//                        dump($entretien, $participant);
                        }
                    });
                }
            });

            return redirect()->back()->with(["message" => "Entretiens sauvegardés avec succès"]);
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function getNouveauCode($code, $sexe, $age, $country, $profession, $region)
    {
        $codification = [
            '+228' => 'TG',
            '0' => 'C',
            '1' => 'B',
            '2' => 'E',
            '3' => 'R',
            '4' => 'X',
            '5' => 'D',
            '6' => 'Z',
            '7' => 'Y',
            '8' => 'F',
            '9' => 'P',
            'Masculin' => 'M',
            'Féminin' => 'F',
            'Elève' => 'EL',
            'Etudiant' => 'ET',
            'Entrepreneur' => 'AU',
            'Employé' => 'AU',
            'Fonctionnaire' => 'AU',
            'Apprenti' => 'AU',
            'Autre' => 'AU',
            'LC' => 'L',
            'MT' => 'M',
            'PT' => 'P',
            'CT' => 'C',
            'KR' => 'K',
            'SV' => 'S',
        ];

        // 2 premiers et 4 derniers chiffres du numéro de téléphone
        $phone = substr($code, 0, 2) . substr($code, -4);
        
        return $country . $phone .'-'. $codification[$profession] .'-' . $codification[$region] .'-'. $sexe .'-'. $age;
    }

}
