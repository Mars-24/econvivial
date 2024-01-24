<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    public function index(){
        $regions = Region::orderBy("libelle", "asc")->get();
        return view("Admin.Region.index")
                ->with(["regions" => $regions])
                ->with(["page" => "région"]);
    }

    public function saveRegion(Request $request){
        $region = Region::where("libelle", $request["libelle"])->first();
        if($region != null){
            return redirect()->back()->with(["erreur" => "Cette région existe déjà"]);
        }
        $region = new Region();
        $region->libelle = $request["libelle"];
        $region->save();
        return redirect()->back()->with(["message" => "Région enrégistrée avec succès"]);
    }

    public function postEditRegion(Request $request){
        $region = Region::where("id", $request["id"])->first();
        if($region == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        }

        $region->libelle = $request["libelle"];
        $region->save();
        return redirect()->back()->with(["message" => "Région modifiée avec succès"]);
    }

    public function postDeleteRegion(Request $request){
        $region = Region::where("id", $request["id"])->first();
        if($region == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        }
        $region->delete();
        return redirect()->back()->with(["message" => "Région supprimée avec succès"]);
    }
}
