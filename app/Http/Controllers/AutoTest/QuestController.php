<?php

namespace App\Http\Controllers\AutoTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestController extends Controller
{
    public function __invoke(Request $request, $num)
    {
        $questions = [
            1 => "Pensez-vous avoir ou avoir eu de la fièvre ces 48 dernières heures (frissons, sueurs) ?",
            2 => "Votre température la plus élevée de ces dernières 48 heures est-elle supérieure à 38 C?",
            3 => "Ces derniers jours, avez-vous une toux ou une augmentation de votre toux habituelle ?",
            4 => "Ces derniers jours, avez-vous noté une forte diminution ou perte de votre goût ou de votre odorat?",
            5 => "Ces derniers jours, avez-vous eu un mal de gorge et/ou des douleurs musculaires et/ou des courbatures inhabituelles ?",
            6 => "Ces dernières 24 heures, avez-vous de la diarrhée ? Avec au moins 3 selles molles.",
            7 => "Ces derniers jours, avez-vous une fatigue inhabituelle ?",
            8 => "Avez-vous été en contact avec une personne déclarée positive au COVID19 ?",
            9 => "La fatigue inhabituelle vous oblige-t-elle à vous reposer plus de la moitié de la journée ?",
            10 => "Avez-vous été en contact avec une personne rentrée depuis les 14 derniers jours d'un voyage à l’étranger ?",
            11 => "Avez-vous effectué un voyage à l'extérieur du Togo dans les 14 derniers jours?",
            12 => "Avez-vous l'habitude de porter des bavettes (cache-nez) lors de vos sorties?",
            13 => "Lavez-vous régulièrement les mains avec de l'eau et du savon, ou utilisez-vous un produit désinfectant?",
            14 => "Êtes-vous enceinte ?",
            15 => "Avez-vous une maladie connue pour diminuer vos défenses immunitaires ?",
            16 => "Avez-vous une maladie connue pour diminuer vos défenses immunitaires ?",
        ];
        
        if ($num == 16) {
            // $q1="Avez-vous une maladie connue pour diminuer vos défenses immunitaires ?";
            
           //return view('../resultat',compact('num','q1'));
           
            return redirect()->route("resultat");
        }
        
        if ($num != 1) {
            session(['rep' . ($num - 1) => $request->rep]);
            // dump($request->session()->all());
        }
        
        $q1 = $questions[$num];
        
        return view('AutoTest.quest', compact('num', 'q1'));
    }
}
