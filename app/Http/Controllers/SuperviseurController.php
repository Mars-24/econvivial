<?php

namespace App\Http\Controllers;

use App\Entretien;
use App\PairEducateur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperviseurController extends Controller
{
    //


    public function  getHistoriqueEntretien(){

        $ecole = Auth::user()->paireducateur->ecole;

        $entretiens = DB::select("select * from entretiens where supValidation is false and  pair_educateur_id in 
                        (select id from pair_educateurs where ecole_id = ".$ecole->id.") order by id desc");

        return view("PaireEducateur.Superviseur.dashboard")
            ->with(["page" => "entretien-attente-superviseur"])
            ->with(["entretiens" => $entretiens]);
    }

    public function  getHistoriqueEntretienValide(){

        $ecole = Auth::user()->paireducateur->ecole;

        $entretiens = DB::select("select * from entretiens where supValidation is true and  pair_educateur_id in 
                        (select id from pair_educateurs where ecole_id = ".$ecole->id.") order by id desc");

        return view("PaireEducateur.Superviseur.histoEntretienValide")
            ->with(["page" => "entretien-valider-superviseur"])
            ->with(["entretiens" => $entretiens]);
    }

    public function valideEntretien(Request $request){

        $entretien = Entretien::where("id", $request["id"])->first();
        if($entretien != null){
            $entretien->supValidation = true;
            $entretien->save();
            return redirect()->route("liste-entretien-valider-sup")->with(["message" => "Entretien validé avec succès par le superviseur, mais en attente de validation par l'admin ONG"]);
        }
        return redirect()->back()->with(["error" => "Impossible de valider l'entretien"]);
    }

    public function  getListeUtilisateur(){
        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and u.valider is true
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = ".$ecole->id."  ) order by id desc");

        return view("PaireEducateur.Superviseur.listeUtilisateur")
            ->with(["ecole" => $ecole])
            ->with(["page" => "liste-utilisateur"])
            ->with(["users" => $users]);
    }

    /**
     * Suivi des pairs éducateurs
     */

    public function getListePairEducateur(){

        $ecole = Auth::user()->paireducateur->ecole;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle = 'PE'
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where ecole_id = ".$ecole->id."  ) order by id desc");

        return view("PaireEducateur.Superviseur.listePE")
            ->with(["ecole" => $ecole])
            ->with(["page" => "liste-pair-educateur"])
            ->with(["users" => $users]);

    }

    public function suivrePairEducateur(){

        if(isset($_GET)){
           $ref = $_GET["ref"];
           $user = User::where("id", $ref)->first();
           if($user != null){
               $pair = PairEducateur::where("id", $user->pair_educateur_id)->first();
               if($pair != null){
                   $entretiens = Entretien::where("pair_educateur_id", $pair->id)->get();

                   return view("PaireEducateur.Superviseur.pe")
                       ->with(["entretiens" => $entretiens])
                       ->with(["pair" => $pair])
                       ->with(["page" => "liste-pair-educateur"])
                       ->with(["user" => $user]);
               }
               return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
           }
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
    }

}
