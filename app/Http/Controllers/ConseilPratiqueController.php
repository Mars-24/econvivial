<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use App\LikeConseil;
use App\ConseilPratique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ConseilPratiqueController extends Controller
{
    public function index()
    {
        $conseils = ConseilPratique::orderBy("id", "desc")->get();
        return view("Admin.ConseilPratique.index")
                ->with(["conseils" => $conseils])
                ->with(["page" => "conseil"]);
    }

    public function saveConseilPratique(Request $request){

        $this->validate($request, [
           "titre" => "required",
           "description" => "required",
        ]);

        $conseil = new ConseilPratique();
        $conseil->titre = $request["titre"];
        $conseil->description = $request["description"];

        // Bannière
        $banniere= $request->file('banniere');

        if($banniere){
            $extension = $banniere->getClientOriginalExtension();
            $nomPiece = time()."banniere.".$extension;
            Storage::disk('banniere')->put($nomPiece,File::get($banniere));
            $conseil->banniere = $nomPiece;
        }

        // Image
        $image= $request->file('image');

        if($image){
            $extension = $image->getClientOriginalExtension();
            $nomPiece = time()."image.".$extension;
            Storage::disk('img')->put($nomPiece,File::get($image));
            $conseil->image = $nomPiece;
        }

                // Big Image
        $bigImage= $request->file('bigImage');

        if($bigImage){
            $extension = $bigImage->getClientOriginalExtension();
            $nomPiece = time()."BigImage.".$extension;
            Storage::disk('img')->put($nomPiece,File::get($bigImage));
            $conseil->bigImage = $nomPiece;
        }

        // Pdf
        $pdf= $request->file('pdf');

        if($pdf){
            $extension = $pdf->getClientOriginalExtension();
            $nomPiece = time()."pdf.".$extension;
            Storage::disk('pdf')->put($nomPiece,File::get($pdf));
            $conseil->pdf = $nomPiece;
        }

        // Pdf
        $audio= $request->file('audio');

        if($audio){
            $extension = $audio->getClientOriginalExtension();
            $nomPiece = time()."audio.".$extension;
            Storage::disk('audio')->put($nomPiece,File::get($audio));
            $conseil->audio = $nomPiece;
        }

        $conseil->save();
        return redirect()->back()->with(["message" => "Conseil pratique enrégistrer avec succès"]);
    }

    public function detailConseilPratique(){
        if( isset($_GET)){
            $id = $_GET["ref"];
            $conseil = ConseilPratique::where("id", $id)->first();
            if($conseil == null){
                return redirect()->back();
            }
            return view("Admin.ConseilPratique.detailConseilPratique")->with(["conseil" => $conseil]);
        }
        return redirect()->back();
    }

    public function deleteConseilPratique(Request $request){
        $conseil = ConseilPratique::where("id", $request["id"])->first();

         if($conseil == null){
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer"]);
         }
         $conseil->delete();
          return redirect()->back()->with(["message" => "Conseil pratique supprimé avec succès"]);
    }

    public function getConseilPratique(){
        return view("Conseil.conseilPratique")->with(["page" => "conseil"]);
    }

    public function getMobileIST(){
        return view("Conseil.Mobile.ist");
    }

        public function getMobileVih(){
        return view("Conseil.Mobile.vih");
    }

    public function getMobileDepistage(){
        return view("Conseil.Mobile.depistage");
    }

    public function getMobileChargeViral(){
        return view("Conseil.Mobile.charge");
    }

    public function getMobileCellule(){
        return view("Conseil.Mobile.cellule");
    }

    public function getMobilePreservatifMasculin(){
        return view("Conseil.Mobile.preservatifMasculin");
    }

    public function getMobilePreservatifFeminin(){
        return view("Conseil.Mobile.feminin");
    }


     /**
     * La suite
     */

    public function getMobileAbstinence(){
        return view("Conseil.Mobile.abstinence");
    }

    public function getMobileCycleMenstruel(){
        return view("Conseil.Mobile.cycleMenstruel");
    }

    public function getMobileGrossesse(){
        return view("Conseil.Mobile.grossesse");
    }

    public function getMobileHygiene(){
        return view("Conseil.Mobile.hygiene");
    }

    public function getMobilehymen(){
        return view("Conseil.Mobile.hymen");
    }


    /**
 * Like de conseils pratiques
 */
    public function getListeConseilLike(){

        $date = new \DateTime();
        if(isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if ($debut > $fin) {
                return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
            }

            $likes = LikeConseil::where("created_at", ">=", $debut." 00:00:00")
                                  ->where("created_at", "<=", $fin." 23:59:59")
                                  ->orderBy("id", "desc")->get();

            return view("Admin.ConseilPratique.likeConseil")
                ->with(["page" => "suivi-like"])
                ->with(["debut" => $debut])
                ->with(["fin" => $fin])
                ->with(["date" => new Carbon($date->format("Y-M-d"))])
                ->with(["likes" => $likes]);
        }else{
            $likes = LikeConseil::orderBy("id", "desc")->get();

            return view("Admin.ConseilPratique.likeConseil")
                ->with(["page" => "suivi-like"])
                ->with(["debut" => null])
                ->with(["fin" => null])
                ->with(["date" => new Carbon($date->format("Y-M-d"))])
                ->with(["likes" => $likes]);
        }
    }

        public function exportListeConseilLiker(){
        $date = new \DateTime();
        if(isset($_GET["debut"]) && isset($_GET["fin"])) {

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if ($debut > $fin) {
                return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
            }

        if($debut != null && $fin != null){

            $likes = LikeConseil::where("created_at", ">=", $debut." 00:00:00")
                                  ->where("created_at", "<=", $fin." 23:59:59")
                                  ->orderBy("id", "desc")->get();
        }else{
            $likes = LikeConseil::orderBy("id", "desc")->get();
            }
        }else{
            $likes = LikeConseil::orderBy("id", "desc")->get();
        }

       // return response()->json($likes);

        Excel::create('Conseil_Pratique_Liker', function($excel) use($likes) {
            $excel->setTitle("Likes de conseils pratiques");
            $excel->sheet('ExportFile', function($sheet) use($likes) {

                foreach($likes as $like) {
                    $data[] = array(
                        $like->telephone ,
                        $like->sexe,
                        $like->age,
                        $like->profession,
                        $like->region,
                        $like->conseilpratique->titre,
                        date_format(date_create($like->created_at), "d/m/Y")
                        );
                }

                $headings = array('N° Téléphone', 'Sexe', 'Age','Profession', "Region", "Thème","Date");
                $sheet->row(1, $headings);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }
}
