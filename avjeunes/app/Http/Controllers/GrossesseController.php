<?php

namespace App\Http\Controllers;

use App\Annulation;
use App\Notifications\RepliedToThread;
use App\SuiviGrosesse;
use App\TypeUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Excel;

class GrossesseController extends Controller
{
    //

    public function vitrineGrossesse(){
        return view("SuiviGrossesse.indexVitrine");
    }
    public function index(){
        $grossesses = SuiviGrosesse::where("user_id", Auth::user()->id)->get();
        $grossesse = SuiviGrosesse::where("user_id", Auth::user()->id)->first();
        if($grossesse != null){
            $semaine = $grossesse->nbreSemaine;
            $date = new \DateTime();
            $to = new Carbon($grossesse->created_at);
            $from = new Carbon($date->format("Y-m-d"));
            $diff_in_week = $to->diffInWeeks($from);

            $diff_in_month = $to->diffInMonths($from);
            if($diff_in_month >= 9){
                $grossesse->terme = true;
                $grossesse->save();
            }
            return view("SuiviGrossesse.index")
                ->with(["grossesses" => $grossesses])
                ->with(["grossesse" => $grossesse])
                ->with(["otherWeek" => $diff_in_week])
                ->with(["page" => "suivi-grossesse"]);
        }else{
            return view("SuiviGrossesse.index")
                ->with(["grossesses" => $grossesses])
                ->with(["grossesse" => null])
                ->with(["otherWeek" => null])
                ->with(["page" => "suivi-grossesse"]);
        }
    }

    public function  postSuivi(Request $request){

        $suivi = new SuiviGrosesse();
        $suivi->dateRegle = $request["dateRegle"];
        $suivi->nbreSemaine = $request["nbreSemaine"];
        $suivi->suivi  = true;
        $suivi->user_id = Auth::user()->id;
        $suivi->save();

        /**
         * Notifier tous les administrateurs de ma demande de suivi de grossesse
         */

        $typeUser = TypeUser::where("libelle", "admin")->first();
        if($typeUser != null){
            $users = User::where("type_user_id", $typeUser->id)->get();
            foreach ($users as $user){
                $user->notify(new RepliedToThread("Demande de suivi de grossesse",Auth::user()));
            }
        }

        Session::put("suivi", true);
        return redirect()->back()->with(["message" => "Demande de suivi de grossesses prise en compte"]);
    }

    public function deleteSuiviGrossesse(Request $request){

        $grossesse = SuiviGrosesse::where("id", $request["id"])->first();
        if($grossesse != null){
            $annulation = new Annulation();
            $annulation->motif = $request["description"];
            $annulation->user_id = Auth::user()->id;
            $annulation->suivi = "grossesse";
            $annulation->save();
            $grossesse->delete();
            Session::put("suivi-annuler", true);
            return redirect()->back()->with(["message" => "Souscription de suivi de grossesse annulée"]);
        }
        return redirect()->back()->with(["error" => "Impossible d'annuler votre souscription"]);
    }

    /**
     * Administrateur suivi de grossesse
     */
    // suivi de grossesse
    public function getAdminSuiviGrossesse()
    {

        // if(isset($_GET["debut"]) && isset($_GET["fin"])) {

        //     $debut = $_GET["debut"];
        //     $fin = $_GET["fin"];

        //     if ($debut > $fin) {
        //         return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
        //     }

        //     $grossesses = SuiviGrosesse::where("created_at", ">=", $debut." 00:00:00")
        //                                 ->where("created_at", "<=", $debut." 23:59:59")->get();

        //     foreach ($grossesses as $grossesse){
        //         $date = new \DateTime();
        //         $to = new Carbon($grossesse->created_at);
        //         $from = new Carbon($date->format("Y-m-d"));
        //         $diff_in_month = $to->diffInMonths($from);
        //         if($diff_in_month >= 9){
        //             $grossesse->terme = true;
        //             $grossesse->save();
        //         }
        //     }
        //     $date = new \DateTime();
        //     return view("Admin.SuiviGrossesse.index")
        //         ->with(["grossesses" => $grossesses])
        //         ->with(["date" => $date])
        //         ->with(["debut" => $debut])
        //         ->with(["fin" => $fin])
        //         ->with(["page" => "suivi-grossesse"]);
        // }else{
        //     $grossesses = SuiviGrosesse::get();
        //     foreach ($grossesses as $grossesse){
        //         $date = new \DateTime();
        //         $to = new Carbon($grossesse->created_at);
        //         $from = new Carbon($date->format("Y-m-d"));
        //         $diff_in_month = $to->diffInMonths($from);
        //         if($diff_in_month >= 9){
        //             $grossesse->terme = true;
        //             $grossesse->save();
        //         }
        //     }
        //     $date = new \DateTime();
        //     return view("Admin.SuiviGrossesse.index")
        //         ->with(["grossesses" => $grossesses])
        //         ->with(["date" => $date])
        //         ->with(["debut" => null])
        //         ->with(["fin" => null])
        //         ->with(["page" => "suivi-grossesse"]);
        // }

    
        $page = 'suivi-grossesse';
        
        return view('Admin.SuiviGrossesse.index', compact('page'));
    }

    /**
     * @return $
     * Exporter le suivi de grossesse
     */

    public function  exportSuiviGrossesse(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $grossesses = $grossesses = SuiviGrosesse::where("created_at", ">=", $debut." 00:00:00")
                    ->where("created_at", "<=", $debut." 23:59:59")->get();

            }else{
                $grossesses = SuiviGrosesse::get();
            }

        }else{
            $grossesses = SuiviGrosesse::get();;
        }

        Excel::create('Suivi_Grossesse', function($excel) use($grossesses) {
            $excel->setTitle("Suivi de grossesse");

            $excel->sheet('ExportFile', function($sheet) use($grossesses) {

                $date = new \DateTime();

                $data[] = [];
                $from = new \Carbon\Carbon($date->format("Y-m-d"));
                foreach($grossesses as $grossesse) {
                    $to = new \Carbon\Carbon($grossesse->created_at);

                    $data[] = array(
                        \App\User::where("id", $grossesse->user_id)->first()->codeUser,
                        \App\User::where("id", $grossesse->user_id)->first()->username,
                        date_format(date_create($grossesse->dateRegle),"d M Y") ,
                        ($grossesse->nbreSemaine + $to->diffInWeeks($from))." semaine(s)",
                        ($grossesse->nbreSemaine + $to->diffInWeeks($from)) <= 41 ? "En cours" : "A terme"
                    );
                }

                $headings = array("Code User","Nom utilisateur", "Date dernière règle", 'Nombre semaine', "Statut grossesse");
                $sheet->row(1, $headings);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }



    public function getSuiviGrossesseAnnuler(){
        $annulations = Annulation::where("suivi", "grossesse")->get();

        return view("Admin.SuiviGrossesse.annulation")
            ->with(["annulations" => $annulations])
            ->with(["page" => "annuler-grossesse"]);
    }


}
