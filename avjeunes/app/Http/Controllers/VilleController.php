<?php

namespace App\Http\Controllers;

use App\Quartier;
use App\Region;
use App\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    //
    public function index(){
        $villes = Ville::orderBy("libelle", "asc")->get();
        $regions = Region::orderBy("libelle", "asc")->get();
        return view("Admin.Ville.index")
                ->with(["villes" => $villes])
                ->with(["regions" => $regions])
                ->with(["page" => "ville"]);
    }

    public function saveVille(Request $request){
        $ville = Ville::where("libelle", $request["libelle"])->first();
        if($ville != null){
            return redirect()->back()->with(["erreur" => "Cette ville existe déjà"]);
        }
        $region = Region::where("libelle", $request["region"])->first();
        if($region == null){
            return redirect()->back()->with(["erreur" => "La région associée n'existe pas"]);
        }

        $ville = new Ville();
        $ville->libelle = $request["libelle"];
        $ville->region_id = $region->id;
        $ville->save();

        return redirect()->back()->with(["message" => "Ville enrégistrée avec succès"]);
    }

    public function postEditVille(Request $request){
        $ville = Ville::where("id", $request["id"])->first();
        if($ville == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        }

        $region = Region::where("libelle", $request["region"])->first();
        if($region == null){
            return redirect()->back()->with(["erreur" => "La région associée n'existe pas"]);
        }

        $ville->libelle = $request["libelle"];
        $ville->region_id = $region->id;
        $ville->save();

        return redirect()->back()->with(["message" => "Ville modifiée avec succès"]);
    }

    public function postDeleteVille(Request $request){
        $ville = Ville::where("id", $request["id"])->first();
        if($ville == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        }
        $ville->delete();
        return redirect()->back()->with(["message" => "Ville supprimée avec succès"]);
    }
    
       /**
     * @return mixed
     * Gestion des quartiers
     */
    public function getPageQuartier(){
        $villes = Ville::orderBy("libelle", "asc")->get();

        $quartiers = Quartier::orderBy("libelle", "asc")->get();
        return view("Admin.Quartier.index")
                ->with(["page" => "liste-quartier"])
                ->with(["villes" => $villes])
                ->with(["quartiers" => $quartiers]);
    }

    public function postQuartier(Request $request){

        $ville = Ville::where("id", $request["ville"])->first();

        if($ville != null){
            $quartier = new Quartier();
            $quartier->libelle = $request["libelle"];
            $quartier->ville_id = $ville->id;
            $quartier->save();

            return redirect()->back()->with(["message" => "Quartier enrégistrer avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de créer le quartier"]);
    }


    public function  postEditQuartier(Request $request){

        $quartier = Quartier::where("id", $request["id"])->first();

        if($quartier != null){

            $quartier->libelle = $request["libelle"];
            $quartier->ville_id = $request["ville"];
            $quartier->save();

            return redirect()->back()->with(["message" => "Modification effectuée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier le quartier"]);
    }


    public function  postDeleteQuartier(Request $request){

        $quartier = Quartier::where("id", $request["id"])->first();

        if($quartier != null){

            $quartier->delete();

            return redirect()->back()->with(["message" => "Quartier supprimé"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier le quartier"]);
    }

}
