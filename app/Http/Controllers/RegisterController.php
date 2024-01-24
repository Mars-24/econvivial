<?php

namespace App\Http\Controllers;

use App\User;
use App\Ecole;
use App\Region;
use App\TypeUser;
use Carbon\Carbon;
use App\NotifToken;
use App\PairEducateur;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\GenerateUserCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        
        //$regions = Region::orderBy('libelle')->get();
        
    	return view('Register.register');
    }

    public function postRegister(UserRequest $request)
    {
        if($request->someData){
           
            $data = [
            "google_id"=>$request->someData[0],
            "username"=>$request->someData[1],
            "email"=>$request->someData[2],
            "datenaissance" =>$request->datenaissance,
            "sexe" => $request->sexe,
            "country" => $request->country,
            "region" => $request->region,
            "numero" => $request->numero,
            "profession" => $request->profession
            ];
        }else{
            $data=$request->all();
        }
        //dd($data["numero"]);

        $messages = [
            'username.required' => 'Le nom d\'utilisateur est obligatoire',
            'username.unique' => 'Ce pseudo est déjà utilisé. Veuillez choisir un autre',
            'numero.size' => 'Veuillez saisir un numéro de télephone valide sans indicatif',
            'numero.unique' => 'Ce numéro de téléphone est déjà utilisé',
            'email.required' => 'L\'email est obligatoire',
            'email.unique' => 'Cet email existe déjà',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit dépasser au moins 6 caractères',
            'confirmation.required' => 'Veuillez confirmer votre mot de passe',
            'confirmation.min' => 'La confirmation du mot de passe doit dépasser au moin 6 caractères',
            'datenaissance.required' => 'Veuillez renseigner votre date de naissance',
            ];
        $validator =Validator::make($data, [
            'username' => 'required|max:60|unique:users',
            'numero' => 'required|size:13|unique:users',
            'email' => 'required|email|max:100|unique:users',
            //'password' => 'min:6|max:60',
            //'confirmation' => 'required|min:6|max:60|same:password',
            'datenaissance' => 'required|date_format:Y-m-d'
            ], $messages);
            if ($validator->fails()) {
                // return dd($validator->errors());
                return back()->with('error', $validator->errors()->first());
            }

        //return dd($request->all());
        // if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        //     try {
        //         $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        //         srand((double)microtime()*1000000);
        //         $i = 0;
        //         $code = '' ;
    
        //         while ($i <= 4) {
        //             $num = rand() % 33;
        //             $tmp = substr($chars, $num, 1);
        //             $code = $code . $tmp;
        //             $i++;
        //         }
                
        //         $user->code = $code;
        //         $user->save();
    
        //         Session::put("numero", $user->numero);
                
        //           DB::table('user_activations')->insert(array('user_id'=>$user->id , 'token' => $token));
        //         return redirect()->route('connexion')->with('message' , "Votre compte est maitenant actif, veuillez vous connecter");
                
    
        //          $userNumber = preg_replace('/\s+/', '', substr($request["numero"],1));
                
        //           $message = "Code d'activation de votre compte eCentre Convivial ".$code;
    
    
    
        //             $sendSMS = new NotifToken();
    
        //              $output = $sendSMS->sendProviderSMS($userNumber,$message);
    
        //             if(strpos($output, '1701') !== false){
        //              $user->code = $code;
        //             $user->save();
    
        //             Session::put("numero", $user->numero);
    
        //             DB::table('user_activations')->insert(array('user_id'=>$user->id , 'token' => $token));
        //             return redirect()->route('activation-compte')->with('message' , "Saisir le code d'activation de votre compte qui vient  d'être envoyé au numéro  ".$user->numero." en vue d'activer votre compte");
    
        //             }else{
        //                   return redirect()->back()->with(["erreur" => "Imposible d'envoyer le code d'activation. Veuillez réessayer"])->withInput();
        //             }
    
            
            
        //     } catch (Exception $e) {
        //           return redirect()->back()->with(["erreur" => "Une erreur s'est produite, veuillez réessayer"])->withInput();
        //     }
        // }
    
        $user = new User();
        
        $smsCode = GenerateUserCode::generateSMSCode();

        $check = false;
        //dd($data->numero);
        DB::transaction(function () use (&$data, $smsCode, &$user, &$check) {
            $typeUser = TypeUser::where('libelle', 'utilisateur')->first(['id']);
           //dd($data);
            $codeUser = GenerateUserCode::generate(
                $data['numero'],
                $data['sexe'],
                $data['datenaissance'],
                $data['country'],
                $data['profession'],
                $data['region']
            );

        //return dd($check);
            //$data = $request->all();
            $data['nationalite']= $data['country'];
            $data['code'] = $smsCode;
            $data['codeUser']=$codeUser;
            //$data['numero']=$request->numero;
            $data['source'] = 'w';
            $data['type_user_id']=  $typeUser->id;
            $data['activation']=true;
            //$data['region_id']=$request->region;
            //dd($data);
            $check = User::create($data);

            /* $check = $user->fill(array_merge($data, [
                'codeUser' => $codeUser,
                'numero' => $request->numero,
                'code' => $smsCode,
                'activation' => true,
                'type_user_id' => $typeUser->id,
                'region_id' => $request->region,
                'source' => 'W',
            ]))->save(); */

            //return dd($check);
            
        });
        // Session::put('numero', $user->numero);
            
        // DB::table('user_activations')->insert(['user_id' => $user->id, 'token' => str_random(60)]);

        // $message = 'Code d\'activation de votre compte eCentre Convivial: ' . $smsCode;
        
        // $phone_number_without_plus_sign = preg_replace('/\s+/', '', substr($user->numero, 1));

        // $output = (new NotifToken())->sendProviderSMS($phone_number_without_plus_sign, $message);
        
        // info('sms sending result', ['output' => $output]);
        
        // return redirect()
        //     ->route('activation-compte')
        //     ->with('message' , 'Saisir le code d\'activation de votre compte qui vient  d\'être envoyé au numéro ' . $user->numero .'en vue d\'activer votre compte');
        
       
        Session::put('user', $data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('subscribe')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
        }else{
            return 'non';
        }
        
    }

    public function registerEleve()
    {
        $regions = Region::all();
       
        return view("Register.registerEleve")->with(["regions" => $regions]);
    }

    public function postRegisterEleve(Request $request)
    {
        $this->validate($request, [
            "nom" => "required",
            "prenom" => "required",
            "region" => "required",
            "numero" => "required | unique:users",
            "ecole" => "required",
        ]);

        //Recupération de l'école
        $ecole = Ecole::where("id", $request["ecole"])->first();

        if($ecole) {
            $typeUser = TypeUser::where("libelle", $ecole->apprenant)->first();
        }

        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"])->withInput();
        }

      $users = User::all();
      $number = count($users) +1 ;
      $formatEmail = "user".$number."@e-centreconvivial.org";
      try{

          /**
           * Enrégistrement du paire educateur
           */

          $pairEducateur = new PairEducateur();
          $pairEducateur->nom = $request["nom"];
          $pairEducateur->prenom = $request["prenom"];
          $pairEducateur->ecole_id = $request["ecole"];
          $pairEducateur->region_id = $request["region"];
          $pairEducateur->age = $request["age"];
          $pairEducateur->save();

          $ecole = Ecole::where("id", $request["ecole"])->first();
          $region = Region::where("id", $request["region"])->first();

          $nomRegion = $region->libelle;
          /**
           * Enrégistrement des informations utilisateurs
           */

          $user = new User();
          $user->username = $request["prenom"];
          $user->numero = $request["numero"];
          $user->sexe = $request["sexe"];
          $user->email = $formatEmail;
          $user->password = $request["password"];
          $user->type_user_id = $typeUser->id;
          $user->activation = false;
          $user->valider = false;
          $user->pair_educateur_id = $pairEducateur->id;
          $user->save();

          $pairNom = $pairEducateur->nom;
          $pairPrenom = $pairEducateur->prenom;
          $userInitial = $number."-".$pairNom[0].$pairPrenom[0].$request["age"].$request["sexe"].$nomRegion[0]."-".$ecole->code."-".date("y");

          $pairEducateur->code  = $userInitial;
          $pairEducateur->save();

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

          $userNumber = preg_replace('/\s+/', '', substr($request["numero"],1));

          $message = "Code d'activation de votre compte eCentre Convivial   ".$code;

        
                $sendSMS = new NotifToken();

                 $output = $sendSMS->sendProviderSMS($userNumber,$message);

                if(strpos($output, '1701') !== false){
                $user->code = $code;
              $user->save();
              Session::put("numero", $user->numero);
          return redirect()->route('activation-compte')->with('message' , "Saisir le code d'activation de votre compte qui vient  d'être envoyé au numéro  ".$user->numero." en vue d'activer votre compte");

                }else{
                 return redirect()->back()->with(["erreur" => "Imposible d'envoyer le code d'activation. Veuillez réessayer"])->withInput();
                }

      }catch (\Exception $exception){
          return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de créer le compte"])->withInput();
      }

  }
  
    // formulaire d'activation de compte
    public function getActivationForm()
    {
        return view('Register.activation');
    }

    public function postActivationAccount(Request $request)
    {
        $this->validate($request, ['code' => 'required']);

        $user =   User::where('numero', $request->numero)->where('code' , $request->code)->first();
        
        if ($user != null) {
            $user->activation = true;
          
            $user->save();
          
            return redirect()->route('connexion')->with(['message' => 'Votre compte est maitenant actif, veuillez vous connecter']);
        }
      
        return redirect()->back()->with(['error' => 'Le code saisi est incorrecte']);
    }

    // resend action code
    public function resendActivationCode(Request $request)
    {
        $user = User::where('numero', $request->numero)->first();
        
        if ($user != null) {
            $numero = preg_replace('/\s+/', '', substr($user->numero, 1));
            
            $message = 'Code d\'activation de votre compte eCentre Convivial: '. $user->code;

            $output = (new NotifToken())->sendProviderSMS($numero, $message);
            
            info('sms sending result', ['output' => $output]);
            
            return response()->json(strpos($output, '1701') !== false);
        }
      
        return response()->json(false);
    }

  public function makeActivationForm(){
      return view("Register.makeActivation");
  }

  public function postMakeActivation(Request $request){

      $user = User::where("numero", $request["numero"])->first();
      if($user != null){
         if($user->activation == true){
             return redirect()->route("connexion")->with(["message" => "Votre compte est déjà actif.Veuillez vous connecter"]);
         }else{
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

             $message = "Code d'activation de votre compte eCentre Convivial   ".$code;


                $sendSMS = new NotifToken();

                 $output = $sendSMS->sendProviderSMS($userNumber,$message);

                if(strpos($output["code"], '1701') !== false){
                 $user->code = $code;
                 $user->save();
                 Session::put("numero", $user->numero);
                 return redirect()->route('activation-compte')->with('message' , "Saisir le nouveau code d'activation qui vient  d'être envoyé au numéro  ".$user->numero." en vue d'activer votre compte");

                }else{
                  return  redirect()->back()->with(["error" => "Problème de réseau lors de l'envoie du code d'activation. Veuillez réessayer plustard"]);
                }
                
         }
      }
      return redirect()->back()->with(["error" => "Ce numéro n'existe pas"]);
    }
}
