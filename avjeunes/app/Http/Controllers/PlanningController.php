<?php

namespace App\Http\Controllers;

use App\PlanningSouscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    //

    public function index(){
        return view("Planning.index");
    }

    public function getMethodeNaturelle(){
    	return view("Planning.methodeNaturelle")->with(["page" => "planning-naturelle"]);
    }

    public function getMethodeModerne(){
        return view("Planning.methodeModerne")->with(["page" => "planning-moderne"]);
    }
    
    
        /**
     * Le planning mobile moderne
     */

    public function getCondomFeminin(){
        return view("Planning.Mobile.Moderne.condomFeminin");
    }

    public function getCondomMasculin(){
        return view("Planning.Mobile.Moderne.condomMasculin");
    }

    public function getContraception(){
        return view("Planning.Mobile.Moderne.contraception");
    }

    public function getDiu(){
        return view("Planning.Mobile.Moderne.diu");
    }

    public function getInjectable(){
        return view("Planning.Mobile.Moderne.injectable");
    }


    public function getLigature(){
        return view("Planning.Mobile.Moderne.ligature");
    }

    public function getNorplan(){
        return view("Planning.Mobile.Moderne.norplan");
    }

    public function getObstruction(){
        return view("Planning.Mobile.Moderne.obstruction");
    }

    public function getPillule(){
        return view("Planning.Mobile.Moderne.pillule");
    }

    public function getVasectomie(){
        return view("Planning.Mobile.Moderne.vasectomie");
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Méthode natural
     */

    public function getAbstinence(){
        return view("Planning.Mobile.Natural.abstinence");
    }

    public function getAllaitement(){
        return view("Planning.Mobile.Natural.allaitement");
    }

    public function getGlaire(){
        return view("Planning.Mobile.Natural.glaire");
    }

    public function getJourFixe(){
        return view("Planning.Mobile.Natural.jourFixe");
    }

    public function getTemperature(){
        return view("Planning.Mobile.Natural.temperature");
    }
    
        public function savePlanningSouscription(Request $request){
        $planningSouscription = PlanningSouscription::where("user_id",Auth::user()->id)
                                ->where("planning_id",$request["planning"])
                                ->first();
        if($planningSouscription != null){
            return "exist";
        }
        $planningSouscription = new PlanningSouscription();
        $planningSouscription->dateContraception = $request["date"];
        $planningSouscription->dureeContraception = $request["duree"];
        $planningSouscription->planning_id = $request["planning"];
        $planningSouscription->user_id = Auth::user()->id;
         $planningSouscription->methode = $request["methode"];
        $planningSouscription->save();
        return "success";
    }
    
        public function saveMobilePlanningSouscription(Request $request){
        $planningSouscription = PlanningSouscription::where("user_id",$request["userID"])
            ->where("planning_id",$request["planning"])
            ->first();
        if($planningSouscription != null){
            return "exist";
        }

        $planningSouscription = new PlanningSouscription();
        $planningSouscription->dateContraception = $request["date"];
        $planningSouscription->dureeContraception = $request["duree"];
        $planningSouscription->planning_id = $request["planning"];
        $planningSouscription->user_id = $request["userID"];
        $planningSouscription->methode = $request["methode"];
        $planningSouscription->save();
        return "success";
    }
}
