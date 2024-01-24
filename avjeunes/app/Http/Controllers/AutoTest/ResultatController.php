<?php

namespace App\Http\Controllers\AutoTest;

use Carbon\Carbon;
use App\NotifToken;
use App\AutoTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ResultatController extends Controller
{
    public function __invoke()
    {
        if (
            (session('rep1') == 1 
            && session('rep2') == 1 
            && session('rep3') == 1 
            && session('rep4') == 1 
            && session('rep5') == 1 
            && session('rep7') == 1 ) || 
            (session('rep8') == 1  || session('rep10') == 1 || session('rep11') == 1 )
        ) {
            $titre = "Risque élevé";
            $reponse="Ne sortez pas de chez vous. Ne pas aller chez le médecin,ni chez le guérisseur, ni à l’hôpital. Mettez un cache nez. Appelez le 111";
        } elseif (
            session('rep1') == 1 
            || session('rep2') == 1 
            ||session('rep3') == 1 
            ||session('rep4') == 1 
            ||session('rep5') == 1 
            ||session('rep7') == 1 
            ||session('rep8') == 1 
            ||session('rep10') == 1 
            ||session('rep11') == 1 ) {
            $titre = "Risque Moyen";
            $reponse = "Buvez beaucoup d'eau, Restez en sécurité, Prenez soin de vous et restez à l'écoute de votre corps. Appeler votre médecin ou le 111.";
        } elseif (
            session('rep1') == 0
            && session('rep2') == 0 
            && session('rep3') == 0 
            && session('rep4') == 0
            && session('rep5') == 0 
            && session('rep7') == 0 
            && session('rep8') == 0 
            && session('rep10') == 0 
            && session('rep11') == 0
        ) {
            $titre = "Risque faible";
            $reponse = "Restez en sécurité et en bonne santé. Respecter les mesures de prévention. Posez vos questions aux téléconseillers de l'application econvivial ";
        }
        
        if (Auth::check()) {
            $autoTestResult = AutoTestResult::firstOrCreate(['user_id' => Auth::user()->id])->load('user.region');
            
            $autoTestResult->update(['result' => $titre]);
            
            // $autoTestResult->save();
            
            if ($titre = 'Risque élevé' || $titre = 'Risque Moyen') {
                $sexe = $autoTestResult->user->sexe;
            
                $age = Carbon::now()->diffInYears($autoTestResult->user->datenaissance);
                
                $region = $autoTestResult->user->region->libelle;
                
                $numero = $autoTestResult->user->numero;
                
                $message = <<<EOT
Alert cas suspect
Sexe: $sexe
Age: $age
Région: $region
Contact: $numero
Resultat du test: $titre
EOT;
    
                // (new NotifToken())->sendProviderSMS('22892709501', $message, 'AUTOTEST');
                
                // (new NotifToken())->sendProviderSMS('22892391171', $message, 'AUTOTEST');
                
                (new NotifToken())->sendProviderSMS('22892743247', $message, 'AUTOTEST');
            }
        }
    
        return view('AutoTest.resultat', compact('titre', 'reponse'));
    }
}
