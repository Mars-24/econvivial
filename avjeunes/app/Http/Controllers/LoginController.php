<?php

namespace App\Http\Controllers;

use App\HoraireAcces;
use App\User;
use Validator;
use App\Presence;
use App\NotifToken;
use App\PairEducateur;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.login');
    }

    public function postLogin(Request $request){

        //  $userNumber = preg_replace('/\s+/', '', substr($request['numero'],4));
  
          if (filter_var($request["numero"], FILTER_VALIDATE_INT)) {
              $user = User::where("numero", "+228 ".$request['numero'])->first();
  
              if($user != null){
                  if($user->numero != null){
  
                      if($user->activation == false){
                          return redirect()->back()->with(["error" => "Votre compte n'est pas actif. Veuillez activer votre compte en cliquant sur le lien en bas du formulaire"])->withInput();
                      }
                      if(Auth::attempt(["numero" => $user->numero, "password" => $request["password"]])){
  
                              Session::put("logged", true);
                              if(Auth::user()->type_user_id == 1){
                                  return redirect()->route("espacemembre");
                              }else if(Auth::user()->type_user_id == 2){
                                  return redirect()->route("tableau-de-bord-admin");
                              }else if(Auth::user()->type_user_id == 3){
                                  
                                          $dateJour = new \DateTime();
                                  $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
                                  $dateFin = $dateJour->format("y-m-d")." 23:59:59";
  
                                  $presence = Presence::where("user_id", Auth::user()->id)
                                      ->where("created_at",">=", $dateDebut )
                                      ->where("created_at","<=", $dateFin )
                                      ->first();
                                      
                                     $presence = DB::select("select * from presences where user_id = ".Auth::user()->id." and created_at between '".$dateDebut."' and '".$dateFin."' order by id desc limit 1");
                                  
                                  if(count($presence) > 0){
                                      if($presence[0] != null && $presence[0]->heureDepart == null){
                                          return redirect()->route("espacemembre-assistance-en-ligne");
                                      }else if($presence[0] != null && $presence[0]->heureDepart != null){
                                          return redirect()->route("marquer-presence-arrivee");
                                      }
                                  }else{
                                      return redirect()->route("espacemembre-assistance-en-ligne");   
                                  }
                                /*  if($presence == null){
                                      return redirect()->route("marquer-presence-arrivee");
                                  }else if($presence != null && $presence->heureDepart != null){
                                          return redirect()->route("marquer-presence-arrivee");
                                      }
  
  
                                  return redirect()->route("espacemembre-assistance-en-ligne");  */
                              }else if(Auth::user()->type_user_id == 4){
                                  return redirect()->route("espacemembre-formation-sanitaire");
                              }else if(Auth::user()->typeuser->libelle == "superviseur"){
                                  $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur");
                                  }else if(Auth::user()->typeuser->libelle == "PE Univ"){
                                  $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur-universitaire");
                                  }else if(Auth::user()->typeuser->libelle == "Sup Univ"){
                                  $user->actif = true;
                                  $user->save();
                              return redirect()->route("rapport-superviseur-universitaire");
                                   }else if(Auth::user()->typeuser->libelle == "admin ong"){
                                  $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-ong");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "admin regionaux"){
                                  $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-reg");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "etudiant" || Auth::user()->typeuser->libelle == "eleve"){
                                  return redirect()->route("espacemembre");
                              }else if( Auth::user()->typeuser->libelle == "Femmes Enceintes"){
                                  return redirect()->route("nouveau-beneficiaire-suivi");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Agent"){
                                  return redirect()->route("enregistrer-pvvih");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Sup"){
                                  return redirect()->route("liste-pvvih-attente-validation-superviseur");
                              }
  
                      }
                  }
                  return redirect()->back()->with(["error" => "Le mot de passe saisi est incorrecte"])->withInput();
              }
              return redirect()->back()->with(["error" => "Le numéro de téléphone saisi n'existe pas"])->withInput();
  
          }else if(filter_var($request["numero"], FILTER_VALIDATE_EMAIL)){
              $user = User::where("email", $request["numero"])->first();
              if($user != null){
                  if($user->activation == false){
                      return redirect()->back()->with(["error" => "Votre compte n'est pas actif. Veuillez activer votre compte en cliquant sur le lien en bas du formulaire"])->withInput();
                  }
                  if(Auth::attempt(["email" => $request["numero"], "password" => $request["password"]])){
  
                          Session::put("logged", true);
                          if(Auth::user()->type_user_id == 1){
                              return redirect()->route("espacemembre");
                          }else if(Auth::user()->type_user_id == 2){
                              return redirect()->route("tableau-de-bord-admin");
                          }else if(Auth::user()->type_user_id == 3){
                              
                                      $dateJour = new \DateTime();
                                  $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
                                  $dateFin = $dateJour->format("y-m-d")." 23:59:59";
  
                                  
                                  $presence = Presence::where("user_id", Auth::user()->id)
                                                          ->orderBy("id", "desc")->first();
  
                                  if($presence != null && $presence->periode == "3ème période" && $presence->heureDepart == null){
                                    
                                      return redirect()->route("espacemembre-assistance-en-ligne");
                                  }
                                  
                                  $presence = DB::select("select * from presences where user_id = ".Auth::user()->id." and created_at between '".$dateDebut."' and '".$dateFin."' order by id desc limit 1");
                                  
                                  
                                  if(count($presence) > 0){
                                      if($presence[0] != null && $presence[0]->heureDepart == null){
                                          return redirect()->route("espacemembre-assistance-en-ligne");
                                      }else if($presence[0] != null && $presence[0]->heureDepart != null){
                                          return redirect()->route("marquer-presence-arrivee");
                                      }
                                  }else{
                                      return redirect()->route("marquer-presence-arrivee");   
                                  }
                               
                          }else if(Auth::user()->type_user_id == 4){
                              return redirect()->route("espacemembre-formation-sanitaire");
                          }else if(Auth::user()->typeuser->libelle == "superviseur"){
                               $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur");
                                  }else if(Auth::user()->typeuser->libelle == "PE Univ"){
                                       $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur-universitaire");
                                  }else if(Auth::user()->typeuser->libelle == "Sup Univ"){
                                       $user->actif = true;
                                  $user->save();
                              return redirect()->route("rapport-superviseur-universitaire");
                                   }else if(Auth::user()->typeuser->libelle == "admin ong"){
                                        $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-ong");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "admin regionaux"){
                                       $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-reg");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "etudiant" || Auth::user()->typeuser->libelle == "eleve"){
                              return redirect()->route("espacemembre");
                          }else if( Auth::user()->typeuser->libelle == "Femmes Enceintes"){
                                  return redirect()->route("nouveau-beneficiaire-suivi");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Agent"){
                                  return redirect()->route("enregistrer-pvvih");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Sup"){
                                  return redirect()->route("liste-pvvih-attente-validation-superviseur");
                              }
  
  
                  }
                  return redirect()->back()->with(["error" => "Le mot de passe saisi est incorrecte"])->withInput();
              }else{
                  return redirect()->back()->with(["error" => "Cet email n'existe pas"])->withInput();
              }
  
          }else{
              $pairEducateur = PairEducateur::where("code", $request['numero'])->first();
              if($pairEducateur == null){
                  return redirect()->back()->with(["error" => "Le code d'identification saisi n'existe pas"])->withInput();
              }
              $user = User::where("pair_educateur_id", $pairEducateur->id)->first();
  
                  if($user != null){
                      if($user->numero != null){
  
                          if($user->activation == false){
                              return redirect()->back()->with(["error" => "Votre compte n'est pas actif. Veuillez activer votre compte en cliquant sur le lien en bas du formulaire"])->withInput();
                          }
  
                          if(Auth::attempt(["numero" => $user->numero, "password" => $request["password"]])){
  
                                  Session::put("logged", true);
                                  if(Auth::user()->type_user_id == 1){
                                      return redirect()->route("espacemembre");
                                  }else if(Auth::user()->type_user_id == 2){
                                      return redirect()->route("tableau-de-bord-admin");
                                  }else if(Auth::user()->type_user_id == 3){
                                      
                                              $dateJour = new \DateTime();
                                  $dateDebut = $dateJour->format("y-m-d")." 00:00:00";
                                  $dateFin = $dateJour->format("y-m-d")." 23:59:59";
  
                                  $presence = Presence::where("user_id", Auth::user()->id)
                                      ->where("created_at",">=", $dateDebut )
                                      ->where("created_at","<=", $dateFin )
                                      ->first();
                                      
                                      $presence = DB::select("select * from presences where user_id = ".Auth::user()->id." and created_at between '".$dateDebut."' and '".$dateFin."' order by id desc limit 1");
                                  
                                  if(count($presence) > 0){
                                      if($presence[0] != null && $presence[0]->heureDepart == null){
                                          return redirect()->route("espacemembre-assistance-en-ligne");
                                      }else if($presence[0] != null && $presence[0]->heureDepart != null){
                                          return redirect()->route("marquer-presence-arrivee");
                                      }
                                  }else{
                                      return redirect()->route("espacemembre-assistance-en-ligne");   
                                  }
                                  /* if($presence == null){
                                      return redirect()->route("marquer-presence-arrivee");
                                  }else if($presence != null && $presence->heureDepart != null){
                                          return redirect()->route("marquer-presence-arrivee");
                                      }
  
  
  
                                      return redirect()->route("espacemembre-assistance-en-ligne"); */
                                  }else if(Auth::user()->type_user_id == 4){
                                      return redirect()->route("espacemembre-formation-sanitaire");
                                  }else if(Auth::user()->typeuser->libelle == "superviseur"){
                                       $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur");
                                  }else if(Auth::user()->typeuser->libelle == "PE Univ"){
                                       $user->actif = true;
                                  $user->save();
                                      return redirect()->route("espace-membre-pair-educateur-universitaire");
                                  }else if(Auth::user()->typeuser->libelle == "Sup Univ"){
                                       $user->actif = true;
                                  $user->save();
                                  return redirect()->route("rapport-superviseur-universitaire");
                                   }else if(Auth::user()->typeuser->libelle == "admin ong"){
                                        $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-ong");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "admin regionaux"){
                                       $user->actif = true;
                                  $user->save();
                                       return redirect()->route("liste-entretien-attente-validation-admin-reg");
                                     // return "Page non fonctionnel";
                                  }else if(Auth::user()->typeuser->libelle == "etudiant" || Auth::user()->typeuser->libelle == "eleve"){
                                      return redirect()->route("espacemembre");
                                  }else if( Auth::user()->typeuser->libelle == "Femmes Enceintes"){
                                  return redirect()->route("nouveau-beneficiaire-suivi");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Agent"){
                                  return redirect()->route("enregistrer-pvvih");
                              }else if(Auth::user()->typeuser->libelle == "PVVIH Sup"){
                                  return redirect()->route("liste-pvvih-attente-validation-superviseur");
                              }
                          }
                      }
                      return redirect()->back()->with(["error" => "Le mot de passe saisi est incorrecte"])->withInput();
                  }
                  return redirect()->back()->with(["error" => "Le code d'ientification saisi n'existe pas"])->withInput();
          }
  
  
      }

    public function postLoginOld(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numero' => 'required',
            'password' => 'required',
        ], [
            'numero.required' => 'Numéro, email ou code d\'identification obligatoire',
            'password.required' => 'Mot de passe obligatoire',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('numero', '+228 ' . $request->numero)->orWhere('email', $request->numero)->first();

        if ($user === null) {
            return redirect()->back()->with('error', 'Le numéro de téléphone ou le mot de passe est incorrecte')->withInput();
        }

        // check if user has been activated
        if (!$user->activation) {
            return redirect()
                ->back()
                ->with('error', 'Votre compte n\'est pas actif. Veuillez activer votre compte en cliquant sur le lien en bas du formulaire')
                ->withInput();
        }

        Auth::loginUsingId($user->id);

        Session::put('logged', true);

        $user->update(['actif' => true]);

        if ($user->type_user_id == 1) {
            return redirect()->route('espacemembre');
        } else if ($user->type_user_id == 2) {
            return redirect()->route('tableau-de-bord-admin');
        } else if($user->type_user_id == 3) {

            $dateJour = new \DateTime();

            $dateDebut = $dateJour->format('y-m-d').' 00:00:00';
            $dateFin = $dateJour->format('y-m-d').' 23:59:59';

            $presence = Presence::where('user_id', $user->id)
                ->where('created_at', '>=', $dateDebut )
                ->where('created_at', '<=', $dateFin )
                ->first();

            $presence = DB::select('select * from presences where user_id = '.$user->id.' and created_at between "'.$dateDebut.'" and "'.$dateFin.'" order by id desc limit 1');

            // dd($presence);

            if (count($presence) > 0) {

                if($presence[0] != null && $presence[0]->heureDepart == null) {
                    return redirect()->route('espacemembre-assistance-en-ligne');
                } else if ($presence[0] != null && $presence[0]->heureDepart != null) {
                    return redirect()->route('marquer-presence-arrivee');
                }
            } else {

                return redirect()->route('espacemembre-assistance-en-ligne');
            }
          /*  if($presence == null) {
                return redirect()->route('marquer-presence-arrivee');
            } else if ($presence != null && $presence->heureDepart != null) {
                    return redirect()->route('marquer-presence-arrivee');
                }


            return redirect()->route('espacemembre-assistance-en-ligne');  */
        } else if ($user->type_user_id == 4) {
            return redirect()->route('espacemembre-formation-sanitaire');
        } else if ($user->typeuser->libelle == 'superviseur') {
            return redirect()->route('espace-membre-pair-educateur');
        } else if ($user->typeuser->libelle == 'PE Univ') {
            return redirect()->route('espace-membre-pair-educateur-universitaire');
        } else if ($user->typeuser->libelle == 'Sup Univ') {
            return redirect()->route('rapport-superviseur-universitaire');
        } else if ($user->typeuser->libelle == 'admin ong') {
            return redirect()->route('liste-entretien-attente-validation-admin-ong');
        } else if ($user->typeuser->libelle == 'admin regionaux') {
            return redirect()->route('liste-entretien-attente-validation-admin-reg');
        } else if ($user->typeuser->libelle == 'etudiant' || $user->typeuser->libelle == 'eleve') {
            return redirect()->route('espacemembre');
        } else if ( $user->typeuser->libelle == 'Femmes Enceintes') {
            return redirect()->route('nouveau-beneficiaire-suivi');
        } else if ( $user->typeuser->libelle == 'Vaccination Grossesse') {
            return redirect()->route('nouveau-beneficiaire-vaccin');
        } else if ($user->typeuser->libelle == 'PVVIH Agent') {
            return redirect()->route('enregistrer-pvvih');
        } else if ($user->typeuser->libelle == 'PVVIH Sup') {
            return redirect()->route('liste-pvvih-attente-validation-superviseur');
        }
    }

    public function logOut()
    {
        if (Auth::check()) {
            Auth::logout();

            return redirect()->route("connexion");
        }

        return redirect()->back();
    }

    public function unAutorize()
    {
        return view("Error.unautorize");
    }

    public function forgotPassword()
    {
        return view("Login.forgotPassword");
    }

    public function loginAgForm()
    {
        return view("Login.loginAG");
    }

    public function postRecupererPassword(Request $request)
    {

        if (filter_var($request["numero"], FILTER_VALIDATE_INT)) {
            $user = User::where("numero", "+228 ".$request['numero'])->first();
        }else if(filter_var($request["numero"], FILTER_VALIDATE_EMAIL)){
            $user = User::where("email", $request["numero"])->first();
        }else{
          //  $userCode = preg_replace('/\s+/', '', substr($request['numero'],4));
            $pairEducateur = PairEducateur::where("code", $request['numero'])->first();
            if($pairEducateur == null){
                return redirect()->back()->with(["error" => "Le code d'identification saisi n'existe pas"])->withInput();
            }
            $user = User::where("pair_educateur_id", $pairEducateur->id)->first();
        }
        if($user != null){
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $code = '' ;

            while ($i <= 4) {
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $code = $code . $tmp;
                $i++;
            }
            $userNumber = preg_replace('/\s+/', '', substr($user->numero,1));

            $message = "Code de récupération de votre mot de passe  ".$code;


                $sendSMS = new NotifToken();

                 $output = $sendSMS->sendProviderSMS($userNumber,$message);

                if(strpos($output, '1701') !== false){
                     $user->codeRecuperation = $code;
                $user->save();
                Session::put("mon-numero", $user->numero);
                return redirect()->route('changer-mon-mot-de-passe')->with('message' , "Saisir le code de récupération  puis changer votre mot de passe ");

                }else{
                     return  redirect()->back()->with(["error" => "Problème de réseau lors de l'envoie du code d'activation. Veuillez réessayer plustard"]);
                }

        }
        return redirect()->back()->with(["error" => "Veuillez saisir des informations valides"])->withInput();
    }

    public function getChangePasswordForm()
    {
        return view('Login.newPassword');
    }

    public function postMakeChangePassword(Request $request)
    {
        if ($request['password'] != $request['confirmation']) {
            return redirect()->back()->with(['error' => 'Veuillez confirmer votre mot de passe'])->withInput();
        }

        $user = User::where('numero', Session::get('mon-numero'))->where('codeRecuperation', $request['code'])->first();

        if ($user != null) {
            $user->update(['password' => $request['password']]);

            return redirect()->route('connexion')->with(['message' => 'Veuillez vous connecter avec votre nouveau mot de passe']);
        }

        return redirect()->back()->with(['error' => 'Veuillez saisir un code de récupération valide'])->withInput();
    }
}
