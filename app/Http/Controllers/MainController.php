<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Region;
use App\ActiviteeConvivial;
use App\ConseilPratique;
use App\LikeConseil;
use App\QuizModule;
use App\QuizQuestion;
use App\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{

    //
    public function index(){
    	return View("Main.index");
    }
    
    public function politique(){
        return View("Main.politique");
    }
    
	public function activiteeConvivial(){
        $activites = ActiviteeConvivial::orderBy("id", "desc")->get();
        return view("Activite.vitrineActivite")->with(["activites" => $activites])->with(["page" => "activites"]);
    }

	public function conseilPratique(){
        $conseils = ConseilPratique::orderBy("id", "asc")->get();
        return view("Conseil.vitrineConseil")->with(["conseils" => $conseils])->with(["page" => "conseil"]);
    }

    public function getContact(){
        return view("Contact.vitrineContact")->with(["page" => "contact"]);
    }

    public function getWebTv(){
        return view("WebTv.index");
    }

    public function exemple(){
        return view("Main.example");
    }

    public function main(){
        return view("Main.main");
    }

    public function getNewContact(){
        return view("Contact.contact");
    }

    //Les fonctions du site virtirn
    public function getNewVitrine(){
        return view("Main.vitrine")->with(["page" => "accueil"]);
    }

    public function getNewConsultation(){
        return view("Consultation.vitrineConsultation")->with(["page" => "service"]);
    }

    public function getNewSuiviGrossesse(){
        return view("SuiviGrossesse.vitrineSuivi")->with(["page" => "service"]);
    }

    public function getPlanningFamilial(){
        return view("Planning.vitrinePlanning")->with(["page" => "service"]);
    }

    public function getAssistanceLigne(){
        return view("AssistanceLigne.vitrineAssistance")->with(["page" => "service"]);
    }

    public function getSuiviCycle(){
        return view("CycleMenstruel.vitrineCycle")->with(["page" => "service"]);
    }
	
	public function detailActivite(){

		if(isset($_GET)){
            $id = $_GET["ref"];
            $activites = ActiviteeConvivial::where("id", $id)->first();
            if($activites != null){
                return view("Activite.detailActivite")->with(["activites" => $activites])->with(["page" => "activites"]);
            }
            return redirect()->back();
        }
		
    }


    public function getConseilPratique(){
        return view("Conseil.vitrineConseil")->with(["page" => "conseil"]);
    }
  //Les détails de conseils pratiques
    public function getConseilConsultation(){

        $conseilPratique = ConseilPratique::where("code", "IST")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();


        return view("Conseil.conseilConsultation")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilVih(){

        $conseilPratique = ConseilPratique::where("code", "VIH")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilVih")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function  agenda(){
        $agendas = Agenda::orderBy("id", "desc")->get();
        return view("Agenda.vitrineAgenda")->with(["page" => "agenda"])->with(["agendas" => $agendas]);
    }

    public function  detailAgenda(){
        if(isset($_GET)){
            $id = $_GET["ref"];
            $agenda = Agenda::where("id", $id)->first();
            if($agenda != null){
                return view("Agenda.detailAgenda")->with(["agenda" => $agenda])->with(["page" => "agenda"]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function getConseilDepistage(){
        $conseilPratique = ConseilPratique::where("code", "DPT")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();


        return view("Conseil.conseilDepistage")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilPreservatifMasculin(){
        $conseilPratique = ConseilPratique::where("code", "PM")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilPreservatifMasculin")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilPreservatifFeminin(){
        $conseilPratique = ConseilPratique::where("code", "PF")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();
        return view("Conseil.conseilPreservatifFeminin")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilHymen(){
        $conseilPratique = ConseilPratique::where("code", "HM")->first();

        $user = null;
        $regions = Region::orderBy("libelle", "asc")->get();
        return view("Conseil.conseilHymen")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilCycleMesntruel(){

        $conseilPratique = ConseilPratique::where("code", "CM")->first();

        $user = null;
     $regions = Region::orderBy("libelle", "asc")->get();


        return view("Conseil.conseilCycleMenstruel")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilHygiene(){

        $conseilPratique = ConseilPratique::where("code", "HSM")->first();

        $user = null;

        $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilHygiene")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilGrossesse(){

        $conseilPratique = ConseilPratique::where("code", "GPD")->first();

        $user = null;
             $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilGrossesse")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilAbstinence(){

        $conseilPratique = ConseilPratique::where("code", "AS")->first();

        $user = null;

     $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilAbstinence")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilCellule(){
        $conseilPratique = ConseilPratique::where("code", "CD4")->first();

        $user = null;

       $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilCellule")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function getConseilChargeVirale(){

        $conseilPratique = ConseilPratique::where("code", "CV")->first();

        $user = null;

     $regions = Region::orderBy("libelle", "asc")->get();

        return view("Conseil.conseilViral")
            ->with(["user" => $user])
            ->with(["regions" => $regions])
            ->with(["conseil" => $conseilPratique])
            ->with(["page" => "conseil"]);
    }

    public function postSaveReadConseil(Request $request){

        $like = new LikeConseil();
        $like->like = true;
        $like->conseil_pratique_id = $request["conseil"];

        $like->telephone = $request["telephone"];
        $like->sexe = $request["sexe"];
        $like->age = $request["age"];
        $like->profession = $request["profession"];
        $like->region = $request["region"];

        $like->save();

        return "true";
    }
    
    
    public function getQuiz(){
        $modules = QuizModule::where("actif", true)->orderBy("libelle", "asc")->get();
        return view("Quiz.vitrineQuiz")->with(["page" => "jeux"])
            ->with(["modules" => $modules]);
    }


    public function getQuizListeQuestion(){
        if(isset($_GET)){
            $id = $_GET["ref"];
            $module = QuizModule::where("id", $id)->first();
            if($module != null){
                $questions = QuizQuestion::where("quiz_module_id", $module->id)->get();
                return view("Quiz.listeQuestion")
                    ->with(["page" => "jeux"])
                    ->with(["module" => $module])
                    ->with(["questions" => $questions]);
            }

            return redirect()->back()->with(["error" => "Impossible de consulter la liste des questions"]);
        }
    }

    public function saveQuizResponse(){
        $result["message"] = "";
        $result["error"]  = false;

        if(isset($_GET)){
            $identifiant = Auth::user()->id;

            $question = $_GET["question"];
            $reponse = $_GET["reponse"];
            $module = $_GET["module"];

            $type = $_GET["type"];
            $trouver = $_GET["trouver"];
            $point = $_GET["point"];

            //Vérification si l'utilisateur n'a as déjà répondu à cette question

            $quiz = QuizResult::where("user_id", $identifiant)
                ->where("quiz_question_id", $question)
                ->where("quiz_module_id", $module)
                ->first();

            if($quiz != null){
                $result["message"] = "Question déjà répondu";
                $result["error"]  = true;
                return "deja";
            }else{
                $quiz = new QuizResult();
                $quiz->question = $question;
                $quiz->reponse = $reponse;
                $quiz->module = $type;
                $quiz->trouver = $trouver;
                $quiz->point = $point;
                $quiz->quiz_question_id = $question;
                $quiz->quiz_module_id = $module;
                $quiz->user_id = $identifiant;
                $quiz->save();

                $result["message"] = "Résultat enrégistré";
                $result["error"]  = false;
                return "reponse";
            }
        }
    }

}
