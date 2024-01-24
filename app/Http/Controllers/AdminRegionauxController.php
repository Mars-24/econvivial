<?php

namespace App\Http\Controllers;

use App\Entretien;
use App\PairEducateur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRegionauxController extends Controller
{
    //

    public function  getHistoriqueEntretien(){

        $region = Auth::user()->paireducateur->region;

        $entretiens = DB::select("select * from entretiens where assocValidation is true and  regValidation is false and pair_educateur_id in 
                        (select id from pair_educateurs where region_id = ".$region->id.") order by id desc");

        return view("PaireEducateur.AdminRegionaux.dashboard")
            ->with(["page" => "entretien-attente-admin-reg"])
            ->with(["entretiens" => $entretiens]);
    }

    public function  getHistoriqueEntretienValide(){

        $region = Auth::user()->paireducateur->region;

        $entretiens = DB::select("select * from entretiens where regValidation is true and  pair_educateur_id in 
                        (select id from pair_educateurs where region_id = ".$region->id.") order by id desc");

        return view("PaireEducateur.AdminRegionaux.histoEntretienValide")
            ->with(["page" => "entretien-valider-admin-reg"])
            ->with(["entretiens" => $entretiens]);
    }

    public function valideEntretien(Request $request){

        $entretien = Entretien::where("id", $request["id"])->first();
        if($entretien != null){
            $entretien->regValidation = true;
            $entretien->save();
            return redirect()->route("liste-entretien-valider-admin-reg")->with(["message" => "Entretien validé avec succès par le responsable Régional."]);
        }
        return redirect()->back()->with(["error" => "Impossible de valider l'entretien"]);
    }

    public function  getListeUtilisateur(){
        $region = Auth::user()->paireducateur->region;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle in ('etudiant', 'eleve')
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where region_id = ".$region->id."  ) order by id desc");

        return view("PaireEducateur.AdminRegionaux.listeUtilisateur")
            ->with(["region" => $region])
            ->with(["page" => "liste-utilisateur"])
            ->with(["users" => $users]);
    }
    /**
     * Suivi des M&E ONG
     */

    public function getListeUserONG(){

        $region = Auth::user()->paireducateur->region;

        $users = DB::select("select u.* from users u, type_users t 
                       where t.id = u.type_user_id 
                       and t.libelle = 'admin ong'
                       and  u.pair_educateur_id 
                       in (select id from pair_educateurs where region_id = ".$region->id."  ) order by id desc");

        return view("PaireEducateur.AdminRegionaux.listeOng")
            ->with(["region" => $region])
            ->with(["page" => "suivi-ong"])
            ->with(["users" => $users]);

    }

    public function suivreUserOng(){

        if(isset($_GET)){
            $ref = $_GET["ref"];
            $user = User::where("id", $ref)->first();
            if($user != null){
                $pair = PairEducateur::where("id", $user->pair_educateur_id)->first();
                if($pair != null){
                    $entretiens = Entretien::where("pair_educateur_id", $pair->id)->get();

                    return view("PaireEducateur.AdminRegionaux.ong")
                        ->with(["entretiens" => $entretiens])
                        ->with(["pair" => $pair])
                        ->with(["page" => "suivi-ong"])
                        ->with(["user" => $user]);
                }
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
            }
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de d'afficher"]);
    }
}
