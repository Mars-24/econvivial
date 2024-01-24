<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use App\QuizModule;
use App\QuizResult;
use App\QuizQuestion;
use App\QuizQuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    //
    public function saveQuizRequest(){
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
                                ->where("question", $question)
                                ->where("module ", $type)
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
               // $quiz->quiz_question_id = $question;
               // $quiz->quiz_module_id = $module;
                $quiz->user_id = $identifiant;
                $quiz->save();

                $result["message"] = "Résultat enrégistré";
                $result["error"]  = false;
                return response()->json($result);
            }
        }
    }

    // Page d'administration de QUiz
    public function getQuizPage()
    {

        // if(isset($_GET["debut"]) && isset($_GET["fin"])) {

        //     $debut = $_GET["debut"];
        //     $fin = $_GET["fin"];

        //     if ($debut > $fin) {
        //         return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
        //     }

        //     $users = DB::select("select u.* , SUM(point) as point 
        //                          from quiz_results q, users u 
        //                          where q.user_id = u.id 
        //                          and q.created_at BETWEEN '".$debut." 00:00:00' and '".$fin." 23:59:59'
        //                          group by q.user_id ");

        //     $date = new \DateTime();
        //     return view("Quiz.adminQuiz")
        //         ->with(["users" => $users])
        //         ->with(["debut" => $debut])
        //         ->with(["fin" => $fin])
        //         ->with(["date" => new Carbon($date->format("Y-M-d"))])
        //         ->with(["page" => "result-quiz"]);

        // }else{
        //     $users = DB::select("select u.* , SUM(point) as point from quiz_results q, users u where q.user_id = u.id group by q.user_id ");
        //     $date = new \DateTime();
        //     return view("Quiz.adminQuiz")
        //         ->with(["users" => $users])
        //         ->with(["debut" => null])
        //         ->with(["fin" => null])
        //         ->with(["date" => new Carbon($date->format("Y-M-d"))])
        //         ->with(["page" => "result-quiz"]);
        // }
        
        $page = 'result-quiz';
        
        return view('Quiz.adminQuiz', compact('page'));
        //         ->with(["users" => $users])
        //         ->with(["debut" => null])
        //         ->with(["fin" => null])
        //         ->with(["date" => new Carbon($date->format("Y-M-d"))])
        //         ->with(["page" => "result-quiz"]);
    }

    public function getDetailQuiz(){
        if(isset($_GET)){

            $id = $_GET["id"];

            $quiz = QuizResult::where("user_id", $id)->orderBy("id", "desc")->get();

           /* $modules = DB::select("select distinct module, user_id from quiz_results where user_id = ".$id);

            return view("Quiz.adminDetailQuiz")
                     ->with(["users" => $quiz])
                     ->with(["modules" => $modules])
                     ->with(["page" => "result-quiz"]);  */
                     
           $modules = DB::select("select * from quiz_modules where id in(select distinct quiz_module_id from quiz_results where user_id = $id)");
           //return json_encode($modules);
            return view("Quiz.adminDetailQuiz")
                     ->with(["users" => $quiz])
                     ->with(["userID" => $id])
                     ->with(["modules" => $modules])
                     ->with(["page" => "result-quiz"]);
        }
    }


    //Exporter le Quiz

    public function exportQuizToExcel(){
        if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $quizs = DB::select("select u.* , SUM(point) as point 
                                 from quiz_results q, users u 
                                 where q.user_id = u.id 
                                 and q.created_at BETWEEN '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                 group by q.user_id ");
            }else{
                $quizs = DB::select("select u.* , SUM(point) as point from quiz_results q, users u where q.user_id = u.id group by q.user_id ");
            }

        }else{
            $quizs = DB::select("select u.* , SUM(point) as point from quiz_results q, users u where q.user_id = u.id group by q.user_id ");
        }

        Excel::create('Resulta_Quiz', function($excel) use($quizs) {
            $excel->setTitle("Quizs");
            $excel->sheet('ExportFile', function($sheet) use($quizs) {

                $date = new \DateTime();
                $dateJour = new Carbon($date->format("Y-M-d"));

                foreach($quizs as $quiz) {
                    $data[] = array(
                        $quiz->codeUser,
                        $quiz->username != null ? $quiz->username  : "Non défini" ,
                        $quiz->numero,
                        $quiz->sexe == "M" ? "Masculin" : "Féminin",
                        $dateJour->diffInYears(new \Carbon\Carbon($quiz->datenaissance)) == null ? 0 : $dateJour->diffInYears(new \Carbon\Carbon($quiz->datenaissance)) ,
                        $quiz->point
                    );
                }

                $headings = array("Code User","Nom utilisateur", "Téléphone", "Sexe", "Age", "Point");
                $sheet->row(1, $headings);
                $sheet->fromArray($data);
            });
        })->export('xlsx');

        return redirect()->back()->with(["message" => "Fichier exporté"]);
    }

    /**
     * Afficher la page des thématiques
     * de QUIZ
     */

    public function getQuizThemePage(){
        $quizModules = QuizModule::orderBy("id", "desc")->get();

        return view("Quiz.newQuizModule")
            ->with(["modules" => $quizModules])
            ->with(["page" => "new-quiz-module"]);
    }

    public function saveNewQuiz(Request $request){

        $moduleQuiz = new QuizModule();
        $moduleQuiz->libelle = strtoupper($request["theme"]);
        $moduleQuiz->description = $request["description"];
        $moduleQuiz->save();

        return redirect()->back()->with(["message" => "Thème enrégistrer avec succès"]);
    }

    public function deleteQuiz(Request $request){

        $moduleQuiz = QuizModule::where("id", $request["id"])->first();
        if($moduleQuiz != null){
            $moduleQuiz->delete();
            return redirect()->back()->with(["message" => "Quiz supprimer"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer"]);
    }

    /**
     * Afficher les questions associées à un QUIZ
     */

    public function addNewQuestion(Request $request){

        $question = new QuizQuestion();
        $question->libelle = $request["question"];
        $question->quiz_module_id = $request["quizModule"];
        $question->pointTotal = 0;
        $question->save();

        return redirect()->back()->with(["message" => "Question enrégistrée avec succès"]);
    }

    public function showQuizQuestions(){
        if(isset($_GET)){
            $id = $_GET["ref"];
            $module = QuizModule::where('id', $id)->first();
            if($module != null){
                $quizQuestions = QuizQuestion::where("quiz_module_id",$id)->orderBy("id", "desc")->get();

                return view("Quiz.detailAddNewQuiz")
                    ->with(["questions" => $quizQuestions])
                    ->with(["quizModule" => $id])
                    ->with(["module" => $module])
                    ->with(["page" => "new-quiz-module"]);
            }
            return redirect()->back()->with(["error" => "Référence corrumpue, impossible de récupérer les questions"]);
        }
        return redirect()->back()->with(["error" => "Impossible de récupérer les questions"]);
    }

    public function deteleQuestion(Request $request){
        $question = QuizQuestion::where('id', $request["id"])->first();
        if($question != null){
            $question->delete();
            return redirect()->back()->with(["message" => "Question supprimer"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer"]);
    }

    public function deteleElmtReponse(Request $request){
        $reponse = QuizQuestionDetail::where('id', $request["id"])->first();
        if($reponse != null){
            $reponse->delete();
            return redirect()->back()->with(["message" => "Réponse supprimer"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer"]);
    }

    public function addElementReponse(Request $request){

        $question = QuizQuestion::where('id', $request["questionID"])->first();
        if ($question != null){

            $elmtReponse = new QuizQuestionDetail();
            $elmtReponse->libelle = $request["reponse"];
            $elmtReponse->notification = $request["notification"];
            $elmtReponse->isReponse = $request["choixReponse"];
            $elmtReponse->point = $request["point"];
            $elmtReponse->quiz_question_id = $request["questionID"];

            $elmtReponse->save();

            return redirect()->back()->with(["message" => "Element de réponse enrégistrer avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible d'ajouter l'élément de réponse"]);
    }

    public function activeQuiz(Request $request){

        $module = QuizModule::where("id", $request["id"])->first();
        if($module != null){
           if($module->actif){
               $module->actif = false;
           }else{
               $module->actif = true;
           }
           $module->save();
           return redirect()->back()->with(["message" => "Etat du Quiz modifié"]);
        }
    }


    /**
     * Gestion du QUIZ partie user
     */

    public function getUserQuizPage(){
        $modules = QuizModule::where("actif", true)->orderBy("libelle", "asc")->get();
        return view("Quiz.dashQuiz")
            ->with(["page" => "quiz"])
            ->with(["modules" => $modules]);
    }

    public function playDashQuiz(){
        $id = $_GET["ref"];
        $module = QuizModule::where("id", $id)->first();
        
            $total = DB::select("select SUM(point) as point from quiz_results where user_id = ".Auth::user()->id." and quiz_module_id =".$module->id);

            if(count($total) > 0){
                $pointTotal = $total[0]->point != null ? $total[0]->point :  0;
            }else{
                $pointTotal = 0;
            }
            
        if($module != null){
            $questions = QuizQuestion::where("quiz_module_id", $module->id)->get();
            return view("Quiz.playDashQuiz")
                ->with(["page" => "quiz"])
                ->with(["module" => $module])
                ->with(["pointTotal" => $pointTotal])
                ->with(["questions" => $questions]);
        }

        return redirect()->back()->with(["error" => "Impossible de consulter la liste des questions"]);
    }
}
