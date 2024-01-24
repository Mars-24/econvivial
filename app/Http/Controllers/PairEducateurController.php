<?php

namespace App\Http\Controllers;

use App\AffectationPE;
use App\Association;
use App\Ecole;
use App\Entretien;
use App\TypeActivite;
use App\TypeEntretien;
use App\EntretienPair;
use App\EntretienParticipant;
use App\NotifToken;
use App\PairEducateur;
use App\Region;
use App\TypeUser;
use App\User;
use App\Ville;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;
use DB;
use Excel;

class PairEducateurController extends Controller
{
    //

    public function getComptePE()
    {
        $regions = Region::all();
        $typeUser = TypeUser::where("libelle", "PE")->first();
        $universites = Ecole::where("apprenant", "eleve")->orderBy("libelle", "asc")->get();

        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("PaireEducateur.Compte.pe")
            ->with(["page" => "compte-pe"])
            ->with(["users" => $users])
            ->with(["universites" => $universites])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function getEcoleByRegion(Request $request)
    {
        $region = Region::where("id", $request["id"])->first();
        if ($region != null) {
            return Ecole::where("region_id", $region->id)->where("apprenant", "eleve")->get();
            // return $region->ecoles();
        }
        return null;
    }

    public function saveComptePE(Request $request)
    {

        $this->validate($request, [
            "region" => "required",
            "numero" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "PE")->first();

        if (strlen($request["numero"]) != 8) {
            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
        }

        $numeroTel = "+228 " . $request["numero"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        try {
            /**
             * Génération du code correspondant au password
             */
            $code = $this->getCode();

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->ecole_id = $request["ecole"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->code = $code;
            $user->actif = false;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            /**
             * Affectation du Sup à l'ONG
             */
            $affectation = new AffectationPE();
            $affectation->educateur_id = $user->id;
            $affectation->affectant_id = $request["superviseur"];
            $affectation->valider = false;
            $affectation->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte pair éducateur scolaire " . $code;

            $sendSMS = new NotifToken();

            // $output = "OK";
            $output = $sendSMS->sendSMS($userNumber, $message);

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte du PE scolaire crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte du PE scolaire crée avec succès sans envoie du SMS d'authentification"]);
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer le superviseur"])->withInput();
        }
    }

    public function postEditPairEducateur(Request $request)
    {

        $this->validate($request, [
            // "email" => "required | unique:users",
            // "numero" => "required | unique:users",
        ]);

        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }
        $pairEducateur = $user->paireducateur;
        if ($pairEducateur == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }

        /**
         * Modification des infos utilisateurs
         */

        try {

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur->nom = $request["nom"];
            $pairEducateur->prenom = $request["prenom"];
            $pairEducateur->ecole_id = $request["ecole"];
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user->username = $request["prenom"];
            $user->email = $request["email"];
            $user->numero = $request["numero"];
            $user->sexe = $request["sexe"];
            $user->activation = true;
            $user->save();

            return redirect()->back()->with(["message" => "Modification apportée avec succès"]);

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier les informations"])->withInput();
        }

    }

    public function postDeletePairEducateur(Request $request)
    {
        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de supprimer"]);
        }
        try {
            DB::table('affectation_p_es')->where('educateur_id', '=', $user->id)->delete();
            DB::table('affectation_p_es')->where('affectant_id', '=', $user->id)->delete();
            $user->delete();
            return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
        } catch (QueryException $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        }
    }

    /**
     * Superviseur Pair Educateur
     */

    public function edit($id)
    {
        $pairEducateur = PairEducateur::findOrFail($id);
        return view('PaireEducateur.Compte.superviseur', compact('pairEducateur'));
    }

    /**
     * Superviseur Pair Educateur
     */

    public function getCompteSuperviseur()
    {

        $regions = Region::all();
        $typeUser = TypeUser::where("libelle", "superviseur")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();
        $universites = Ecole::where("apprenant", "eleve")->orderBy("libelle", "asc")->get();

        return view("PaireEducateur.Compte.superviseur")
            ->with(["page" => "compte-superviseur"])
            ->with(["users" => $users])
            ->with(["universites" => $universites])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function saveCompteSuperviseur(Request $request)
    {

        $this->validate($request, [
            "region" => "required",
            "numero" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "superviseur")->first();

        if (strlen($request["numero"]) != 8) {
            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
        }

        $numeroTel = "+228 " . $request["numero"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        try {

            /**
             * Génération du code correspondant au password
             */
            $code = $this->getCode();

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->ecole_id = $request["ecole"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->actif = false;
            $user->code = $code;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            /**
             * Affectation du Sup à l'ONG
             */
            $affectation = new AffectationPE();
            $affectation->educateur_id = $user->id;
            $affectation->affectant_id = $request["ong"];
            $affectation->valider = false;
            $affectation->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte superviseur scolaire " . $code;

            $sendSMS = new NotifToken();

            // $output = "OK";
            $output = $sendSMS->sendSMS($userNumber, $message);

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte du superviseur scolaire crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte du superviseur scolaire crée avec succès sans envoie du SMS d'authentification"]);
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer le superviseur"])->withInput();
        }

    }

    public function getPairEducateur($id)
    {

    }

    public function postEditSuperviseur(Request $request)
    {

        $this->validate($request, [
            // "email" => "required | unique:users",
            // "numero" => "required | unique:users",
        ]);

        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }
        $pairEducateur = $user->paireducateur;
        if ($pairEducateur == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }

        /**
         * Modification des infos utilisateurs
         */

        try {

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur->nom = $request["nom"];
            $pairEducateur->prenom = $request["prenom"];
            $pairEducateur->ecole_id = $request["ecole"];
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user->username = $request["prenom"];
            $user->email = $request["email"];
            $user->numero = "+228 " . $request["numero"];
            $user->sexe = $request["sexe"];
            $user->activation = true;
            $user->save();

            return redirect()->back()->with(["message" => "Modification apportée avec succès"]);

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier les informations"])->withInput();
        }

    }

    public function postDeleteSuperviseur(Request $request)
    {
        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de supprimer"]);
        }
        try {
            DB::table('affectation_p_es')->where('educateur_id', '=', $user->id)->delete();
            DB::table('affectation_p_es')->where('affectant_id', '=', $user->id)->delete();
            $user->delete();
            return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
        } catch (QueryException $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        }
    }


    /**
     * Compte des encadreurs ONG
     */


    public function getCompteEncadreurOng()
    {

        $regions = Region::all();
        $typeUser = TypeUser::where("libelle", "admin ong")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("PaireEducateur.Compte.ong")
            ->with(["page" => "compte-encadreur-association"])
            ->with(["users" => $users])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function getAssociationByRegion(Request $request)
    {

        $region = Region::where("id", $request["id"])->first();
        if ($region != null) {
            return Association::where("region_id", $region->id)->get();
            // return $region->ecoles();
        }
        return null;
    }

    /**
     * @param Request $request
     * @return $this|RedirectResponse
     * Liste des M&E Régionaux par région
     */

    public function getRegionauxByRegion(Request $request)
    {

        $typeUser = TypeUser::where("libelle", "admin regionaux")->first();

        $region = Region::where("id", $request["id"])->first();

        if ($region != null && $typeUser != null) {
            return DB::select("select * from pair_educateurs where region_id = " . $region->id . " and id in  (select pair_educateur_id from users where type_user_id = " . $typeUser->id . ")");
        }

        return null;
    }

    public function saveCompteEncadreurOng(Request $request)
    {

        $this->validate($request, [
            "numero" => "required | unique:users",
            "region" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "admin ong")->first();

        $numeroTel = "+228 " . $request["numero"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        $regionaux = $request["regionaux"];

        if (count($regionaux) == 0) {
            return redirect()->back()->with(["error" => "Vous devez associer au moin un M&E réginal"])->withInput();
        }

        try {

            /**
             * Génération du code correspondant au password
             */

            $code = $this->getCode();

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->code = $code;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte encadreur ONG " . $code;

            $sendSMS = new NotifToken();

            $output = "OK";
            //$output = $sendSMS->sendSMS($userNumber,$message);

            /**
             * Affectation du M&E ONG aux M&E r2GIONAUX
             */

            foreach ($regionaux as $regional) {
                $pairEdu = PairEducateur::where("id", $regional)->first();
                if ($pairEdu != null) {
                    $affectation = new AffectationPE();
                    $affectation->educateur_id = $user->id;
                    $affectation->affectant_id = $pairEdu->users[0]->id;
                    $affectation->valider = false;
                    $affectation->save();
                }
            }

            // Envoie de SMS selon les conditions

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte de l'encadreur ONG crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte de l'encadreur ONG crée avec succès sans envoie du SMS d'authentification"]);
            }


        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer l'encadreur ONG"])->withInput();
        }

    }

    public function postEditEncadreurOng(Request $request)
    {

        $this->validate($request, [
            // "email" => "required | unique:users",
            // "numero" => "required | unique:users",
        ]);

        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }
        $pairEducateur = $user->paireducateur;
        if ($pairEducateur == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }

        /**
         * Modification des infos utilisateurs
         */

        try {

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur->nom = $request["nom"];
            $pairEducateur->prenom = $request["prenom"];
            $pairEducateur->association_id = $request["association"];
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user->username = $request["prenom"];
            $user->email = $request["email"];
            $user->numero = $request["numero"];
            $user->sexe = $request["sexe"];
            $user->activation = true;
            $user->save();

            return redirect()->back()->with(["message" => "Modification apportée avec succès"]);

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier les informations"])->withInput();
        }

    }

    public function postDeleteEncadreurOng(Request $request)
    {
        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de supprimer"]);
        }
        try {
            DB::table('affectation_p_es')->where('educateur_id', '=', $user->id)->delete();
            DB::table('affectation_p_es')->where('affectant_id', '=', $user->id)->delete();
            $user->delete();
            return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
        } catch (QueryException $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        }
    }


    /**
     * Gestion des encadreurs régionaux
     */

    public function getCompteEncadreurRegionaux()
    {

        $regions = Region::all();

        $typeUser = TypeUser::where("libelle", "admin regionaux")->first();

        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("PaireEducateur.Compte.regionaux")
            ->with(["page" => "compte-encadreur-regionaux"])
            ->with(["users" => $users])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function saveCompteEncadreurRegionaux(Request $request)
    {

        $this->validate($request, [
            "region" => "required",
            "telephone" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "admin regionaux")->first();

        if (strlen($request["telephone"]) != 8) {
            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
        }

        $numeroTel = "+228 " . $request["telephone"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        try {

            /**
             * Génération du code correspondant au password
             */

            $code = $this->getCode();
            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->code = $code;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte encadreur régional " . $code;

            $sendSMS = new NotifToken();
            // $output = "OK";
            $output = $sendSMS->sendSMS($userNumber, $message);

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte de l'encadreur régional crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte de l'encadreur régional crée avec succès sans envoie du SMS d'authentification"]);
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer l'encadreur réginal"])->withInput();
        }
    }


    public function postEditEncadreurRegionaux(Request $request)
    {


        $user = User::where("id", $request["id"])->first();

        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }
        $pairEducateur = $user->paireducateur;

        if ($pairEducateur == null) {
            return redirect()->back()->with(["error" => "Impossible de modifier cet utilisateur."]);
        }

//        if (strlen($request["numero"]) != 13) {
//            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
//        }

        $editNumber = "+228 " . $request["numero"];
//        $editNumber = $request["numero"];

        /**
         * Modification des infos utilisateurs
         */
        try {

            /**
             * Enrégistrement du paire educateur
             */
            $pairEducateur->region_id = $request["region"];
            $code = $request["code"];
            $pairEducateur->code = $code;
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            if ($user->numero != $editNumber) {

                /**
                 * Génération du code correspondant au password
                 */

                $code = $this->getCode();

                $userNumber = preg_replace('/\s+/', '', substr($editNumber, 1));

                $message = "Code d'authentification sur eConvivial pour votre compte encadreur régional " . $code;

                $sendSMS = new NotifToken();

                $output = $sendSMS->sendSMS($userNumber, $message);

                $user->numero = $editNumber;
                $user->password = $code;
                $user->save();

                if (strpos($output, 'OK') !== false) {
                    return redirect()->back()->with(["message" => "Compte de l'encadreur régional modifié avec succès avec envoie du code d'authentification par SMS"]);

                } else {
                    return redirect()->back()->with(["message" => "Compte de l'encadreur régional modifié avec succès sans envoie du SMS d'authentification"]);
                }

            }

            return redirect()->back()->with(["message" => "Modification apportée avec succès"]);

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier les informations"])->withInput();
        }

    }

    public function postDeleteEncadreurRegionaux(Request $request)
    {
        $user = User::where("id", $request["id"])->first();
        if ($user == null) {
            return redirect()->back()->with(["error" => "Impossible de supprimer"]);
        }
        try {
            DB::table('affectation_p_es')->where('educateur_id', '=', $user->id)->delete();
            DB::table('affectation_p_es')->where('affectant_id', '=', $user->id)->delete();
            $user->delete();
            return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
        } catch (QueryException $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Il est impossible de supprimer cet utilisateur, il est lié à certaines opérations qui seront aussi supprimés"]);
        }
    }


    /**
     * Suivi des pairs éducateurs at autres
     */

    public function getListeSuiviPE()
    {

        $typeUser = TypeUser::where("libelle", "PE")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("Admin.SuiviPE.suiviPE")
            ->with(["page" => "suivi-pair-educateur"])
            ->with(["users" => $users]);
    }

    /**
     * @return $thisDetail prestation PE
     */


    public function getDetailPrestationPe()
    {

        if (isset($_GET)) {
            $userID = $_GET["ref"];
            $typePE = $_GET["typePE"];

            $user = User::find($userID);
            $rapports = DB::select("select * from rapport_user_pes where user_id = " . $userID);

            $entretienPair = new EntretienPair();
            $themes = TypeEntretien::orderBy("libelle", "asc")->get();
            $typeActivity = TypeActivite::orderBy("libelle", "desc")->get();

            if ($typePE == "PE") {
                return view("Admin.SuiviPE.detailPrestationPE")
                    ->with(["rapports" => $rapports])
                    ->with(["pair" => $entretienPair])
                    ->with(["themes" => $themes])
                    ->with(["user" => $user])
                    ->with(["types" => $typeActivity])
                    ->with(["page" => "suivi-pair-educateur"]);
            } else if ($typePE == "SUP") {
                return view("Admin.SuiviPE.detailPrestationSuperviseur")
                    ->with(["rapports" => $rapports])
                    ->with(["pair" => $entretienPair])
                    ->with(["themes" => $themes])
                    ->with(["user" => $user])
                    ->with(["types" => $typeActivity])
                    ->with(["page" => "suivi-superviseur"]);
            } else if ($typePE == "ONG") {
                return view("Admin.SuiviPE.detailPrestationSuperviseur")
                    ->with(["rapports" => $rapports])
                    ->with(["pair" => $entretienPair])
                    ->with(["themes" => $themes])
                    ->with(["user" => $user])
                    ->with(["types" => $typeActivity])
                    ->with(["page" => "suivi-admin-ong"]);
            } else if ($typePE == "REG") {
                return view("Admin.SuiviPE.detailPrestationSuperviseur")
                    ->with(["rapports" => $rapports])
                    ->with(["pair" => $entretienPair])
                    ->with(["themes" => $themes])
                    ->with(["user" => $user])
                    ->with(["types" => $typeActivity])
                    ->with(["page" => "suivi-admin-regionaux"]);
            }
        }
    }
    // public function getDetailPrestationPe(){

    //     if(isset($_GET)){
    //     $id = $_GET["ref"];
    //         $typeUser = TypeUser::where("libelle", "PE")->first();
    //         if($typeUser != null){
    //             $user = User::where("id", $id)->first();
    //             if($user != null){

    //                 $entretiens = Entretien::where("pair_educateur_id", $user->paireducateur->id)
    //                     ->orderBy("id", "desc")
    //                     ->get();

    //                 return view("Admin.SuiviPE.detailPrestationPE")
    //                             ->with(["user" => $user])
    //                             ->with(["entretiens" => $entretiens])
    //                             ->with(["page" => "suivi-pair-educateur"]);
    //             }
    //             return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
    //         }
    //         return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
    //     }
    //     return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
    // }

    public function getListeSuiviSuperviseur()
    {

        $typeUser = TypeUser::where("libelle", "superviseur")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("Admin.SuiviPE.suiviSuperviseur")
            ->with(["page" => "suivi-superviseur"])
            ->with(["users" => $users]);
    }


    public function getDetailPrestationSuperviseur()
    {

        if (isset($_GET)) {
            $id = $_GET["ref"];
            $typeUser = TypeUser::where("libelle", "superviseur")->first();
            if ($typeUser != null) {
                $user = User::where("id", $id)->first();
                if ($user != null) {

                    $ecole = $user->paireducateur->ecole;

                    $entretiens = DB::select("select * from entretiens where supValidation is true and  pair_educateur_id in
                        (select id from pair_educateurs where ecole_id = " . $ecole->id . ") order by id desc");

                    return view("Admin.SuiviPE.detailPrestationSuperviseur")
                        ->with(["user" => $user])
                        ->with(["entretiens" => $entretiens])
                        ->with(["page" => "suivi-superviseur"]);
                }
                return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
        }
        return redirect()->back()->with(["error" => "Impossible d'afficher la page"]);
    }

    public function getListeSuiviAdminOng()
    {

        $typeUser = TypeUser::where("libelle", "admin ong")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("Admin.SuiviPE.suiviAdminOng")
            ->with(["page" => "suivi-admin-ong"])
            ->with(["users" => $users]);
    }

    public function getListeSuiviAdminRegionaux()
    {

        $typeUser = TypeUser::where("libelle", "admin regionaux")->first();
        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("Admin.SuiviPE.suiviAdminRegionaux")
            ->with(["page" => "suivi-admin-regionaux"])
            ->with(["users" => $users]);
    }

    /**
     * Superviseur universitaires
     */

    public function getSupUniversitaire()
    {
        $regions = Region::all();
        $typeUser = TypeUser::where("libelle", "Sup Univ")->first();
        $universites = Ecole::where("apprenant", "etudiant")->orderBy("libelle", "asc")->get();

        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("PaireEducateur.Compte.supUniv")
            ->with(["page" => "sup-univ"])
            ->with(["users" => $users])
            ->with(["universites" => $universites])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function exportPEUserToExcel(Request $request)
    {
        $title = $request["title"];
        $typeUser = $request["typeUser"];

        $type = TypeUser::where("libelle", $typeUser)->first();

        if ($typeUser != null)
            $users = User::where("type_user_id", $type->id)->get();

        Excel::create($request["filename"], function ($excel) use ($users, $title, $typeUser) {
            $excel->setTitle($title);
            $excel->sheet('ExportFile', function ($sheet) use ($users, $typeUser) {

                foreach ($users as $user) {
                    $superieur = "Non défini";
                    $ets = "Non défini";

                    if ($typeUser != "admin regionaux") {
                        $superieur = User::where("id", AffectationPE::where("educateur_id", $user->id)->first()->affectant_id)->first()->paireducateur->code;
                    }

                    if ($typeUser != "admin ong" && $typeUser != "admin regionaux") {
                        $ets = $user->paireducateur->ecole->libelle;
                    }
                    $data[] = array(
                        $user->paireducateur->code != null ? $user->paireducateur->code : "Non défini",
                        $user->paireducateur->region->libelle ? $user->paireducateur->region->libelle : "Non défini",
                        $user->numero,
                        $user->actif ? "OUI" : "NON",
                        $superieur,
                        $ets,
                    );
                }

                $headings = array("Code", "Région", 'N° Téléphone', 'Etat du compte', 'Supérieur Hiérarchique', 'ETS/Université');
                $sheet->row(1, $headings);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }

    public function getEncadreurRegional(Request $request)
    {
        $region = Region::where("id", $request["id"])->first();
        $typeUser = TypeUser::where("libelle", "admin ong")->first();


        if ($region != null && $typeUser != null) {
            $users = DB::select("select p.code, u.id from pair_educateurs p, users u
                                 where p.region_id = " . $region->id . "
                                 and  u.pair_educateur_id = p.id
                                 and u.type_user_id =" . $typeUser->id);
            return $users;
        }
    }

    public function postSaveSuperviseurUniv(Request $request)
    {

        $codes = $request["code"];
        $sexes = $request["sexe"];
        $ages = $request["age"];
        $statuts = $request["statut"];
        $countries = $request["pays"];
        $professions = $request["profession"];
        $regions = $request["region"];
        $this->validate($request, [
            "region" => "required",
            "numero" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "Sup Univ")->first();

        if (strlen($request["numero"]) != 8) {
            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
        }

        $numeroTel = "+228 " . $request["numero"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        try {

            /**
             * Génération du code correspondant au password
             */
            $index = 0;
            $code = $this->getCode();
            $code_genere = $this->getNouveauCode($request["numero"], $sexes[$index], $ages[$index], $countries[$index], $professions[$index], $regions[$index]);

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->ecole_id = $request["universite"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->code = $code;
            $user->actif = false;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            /**
             * Affectation du Sup à l'ONG
             */
            $affectation = new AffectationPE();
            $affectation->educateur_id = $user->id;
            $affectation->affectant_id = $request["ong"];
            $affectation->valider = false;
            $affectation->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte superviseur universitaire " . $code;

            $sendSMS = new NotifToken();

            // $output = "OK";
            $output = $sendSMS->sendSMS($userNumber, $message);

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte du superviseur universitaire crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte du superviseur universitaire crée avec succès sans envoie du SMS d'authentification"]);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer le superviseur"])->withInput();
        }
    }

    /**
     * Code générer
     */

    public function getCode()
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 0;
        $code = '';

        while ($i <= 6) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $code = $code . $tmp;
            $i++;
        }
        return $code;
    }

    /**
     * Page d'enrégistrement du PE universitaire
     */

    public function getPEUniversitaire()
    {
        $regions = Region::all();
        $typeUser = TypeUser::where("libelle", "PE Univ")->first();
        $universites = Ecole::where("apprenant", "etudiant")->orderBy("libelle", "asc")->get();

        if ($typeUser != null)
            $users = User::where("type_user_id", $typeUser->id)->get();

        return view("PaireEducateur.Compte.peUniv")
            ->with(["page" => "pe-univ"])
            ->with(["users" => $users])
            ->with(["universites" => $universites])
            ->with(["number" => count($users) + 1])
            ->with(["regions" => $regions]);
    }

    public function getSupUniv(Request $request)
    {
        $region = Region::where("id", $request["id"])->first();
        $typeUser = TypeUser::where("libelle", "Sup Univ")->first();
        $universite = Ecole::where("id", $request["univ"])->first();

        if ($region != null && $typeUser != null && $universite != null) {
            $users = DB::select("select p.code, u.id from pair_educateurs p, users u
                                 where p.region_id = " . $region->id . "
                                 and p.ecole_id = " . $universite->id . "
                                 and  u.pair_educateur_id = p.id
                                 and u.type_user_id =" . $typeUser->id);
            return $users;
        }
    }

    public function getSupEcole(Request $request)
    {
        $region = Region::where("id", $request["region"])->first();
        $typeUser = TypeUser::where("libelle", "superviseur")->first();
        $universite = Ecole::where("id", $request["id"])->first();

        if ($region != null && $typeUser != null && $universite != null) {
            $users = DB::select("select p.code, u.id from pair_educateurs p, users u
                                 where p.region_id = " . $region->id . "
                                 and p.ecole_id = " . $universite->id . "
                                 and  u.pair_educateur_id = p.id
                                 and u.type_user_id =" . $typeUser->id);
            return $users;
        }
    }

    public function postSavePEUniv(Request $request)
    {

        $this->validate($request, [
            "region" => "required",
            "numero" => "required",
        ]);

        $typeUser = TypeUser::where("libelle", "PE Univ")->first();

        if (strlen($request["numero"]) != 8) {
            return redirect()->back()->with(["error" => "Veuillez saisir un numéro de télephone valide sans indicatif"])->withInput();
        }

        $numeroTel = "+228 " . $request["numero"];

        $utitlisateur = User::where("numero", $numeroTel)->first();

        if ($utitlisateur != null) {
            return redirect()->back()->with(["error" => "Ce numéro est déjà utilisé dans le système"])->withInput();
        }

        try {

            /**
             * Génération du code correspondant au password
             */
            $code = $this->getCode();

            /**
             * Enrégistrement du paire educateur
             */

            $pairEducateur = new PairEducateur();
            $pairEducateur->region_id = $request["region"];
            $pairEducateur->ecole_id = $request["universite"];
            $pairEducateur->code = $request["number"] . "-" . $request["code"];
            $pairEducateur->save();

            /**
             * Enrégistrement des informations utilisateurs
             */

            $user = new User();
            $user->numero = $numeroTel;
            $user->type_user_id = $typeUser->id;
            $user->activation = true;
            $user->password = $code;
            $user->code = $code;
            $user->actif = false;
            $user->pair_educateur_id = $pairEducateur->id;
            $user->save();

            /**
             * Affectation du Sup à l'ONG
             */
            $affectation = new AffectationPE();
            $affectation->educateur_id = $user->id;
            $affectation->affectant_id = $request["superviseur"];
            $affectation->valider = false;
            $affectation->save();

            $userNumber = preg_replace('/\s+/', '', substr($user->numero, 1));

            $message = "Code d'authentification compte PE universitaire " . $code;

            $sendSMS = new NotifToken();

            // $output = "OK";
            $output = $sendSMS->sendSMS($userNumber, $message);

            if (strpos($output, 'OK') !== false) {
                return redirect()->back()->with(["message" => "Compte du PE universitaire crée avec succès avec envoie du code d'authentification par SMS"]);
            } else {
                return redirect()->back()->with(["message" => "Compte du PE universitaire crée avec succès sans envoie du SMS d'authentification"]);
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer le superviseur"])->withInput();
        }
    }

    /**
     * Enrégistrer les informations d'entretien
     */

    public function postSaveEntretienInfo(Request $request)
    {

        $codes = $request["code"];
        $sexes = $request["sexe"];
        $ages = $request["age"];
        $statuts = $request["statut"];
        $countries = $request["pays"];
        $professions = $request["profession"];
        $regions = $request["region"];

        if (count($codes) == 0) {
            return redirect()->back()->with(["error" => "Renseigner le nombre de participant à l'entretien"])->withInput();
        }

        if (count($countries) == 0) {
            return redirect()->back()->with(["error" => "Renseigner le ou les pays"])->withInput();
        }


        foreach ($codes as $code) {
            if (empty($code)) {
                return redirect()->back()->with(["error" => "Renseigner les informations du(des) participant(s)"])->withInput();
            }
        }

        /**
         * Enrégistrement des infortations basique d'entretiens
         */

        $entretien = new EntretienPair();
        $entretien->nbreParticipant = count($codes);
        $entretien->referer = $request["referer"];
        $entretien->condomMasculin = $request["condomMasculin"];
        $entretien->condomFeminin = $request["condomFeminin"];
        $entretien->type_activite_id = $request["type"];
        $entretien->type_entretien_id = $request["theme"];
        $entretien->created_at = $request["dtactivite"];
        $entretien->user_id = Auth::user()->id;
        $entretien->save();

        /**
         * Enrégistrement des personnes ou participants
         */

        $index = 0;

        foreach ($codes as $code) {
            $code_genere = $this->getNouveauCode($code, $sexes[$index], $ages[$index], $countries[$index], $professions[$index], $regions[$index]);
            $participant = new EntretienParticipant();
            $participant->code = $code_genere;
            $participant->sexe = $sexes[$index];
            $participant->age = $ages[$index];

            // Récupérer la région correspondante
            $region = Region::where("code", $regions[$index])->first();
            $participant->region_id = $region->id;
            $participant->profession = $professions[$index];
            $participant->statut = $statuts[$index];
            $participant->entretien_pair_id = $entretien->id;
            $participant->created_at = $request["dtactivite"];

            $participant->save();

            $index++;
        }

        return redirect()->back()->with(["message" => "Entretien enrégistré avec succès"]);
    }

    /**
     * Get a value from an object or an array.  Allows the ability to fetch a nested value from a
     * heterogeneous multidimensional collection using dot notation.
     *
     * @param array|object $data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function get_value($data, $key, $default = null)
    {
        $value = $default;
        if (is_array($data) && array_key_exists($key, $data)) {
            $value = $data[$key];
        } else if (is_object($data) && property_exists($data, $key)) {
            $value = $data->$key;
        } else {
            $segments = explode('.', $key);
            foreach ($segments as $segment) {
                if (is_array($data) && array_key_exists($segment, $data)) {
                    $value = $data = $data[$segment];
                } else if (is_object($data) && property_exists($data, $segment)) {
                    $value = $data = $data->$segment;
                } else {
                    $value = $default;
                    break;
                }
            }
        }
        return $value;
    }

    /**
     * Code généré
     */

    public function getNouveauCode($code, $sexe, $age, $country, $profession, $region)
    {
        $codification = array("+228" => "TG", "0" => "C", "1" => "B", "2" => "E", "3" => "R", "4" => "X", "5" => "D",
            "6" => "Z", "7" => "Y", "8" => "F", "9" => "P", "Masculin" => "M", "Féminin" => "F", "Elève" => "EL", "Etudiant" => "ET",
            "Entrepreneur" => "AU", "Employé" => "AU", "Fonctionnaire" => "AU", "Apprenti" => "AU", "Autre" => "AU",
            "LC" => "L", "MT" => "M", "PT" => "P", "CT" => "C", "KR" => "K", "SV" => "S"
        );

        // Récupérer le code correspondant à l'indicatif
        $indicatif = $country;

        // Récupérer les correspondances par rapport aux (2) premiers chiffres du numéro de téléphone
        $raw_first_numb_tel = substr($code, 0, 2);
        $first_numb_tel = $codification[substr($raw_first_numb_tel, 0, 1)] . $codification[substr($raw_first_numb_tel, 1, 1)];

        // Récupérer les correspondances par rapport aux (6) derniers chiffres du numéro de téléphone
        $last_numb_tel = substr($code, 2, 6);

        // Récupérer le code correspondant à la profession
        $prof = $codification[$profession];

        // Récupérer le code correspondant au sexe
        $sexe_real = $sexe;

        // Récupérer l'âge
        $age_real = $age;

        // Récupérer le code correspondant à la région
        $region = $codification[$region];

        $code_genere = $indicatif . $first_numb_tel . $last_numb_tel . "-" . $prof . "-" . $region . "-" . $sexe_real . "-" . $age_real;

        return $code_genere;
    }
}
