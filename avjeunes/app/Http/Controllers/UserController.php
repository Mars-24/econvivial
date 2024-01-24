<?php

namespace App\Http\Controllers;

use App\FormationSanitaire;
use App\ProfessionConseiller;
use App\TypeUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function indexUserFormationSanitaire(){
        $users = User::where("type_user_id",4)->orderBy("username", "asc")->get();
        $formations = FormationSanitaire::get();
        return view("Admin.User.userFormationSanitaire")
                ->with(["users" => $users])
                ->with(["formations" => $formations])
                ->with(["page" => "gestion-admin-formation"]);
    }

    public function saveUserFormationSanitaire(Request $request){

        $typeUser = TypeUser::where("libelle", "formation_sanitaire")->first();

        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }

        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        if($formation == null){
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        $user  = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = $request["numero"];
        $user->password = $request["password"];
        $user->type_user_id = $typeUser->id;
        $user->formation_sanitaire_id = $formation->id;
        $user->activation = true;

        $user->save();
        return redirect()->back()->with(["message" => "Utilisateur de formation sanitaire créer avec succès"]);
    }

    public function deleteUserFormationSanitaire(Request $request){
        $user = User::where("id", $request["id"])->first();
        if($user == null){
            return redirect()->back()->with(["erreur" => "Utilisateur inexistant"]);
        }
        $user->delete();
        return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
    }


    // Gestion utilisateurs Téléconseiller

    public function indexUserTeleConseiller(){
        $users = User::where("type_user_id",3)->orderBy("username", "asc")->get();
        $professions = ProfessionConseiller::get();
        return view("Admin.User.userTeleConseiller")
            ->with(["users" => $users])
            ->with(["professions" => $professions])
            ->with(["page" => "gestion-admin-conseiller"]);
    }

    public function saveUserTeleConseiller(Request $request){

        $typeUser = TypeUser::where("libelle", "teleconseiller")->first();

        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["error" => "Veuillez confirmer votre mot de passe"]);
        }

        $profession = ProfessionConseiller::where("libelle", $request["profession"])->first();
        if($profession == null){
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        $user  = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = $request["numero"];
        $user->password = $request["password"];
        $user->type_user_id = $typeUser->id;
        $user->profession_conseiller_id = $profession->id;
        $user->activation = true;
        
        // service_type = 'covid_19'
        $user->teleconseiller_service_type = $request->service;

        $user->save();
        return redirect()->back()->with(["message" => "Utilisateur téléconseiller créer avec succès"]);
    }

    public function saveEditUserTeleConseiller(Request $request)
    {
        $profession = ProfessionConseiller::where("id", $request["profession"])->first();

        if($profession == null){
            return redirect()->back()->with(["error" => "Profession inexistante"]);
        }

        $user  = User::where("id", $request["id"])->first();

        if($user == null){
            return redirect()->back()->with(["error" => "Utilisateur inexistante"]);
        }

        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->numero = $request["numero"];
        $user->profession_conseiller_id = $profession->id;
        
        $user->teleconseiller_service_type = $request->service;

        $user->save();
        
        return redirect()->back()->with(["message" => "Utilisateur téléconseiller modifier avec succès"]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * Modifier mot de passe
     */

    public function saveEditPswUserTeleConseiller(Request $request){

        $user  = User::where("id", $request["id"])->first();

        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["error" => "Veuillez confirmer votre mot de passe"]);
        }

        if($user == null){
            return redirect()->back()->with(["error" => "Utilisateur inexistante"]);
        }

        $user->password = $request["password"];
        $user->save();

        return redirect()->back()->with(["message" => "Mot de passe modifier avec succès"]);
    }

    public function deleteUserTeleConseiller(Request $request){
        $user = User::where("id", $request["id"])->first();
        if($user == null){
            return redirect()->back()->with(["erreur" => "Utilisateur inexistant"]);
        }
        $user->delete();
        return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
    }
}
