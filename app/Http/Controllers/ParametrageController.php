<?php

namespace App\Http\Controllers;

use App\Association;
use App\ContenuEntretien;
use App\Ecole;
use App\Region;
use App\TypeEntretien;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ParametrageController extends Controller
{
    //

    /**
     * Gestion des etablissements scolaires
     */

    public function getEtablissementForm(){


        $regions = Region::all();
        $etablissements = Ecole::orderBy("id", "desc")->get();
        return view("Parametrage.etablissement")
                    ->with(["page" => "etablissement"])
                    ->with(["regions" => $regions])
                    ->with(["etablissements" => $etablissements]);
    }

    public function postEtablissementScolaire(Request $request){

        $this->validate($request, [
            "region" => "required",
            "nom" => "required",
        ]);

        try{
            $ecole = new Ecole();
            $ecole->libelle = $request["nom"];
            $ecole->region_id = $request["region"];
            $ecole->save();
            return redirect()->back()->with(["message" => "Etablissement enrégistré avec succès"]);
        }catch (\Exception $e){
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de sauvegarder cet établissement"]);
        }
    }

    public function  postEditEtablissementScolaire(Request $request){

        $ecole = Ecole::where("id", $request["id"])->first();

        if($ecole != null){
            try{
                $ecole->libelle = $request["nom"];
                $ecole->region_id = $request["region"];
                $ecole->save();

                return redirect()->back()->with(["message" => "Etablissement modifié avec succès"]);
            }catch (\Exception $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier cet établissement"]);
            }
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier cet établissement"]);
    }

    public function postDeleteEtablissementScolaire(Request $request){

        $ecole = Ecole::where("id", $request["id"])->first();
        if($ecole != null){
            try{
                $ecole->delete();
                return redirect()->back()->with(["message" => "Etablissement supprimé avec succès"]);
            }catch (QueryException $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer cet établissement, l'établissement est déjà utilisé par une entité."]);
            }catch (Exception $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer cet établissement."]);
            }
        }
    }




    /**
     *  Gestion des association / ONG
     */

    public function getAssociationForm(){
        $regions = Region::all();
        $associations = Association::orderBy("id", "desc")->get();
        return view("Parametrage.association")
            ->with(["page" => "association"])
            ->with(["regions" => $regions])
            ->with(["associations" => $associations]);
    }

    public function postSaveAssociation(Request $request){

        $this->validate($request, [
            "region" => "required",
            "nom" => "required",
        ]);

        try{
            $association = new Association();
            $association->libelle = $request["nom"];
            $association->region_id = $request["region"];
            $association->save();
            return redirect()->back()->with(["message" => "Association enrégistré avec succès"]);
        }catch (\Exception $e){
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de sauvegarder cette association"]);
        }
    }

    public function  postEditAssociation(Request $request){

        $association = Association::where("id", $request["id"])->first();

        if($association != null){
            try{
                $association->libelle = $request["nom"];
                $association->region_id = $request["region"];
                $association->save();

                return redirect()->back()->with(["message" => "Association modifié avec succès"]);
            }catch (\Exception $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier cette association"]);
            }
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de modifier cette association"]);
    }

    public function postDeleteAssociation(Request $request){

        $association = Association::where("id", $request["id"])->first();
        if($association != null){
            try{
                $association->delete();
                return redirect()->back()->with(["message" => "Association supprimé avec succès"]);
            }catch (QueryException $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer cette association, l'établissement est déjà utilisé par une entité."]);
            }catch (Exception $e){
                return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer cette association."]);
            }
        }
    }


    /**
     * Type entretien
     */

    public function getTypeEntretienForm(){

        $types = TypeEntretien::all();
        return view("Parametrage.typeEntretien")
                    ->with(["page" => "type-entretien"])
                    ->with(["types" => $types]);
    }


    public function  postSaveTypeEntretien(Request $request){

        $type = new TypeEntretien();
        $type->libelle = $request["type"];
        $type->save();
        return redirect()->back()->with(["message" => "Type d'entretien créer avec succès"]);
    }

    public function  postEditTypEntretien(Request $request){

        $type = TypeEntretien::where("id", $request["id"])->first();
        if($type != null){
            $type->libelle = $request["type"];
            $type->save();
            return redirect()->back()->with(["message" => "Type d'entretien modifié avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier le type d'entretien"]);

    }

    public function  postDeleteTypeEntretien(Request $request){

        $type = TypeEntretien::where("id", $request["id"])->first();
        if($type != null){
            $type->delete();
            return redirect()->back()->with(["message" => "Type d'entretien supprimer avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer le type d'entretien"]);

    }

    /**
     * Contenu d'entretien
     */

    public function getContenuEntretienForm(){

        $types = TypeEntretien::all();
        $contenus = ContenuEntretien::orderBy("id", "desc")->get();
        return view("Parametrage.contenuEntretien")
            ->with(["page" => "contenu-entretien"])
            ->with(["types" => $types])
            ->with(["contenus" => $contenus]);
    }


    public function  postSaveContenuEntretien(Request $request){

        $contenu = new ContenuEntretien();
        $contenu->contenu = $request["contenu"];
        $contenu->type_entretien_id = $request["type"];

        $contenu->save();
        return redirect()->back()->with(["message" => "Contenu d'entretien créer avec succès"]);
    }

    public function  postEditContenuEntretien(Request $request){

        $contenu = ContenuEntretien::where("id", $request["id"])->first();
        if($contenu != null){
            $contenu->contenu = $request["contenu"];
            $contenu->type_entretien_id = $request["type"];
            $contenu->save();
            return redirect()->back()->with(["message" => "Contenu d'entretien modifié avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier le contenu d'entretien"]);

    }

    public function  postDeleteContenuEntretien(Request $request){

        $contenu = ContenuEntretien::where("id", $request["id"])->first();
        if($contenu != null){
            $contenu->delete();
            return redirect()->back()->with(["message" => "Contenu d'entretien supprimer avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer le contenu d'entretien"]);
    }
}
