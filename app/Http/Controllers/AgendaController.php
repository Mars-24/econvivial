<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\AgendaBanniere;
use App\RoseBleuUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    //

    public function getAgendaForm(){
        $agendas = Agenda::orderBy("id", "desc")->get();
        return view("Admin.Agenda.index")->with(["page" => "agenda"])->with(["agendas" => $agendas]);
    }

    public function postSaveAgenda(Request $request){

        $agenda = new Agenda();
        $agenda->titre = $request["titre"];
        $agenda->description = $request["description"];

        // Image agenda
        $image= $request->file('image');

        if($image){
            $extension = $image->getClientOriginalExtension();
            $nomPiece = time()."agenda.".$extension;
            Storage::disk('agenda')->put($nomPiece,File::get($image));
            $agenda->imageAgenda = $nomPiece;
           // return redirect()->back()->with(["message" => "Evènement marqué dans l'agenda"]);
        }

        //Bannière agenda
        $image= $request->file('banniere');

        if($image){
            $extension = $image->getClientOriginalExtension();
            $nomPiece = time()."agenda_banniere.".$extension;
            Storage::disk('agenda')->put($nomPiece,File::get($image));
            $agenda->banniereAgenda = $nomPiece;
        }
        $agenda->save();
        return redirect()->back()->with(["message" => "Evènement marqué dans l'agenda"]);

       // return redirect()->back()->with(["message" => "Evènement marqué dans l'agenda sans l'image attachée"]);
    }

    public function postEditSaveAgenda(Request $request){

        $agenda = Agenda::where("id", $request["id"])->first();
        if($agenda != null){

            $oldImageName = $agenda->imageAgenda;
            $oldImageBanniere = $agenda->banniereAgenda;

            $agenda->titre = $request["titre"];
            $agenda->description = $request["description"];

            // Image agenda
            $image= $request->file('image');

            if($image){
                unlink(public_path("/uploads/agenda/").$oldImageName);
                $extension = $image->getClientOriginalExtension();
                $nomPiece = time()."agenda.".$extension;
                Storage::disk('agenda')->put($nomPiece,File::get($image));
                $agenda->imageAgenda = $nomPiece;
            }

            // Banniere agenda
            $image= $request->file('banniere');

            if($image){
                unlink(public_path("/uploads/agenda/").$oldImageName);
                $extension = $image->getClientOriginalExtension();
                $nomPiece = time()."agenda_banniere.".$extension;
                Storage::disk('agenda_')->put($nomPiece,File::get($image));
                $agenda->banniereAgenda = $nomPiece;
            }

            $agenda->save();

            return redirect()->back()->with(["message" => "Agenda modifié avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier"]);

    }

    public function deleteAgenda(Request $request){

        $agenda = Agenda::where("id", $request["id"])->first();
        if($agenda != null){
            $oldImageName = $agenda->imageAgenda;
            try{
                unlink(public_path("/uploads/agenda/").$oldImageName);
                $agenda->delete();
                return "Suppression effectuée avec succès";
            }catch(\Exception $exception){
                return "false";
            }
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer"]);

    }


    /**
     * Bannière agenda
     */

    public function getAgendaBanniereForm(){
        $agendas = AgendaBanniere::orderBy("id", "desc")->get();
        return view("Admin.Agenda.banniere")->with(["page" => "bannierre-agenda"])->with(["agendas" => $agendas]);
    }

    public function postSaveAgendaBanniere(Request $request){

        $agenda = new Agenda();
        $agenda->titre = $request["titre"];
        $agenda->description = $request["description"];

        // Image agenda
        $image= $request->file('image');

        if($image){
            $extension = $image->getClientOriginalExtension();
            $nomPiece = time()."agenda_banniere.".$extension;
            Storage::disk('agenda')->put($nomPiece,File::get($image));
            $agenda->imageAgenda = $nomPiece;

            $agenda->save();
            return redirect()->back()->with(["message" => "Evènement marqué dans l'agenda"]);
        }
        $agenda->save();
        return redirect()->back()->with(["message" => "Evènement marqué dans l'agenda sans l'image attachée"]);
    }

    public function postEditSaveAgendaBanniere(Request $request){

        $agenda = Agenda::where("id", $request["id"])->first();
        if($agenda != null){

            $oldImageName = $agenda->imageAgenda;

            $agenda->titre = $request["titre"];
            $agenda->description = $request["description"];

            // Image agenda
            $image= $request->file('image');

            if($image){
                unlink(public_path("/uploads/agenda/").$oldImageName);
                $extension = $image->getClientOriginalExtension();
                $nomPiece = time()."agenda_banniere.".$extension;
                Storage::disk('agenda')->put($nomPiece,File::get($image));
                $agenda->imageAgenda = $nomPiece;
            }

            $agenda->save();
            return redirect()->back()->with(["message" => "Agenda modifié avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier"]);

    }

    public function deleteAgendaBanniere(Request $request){

        $agenda = Agenda::where("id", $request["id"])->first();
        if($agenda != null){
            $oldImageName = $agenda->imageAgenda;
            try{
                unlink(public_path("/uploads/agenda/").$oldImageName);
                $agenda->delete();
                return "Suppression effectuée avec succès";
            }catch(\Exception $exception){
                return "false";
            }
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer"]);

    }
    
    
    

    /**
     * Soirée spécial rose bleue
     */

    public function getRoseBleuePage(){

        $estInscris = Session::get("inscris");
        return view("Agenda.rosebleue")->with(["page" => "agenda"])->with(["inscris" => $estInscris]);
    }

    public function sendInscriptionRoseBleue(Request $request){

        $this->validate($request,[
           "telephone" => "required | regex:/[0-9]{8}/"
        ]);
        $userRoseBleue = new RoseBleuUser();
        $userRoseBleue->nom = $request["nom"];
        $userRoseBleue->prenom = $request["prenom"];
        $userRoseBleue->telephone = $request["telephone"];
        $userRoseBleue->typeInscription = $request["typeInscription"];
        $userRoseBleue->frais = $request["frais"];
        $userRoseBleue->echo = $request["echo"];

        if($request["echo"] == 1){
            $userRoseBleue->total = $request["frais"] + 3000;
        }else{
            $userRoseBleue->total = $request["frais"] + 0;
        }

        $userRoseBleue->save();

        Session::put("inscris", true);
        Session::put("inscris-alerte", true);
        Session::put("inscris-message", "Merci pour votre inscription à la grande soirée Roz'Bleue.");
        return redirect()->back()->with(["message" => "Merci pour votre inscription à la grande soirée Roz'Bleu."]);

    }

    public function getListeInscris(){

        $users = RoseBleuUser::get();
        $montantTotal = DB::select("select sum(total) as total from rose_bleu_users");
        $partRod = DB::select("select sum(frais) as total from rose_bleu_users");

        return view("Admin.Agenda.listeUserRoseBleue")
                ->with(["page" => "soiree-rose-bleue"])
                ->with(["montantTotal" => $montantTotal])
                ->with(["partRod" => $partRod])
                ->with(["users" => $users]);
    }


}
