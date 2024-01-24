<?php

namespace App\Http\Controllers;

use App\RapportAlerteSms;
use App\RapportAlerteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlerteController extends Controller
{
    //

    public function getListeRapport(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if ($debut > $fin) {
                return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
            }

            $rapports = DB::select("select * from rapport_alerte_sms where created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59'");
            return view("Admin.Alerte.listeAlerte")
                ->with(["page" => "rapport-alerte", "rapports" => $rapports])
                ->with(["debut" => $debut])
                ->with(["fin" => $fin]);
        }else{
            $rapports = RapportAlerteSms::orderBy("id", "desc")->get();
            return view("Admin.Alerte.listeAlerte")
                ->with(["page" => "rapport-alerte", "rapports" => $rapports])
                ->with(["debut" => null])
                ->with(["fin" => null]);
        }

    }

    public function getDetailRapport(){

        if(isset($_GET)){

            $rapportID = $_GET["ref"];

            $rapport = RapportAlerteSms::where("id", $rapportID)->first();

            if($rapport != null){

                $details = RapportAlerteUser::where("rapport_alerte_sms_id", $rapport->id)->get();
                
                return view("Admin.Alerte.detailRapport")
                        ->with(["page" => "rapport-alerte", "details" => $details, "rapport" => $rapport]);
            }
            return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
        }

        return redirect()->back()->with(["error" => "Impossible d'afficher le détail du rapport, référence corrumpue"]);
    }
}
