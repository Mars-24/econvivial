<?php

namespace App\Http\Controllers;

use App\QuizModule;
use App\QuizQuestion;
use App\QuizQuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\QuizResult;

class QuizApiController extends Controller
{
    //
    //
    public function getQizTheme(){
        $result["modules"] = [];
        $result["error"]  = false;
        $result["pointTotal"]  = 0;

        $pointTotal = 0;
        if(isset($_GET)){
            $userID = $_GET["id"];
            $total = DB::select("select SUM(point) as point from quiz_results where user_id = ".$userID);
            if(count($total) > 0){
                $pointTotal = $total[0]->point != null ? $total[0]->point :  0;
            }else{
                $pointTotal = 0;
            }

            $result["pointTotal"]  = $pointTotal;

            $modules = QuizModule::where("actif", true)->orderBy("libelle", "asc")->get();

            $finalModule = array();
            foreach ($modules as $module){
                $mod = array();
                $mod["id"] = $module->id;
                $mod["libelle"] = $module->libelle;
                $mod["description"] = $module->description;
                $mod["actif"] = $module->actif;
                $quizPointByModule = DB::select("select SUM(point) as point from quiz_results where user_id = ".$userID." and quiz_module_id = ".$module->id);

                if(count($quizPointByModule) > 0){
                    $mod["pointMarquer"] = $quizPointByModule[0]->point != null ? $quizPointByModule[0]->point : 0;
                }else{
                    $mod["pointMarquer"] = 0;
                }

                    array_push($finalModule, $mod);
            }
            $result["modules"] = $finalModule;
            return response()->json($result);
        }
        return response()->json($result);
    }

    public function getQuizQuestions($id){
        $result["questionQuiz"] = [];
        $result["error"]  = false;
            $module = QuizModule::where("id", $id)->first();
            if($module != null){
                $questions = QuizQuestion::where("quiz_module_id", $module->id)->get();
                $data["question"]["reponses"] = array();
                $finalData = array();
                foreach ($questions as $question){
                    $data = $question;
                    $reponses = QuizQuestionDetail::where("quiz_question_id", $question->id)->get();
                    $data["reponses"] = $reponses;
                    array_push($finalData, $data);
                }
                $result["questionQuiz"] = $finalData;
                return response()->json($result);
            }
    }
    
    
    
    //
    public function saveQuizResponse(){
        $result["message"] = "";
        $result["error"]  = false;

        if(isset($_GET)){
            $identifiant = $_GET["identifiant"];

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
                return response()->json($result);
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
                return response()->json($result);
            }
        }
    }

}
