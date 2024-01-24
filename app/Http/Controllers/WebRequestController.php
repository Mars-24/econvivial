<?php

namespace App\Http\Controllers;

use App\Beneficiaire;
use App\NotifToken;
use App\Region;
use App\Services\GenerateUserCode;
use App\TypeUser;
use App\User;
use App\WebSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebRequestController extends Controller
{
	public function presenceArriver(){

		$result["message"] = [];
        $result["error"]  = false;

		if(isset($_GET))
		{
			//$identifiant = $_GET["identifiant"];
			$nom =  $_GET["nom"];
			$prenom =  $_GET["prenom"];
			$fonction =  $_GET["fonction"];
			$programmer =  $_GET["programmer"];
			$periode =  $_GET["periode"];

				$presence = new Presences();
				$presence->nom = $nom;
				$presence->prenom = $prenom;
				$presence->fonction = $fonction;
				$presence->programmer = $programmer;
				$presence->periode = $periode;
				//$presence->user_id = $user->id;
				$presence->valider = false;

				//dd($presence);
				$presence->save();

				$result["message"] = $presence;
				$result["error"]  = false;
                return response()->json($result);
        }

        $result["message"] = "Impossible de marquer sa présence";
        $result["error"]  = true;
        return response()->json($result);
    }


	//recupération de la liste des utilisateur pour le téléconseiller connecter
	public function  getListeUserMobile(){
        $result['message'] = [];
        $result['error']  = false;

        //$user = User::orderBy('id', 'asc')->get();

		 $users = DB::select("select * from users where id
		 in (select distinct sender_id from chats where receiver_id =".Auth::user()->id.")
		 order by created_at asc");

        $result['message'] = $users;
        $result['error']  = false;

        return response()->json($result);
    }

    public function register(Request $request)
    {
        info('register', ['request' => $request->all()]);

        $result = [
            'message' => [],
            'error' => false,
        ];

        // request has input
        if (count($request->all()) !== 0) {
            $password = $request->password;

            $numero = '+' . trim($request->numero);

            if (strlen($numero) != 13) {
                $result['message'] = 'Veuillez saisir un numéro de télephone valide sans indicatif';

                $result['error']  = true;

                return json_encode($result);
            }

            if (User::where('numero', $numero)->first()) {
                $result['message'] = 'Ce numéro est déjà utilisé';

                $result['error'] = true;

                return json_encode($result);
            }

            try{
                $typeUser = TypeUser::where('libelle', 'utilisateur')->first();

                $user = User::create(array_merge($request->all(), [
                    'numero' => $numero,
                    'type_user_id' => $typeUser->id,
                    'nationalite' => 'TG',
                    'activation' => true,
                    'source' => 'M',
                ]));

                $smsCode = GenerateUserCode::generateSMSCode();

                // $numero = preg_replace('/\s+/', '', substr($user->numero, 1));

                // $message = 'Code d\'activation de votre compte eCentre Convivial ' . $smsCode;

                // $output = (new NotifToken())->sendProviderSMS($numero, $message);

                // info('send sms', ['output' => $output]);

                $user->code = $smsCode;

                $user->save();

                // if (strpos($output, '1701') != false) {
                //     $user->code = $smsCode;

                //     $user->save();
                // } else {
                //     $result['message'] = 'Veuillez réessayer, un problème est survenu lors de l\'envoie du SMS d\'activation de compte';

                //     $result['error']  = true;

                //     return json_encode($result);
                // }

                $result['message'] = $smsCode;

                $result['identifiant'] = $user->id;

                $result['error']  = false;

                return json_encode($result);
            } catch(\Exception $e) {
                $result['message'] = 'Veuillez réessayer, un problème est survenu lors de la création de compte';

                $result['error']  = true;

                return json_encode($result);
            }
        }

        $result['message'] = 'Impossible de créer votre compte, une erreur s\'est produite';

        $result['error']  = true;

        return json_encode($result);
    }

    public function login(){

        $result['message'] = [];
        $result['error']  = false;
        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);
            $password =  $_GET['password'];

            $user = User::where('numero', $numero)->first();
            if($user){

                if($user->activation == false){
                    $result['message'] = 'Votre compte n\'est pas actif. Veuillez activer votre compte';
                    $result['error']  = true;
                    return json_encode($result);
                }

                if(Auth::attempt(['numero' => $numero, 'password' => $password])){
                    $result['message'] = 'Connexion effectuée';
                    $result['error']  = false;
                    $result['identifiant'] = $user->id;
                    $result['numero'] = $user->numero;
                    $result['username'] = $user->username;

                    $result['sexe'] = $user->sexe;
                    $result['dateNaissance'] = $user->datenaissance;
                    $result['profession'] = $user->profession;
                    $result['region'] = $user->region != null ? $user->region->libelle : null;
                    return json_encode($result);
                }

                $result['message'] = 'Mot de passe incorrecte. Veuillez saisir un mot de passe correcte';
                $result['error']  = true;
                return json_encode($result);
            }
            $result['message'] = 'Le numéro saisi n\'existe pas';
            $result['error']  = true;
            return json_encode($result);

        }
        $result['message'] = 'Impossible de se connecter,une erreur s\'est produite';
        $result['error']  = true;
        return json_encode($result);
    }

    public function registerForUserCPN(Request $request)
    {
        info('register', ['request' => $request->all()]);

        $result = [
            'message' => [],
            'error' => false,
        ];

        // request has input
        if (count($request->all()) !== 0) {
            $password = $request->password;


            $numero = '+' . trim($request->numero);

            if (strlen($numero) != 12) {
                $result['message'] = 'Veuillez saisir un numéro de télephone valide sans indicatif';

                $result['error']  = true;

                return json_encode($result);
            }
            $typeUser = TypeUser::where('libelle', 'utilisateur_cpn')->first();
            //if (UserCPN::where('numero', $numero)->first()) {
            if (User::where('numero', $numero)->where('type_user_id', $typeUser->id)->first()) {
                $result['message'] = 'Ce numéro est déjà utilisé';

                $result['error'] = true;

                return json_encode($result);
            }

            $telephone = trim($request->numero);
            $beneficiaire = Beneficiaire::where('telephone', $telephone)->first();
            try{
                $user = User::create(array_merge($request->all(), [
                    'numero' => $numero,
                    'username' => $beneficiaire->code,
                    'datenaissance' => $beneficiaire->dateNaissance,
                    'sexe' => 'F',
                    'type_user_id' => $typeUser->id,
                    'nationalite' => 'TG',
                    'activation' => true,
                    'source' => 'M',
                ]));
                $user->save();
                $result['message'] = "Enregistrement éffectué";

                $result['identifiant'] = $user->id;

                $result['error']  = false;

                return json_encode($result);
            } catch(\Exception $e) {

                $result['erreur'] = $e->getMessage();

                $result['message'] = 'Veuillez réessayer, un problème est survenu lors de la création de compte';

                $result['error']  = true;

                return json_encode($result);
            }
        }

        $result['message'] = 'Impossible de créer votre compte, une erreur s\'est produite';

        $result['error']  = true;

        return json_encode($result);
    }

    public function loginForUserCPN(){

        $result['message'] = [];
        $result['error']  = false;
        if(isset($_GET)){
            $numero = '+'.trim($_GET['numero']);
            $password =  $_GET['password'];

            $typeUser = TypeUser::where('libelle', 'utilisateur_cpn')->first();
            $user = User::where('numero', $numero)->where('type_user_id', $typeUser->id)->first();
            if($user) {

                $beneficiariesNumber = trim($_GET['numero']);
                $beneficiariesNumber = str_replace(' ', '', $beneficiariesNumber);
                $beneficiariesNumber = '%' . $beneficiariesNumber;
                $beneficiary = DB::select('select * from beneficiaires where telephone like :phone', ['phone' => $beneficiariesNumber]);
                //dd($beneficiary);
                //dd(Hash::check($password, $user->password));
                if (Auth::attempt(['numero' => $numero, 'password' => $password])) {
                //if (($user->numero == $numero) && (Hash::check($password, $user->password))) {
                    $result['message'] = 'Connexion effectuée';
                    $result['error'] = false;
                    $result['identifiant'] = $beneficiary[0]->id;
                    $result['user_id'] = $user->id;
                    $result['numero'] = $beneficiary[0]->telephone;
                    $result['nom'] = $beneficiary[0]->nom;
                    $result['prenom'] = $beneficiary[0]->prenom;
                    //dd($result);
                    return json_encode($result);
                }

                $result['message'] = 'Mot de passe incorrecte. Veuillez saisir un mot de passe correcte';
                $result['error']  = true;
                return json_encode($result);

            }
            $result['message'] = 'Le numéro saisi n\'existe pas';
            $result['error']  = true;
            return json_encode($result);

        }
        $result['message'] = 'Impossible de se connecter,une erreur s\'est produite';
        $result['error']  = true;
        return json_encode($result);
    }

    public function postActiveAccount(){

        $result['message'] = [];
        $result['error']  = false;
        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);
            $code =  $_GET['code'];

            $user = User::where('numero', $numero)->where('code', $code)->first();
            if($user != null){
                $user->activation = true;
                $user->save();
                $result['message'] = 'Votre compte est maitenant actif, veuillez vous connecter';
                $result['error']  = false;
                return json_encode($result);
            }
            $result['message'] = 'Code incorrecte';
            $result['error']  = true;
            return json_encode($result);
        }

        $result['message'] = 'Impossible d\'activer le compte. Une erreur s\'est produite';
        $result['error']  = true;
        return json_encode($result);
    }

    public function postCompleteUserAccount(Request $request)
    {
        info('postCompleteUserAccount', ['request' => $request->all()]);


        $result = [
            'message' => [],
            'error' => false,
        ];

        if (count($request->all()) !== 0) {
            $numero = '+' . $request->numero;

            $username = $request->username;

            $dateNaissance = $request->dateNaissance;

            $sexe =  $request->sexe;

            $reg = $request->region;

            $profession = $request->profession;

            $region = Region::where('libelle', $reg)->first();

            $user = User::where('numero', $numero)->orderBy('created_at', 'desc')->first();

            if ($user != null) {
                $user->username = $username;
                $user->datenaissance = $dateNaissance;
                $user->sexe = $sexe;
                $user->profession = $profession;
                $user->region_id = $region->id;

                $codeUser = GenerateUserCode::generate(
                    $numero,
                    $sexe,
                    // Carbon::today()->diffInYears($request->$dateNaissance),
                    $dateNaissance,
                    // null,
                    $profession,
                    $region->code
                );

                $user->codeUser = $codeUser;

                $user->save();

                $result['message'] = 'Votre profile est complété';

                $result['error']  = false;

                return json_encode($result);
            }

            $result['message'] = 'Utilisateur corrompu';

            $result['error']  = true;

            return json_encode($result);
        }

        $result['message'] = 'Impossible de mettre à jour le profile';

        $result['error']  = true;

        return json_encode($result);
    }

    /**
     * Renvoie du code d\'activation de compte à l'utilisateur
     */

    public function resendActivationCode(){

        $result['message'] = [];
        $result['error']  = false;
        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);

            $user = User::where('numero', $numero)->first();
            if($user != null){

                $userNumber = preg_replace('/\s+/', '', substr($numero,1));

                $message = 'Code d\'activation de votre compte eCentre Convivial   '.$user->code;

                $sendSMS = new NotifToken();

                $output = $sendSMS->sendSMS($userNumber,$message);


                if(strpos($output, '1701') !== false){
                    $result['message'] = 'Code d\'activation renvoyé';
                    $result['error']  = false;
                    return json_encode($result);
                }else{
                    $result['message'] = 'Une erreur est survenue lors de l\'envoie du SMS. Veuillez réessayer';
                    $result['error']  = true;
                    return json_encode($result);
                }
            }
            $result['message'] = 'Utilisateur corrompu';
            $result['error']  = true;
            return json_encode($result);
        }

        $result['message'] = 'Impossible d\'envoyer le code';
        $result['error']  = true;
        return json_encode($result);
    }

        /**
     * Liste des séries web
     */


    public function getListeWebSerie(){

        $result['error'] = false;
        $result['series'] = [];

        $series = WebSerie::where('userDash', false)->get();

            $result['error'] = false;
            $result['series'] = $series;

            return response()->json($result);
    }


        /**
     * Verify user number
     */

    public function verifyUserAccountNumber(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);

            $user = User::where('numero', $numero)->first();
            if($user != null){
                $chars = 'abcdefghijkmnopqrstuvwxyz023456789';
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

                $message = 'Code de récupération de votre mot de passe  '.$code;

                $sendSMS = new NotifToken();

                $output = $sendSMS->sendProviderSMS($userNumber,$message);

                if(strpos($output, '1701') !== false  || strpos($output, 'ufeff') !== false ){
                    $user->codeRecuperation = $code;
                    $user->save();

                    $result['message'] = $code;
                    $result['error']  = false;
                    return response()->json($result);

                }else{
                    $result['message'] = 'Une erreur s\'est produite lors de l\'envoie du SMS';
                    $result['error']  = true;
                    return response()->json($result);
                }
            }

            $result['message'] = 'Ce numéro n\'existe pas';
            $result['error']  = true;
            return response()->json($result);

        }

        $result['message'] = 'Impossible de trouver le numéro';
        $result['error']  = true;
        return response()->json($result);
    }

    public function verifyCodeRecuperation(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);
            $code  = $_GET['code'];

            $user = User::where('numero', $numero)->first();

            if($user != null){

                if($user->codeRecuperation == $code){

                    $result['message'] = 'Code correcte';
                    $result['error']  = false;
                    return response()->json($result);

                }

                $result['message'] = 'Le code saisi n\'est pas correcte';
                $result['error']  = true;
                return response()->json($result);
            }

            $result['message'] = 'Ce numéro n\'existe pas';
            $result['error']  = true;
            return response()->json($result);
        }

        $result['message'] = 'Impossible de trouver le numéro';
        $result['error']  = true;
        return response()->json($result);
    }

    public function makePasswordChange(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);
            $password = $_GET['password'];

            $user = User::where('numero', $numero)->first();

            if($user != null){

                $user->password = $password;
                $user->save();

                $result['message'] = 'Mot de passe changé';
                $result['error']  = false;
                return response()->json($result);
            }

            $result['message'] = 'Ce numéro n\'existe pas';
            $result['error']  = true;
            return response()->json($result);
        }

        $result['message'] = 'Impossible de trouver le numéro';
        $result['error']  = true;
        return response()->json($result);
    }


        /**
     * Verify user number for activation
     */
//Utiliser ceci pour vérifier le numéro
    public function verifyUserAccountNumberForActivation(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);

            $user = User::where('numero', $numero)->first();
            if($user != null){

                if($user->activation == true){
                    $result['message'] = 'Votre compte est déjà actif';
                    $result['error']  = true;
                    return response()->json($result);
                }

                $chars = 'abcdefghijkmnopqrstuvwxyz023456789';
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

                $message = 'Code d\'activation de votre compte eCentre Convivial  '.$code;

                $sendSMS = new NotifToken();

                $output = $sendSMS->sendProviderSMS($userNumber,$message);


                if(strpos($output, '1701') !== false){
                    $user->code = $code;
                    $user->save();

                    $result['message'] = $code;
                    $result['error']  = false;
                    return response()->json($result);

                }else{
                    $result['message'] = 'Veuillez réessayer, un problème est survenu lors de l\'envoie du SMS d\'activation de compte';
                    $result['error']  = true;
                    return response()->json($result);
                }
            }

            $result['message'] = 'Ce numéro n\'existe pas :'.$numero;
            $result['error']  = true;
            return response()->json($result);

        }

        $result['message'] = 'Impossible de trouver le numéro';
        $result['error']  = true;
        return response()->json($result);
    }


    public function verifyCodeActivationAccount(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)){

            $numero = '+'.trim($_GET['numero']);
            $code  = $_GET['code'];

            $user = User::where('numero', $numero)->first();

            if($user != null){

                if($user->code == $code){

                    $result['message'] = 'Code correcte';
                    $result['error']  = false;
                    return response()->json($result);

                }

                $result['message'] = 'Le code saisi n\'est pas correcte';
                $result['error']  = true;
                return response()->json($result);
            }

            $result['message'] = 'Ce numéro n\'existe pas';
            $result['error']  = true;
            return response()->json($result);
        }

        $result['message'] = 'Impossible de trouver le numéro';
        $result['error']  = true;
        return response()->json($result);
    }


  /**
     * lISTE DES R2GIONS
     */

    public function  getListeRegion(){
        $result['regions'] = [];
        $result['error']  = false;

        $regions = Region::orderBy('libelle', 'asc')->get();

        $result['regions'] = $regions;
        $result['error']  = false;

        return response()->json($result);
    }


       /**
     * @return \Illuminate\Http\JsonResponse|string
     * Changer le numéro de l'utilisateur
     */
    public function verifyUserNumberBeforeChange(){
        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)) {

            $numero = '+' . trim($_GET['numero']);
            $identifiant = $_GET['identifiant'];

            $user = User::where('id', $identifiant)->first();

            if($user != null){
                $findNumber = User::where('numero', $numero)->first();

                if($findNumber != null){
                    $result['message'] = 'Ce numéro est déjà pris.';
                    $result['error']  = true;
                    return response()->json($result);
                }

                /**
                 *  Envoie de sms au numéro
                 */

                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                srand((double)microtime()*1000000);
                $i = 0;
                $code = '' ;

                while ($i <= 4) {
                    $num = rand() % 33;
                    $tmp = substr($chars, $num, 1);
                    $code = $code . $tmp;
                    $i++;
                }

                $userNumber = preg_replace('/\s+/', '', substr($numero,1));

                $message = 'Code de changement de numéro '.$code;

                $sendSMS = new NotifToken();

                $output = $sendSMS->sendProviderSMS($userNumber,$message);

                if(strpos($output, '1701') !== false){
                    $user->code = $code;
                    $user->save();

                    $result['message'] = $code;
                    $result['error']  = false;
                    return response()->json($result);
                }else{
                    $result['message'] = 'Veuillez réessayer, un problème est survenu lors de l\'envoie du SMS d\'activation de compte';
                    $result['error']  = true;
                    //$user->delete();
                    return json_encode($result);
                }
            }

            $result['message'] = 'Impossible de trouver cet utilisateur';
            $result['error']  = true;
            return response()->json($result);
        }

    }

    public function changeUserNumberAfterVer(){

        $result['message'] = [];
        $result['error']  = false;

        if(isset($_GET)) {

            $numero = '+'.trim($_GET['numero']);
            $code  = $_GET['code'];
            $identifiant = $_GET['identifiant'];

            $user = User::where('id', $identifiant)->first();

            if($user != null){

                if($user->code == $code){
                    $user->numero = $numero;
                    $user->save();

                    $result['message'] = 'Votre numéro a été modifié';
                    $result['error']  = false;
                    return response()->json($result);
                }

                $result['message'] = 'Le code saisi n\'est pas correcte';
                $result['error']  = true;
                return response()->json($result);
            }

            $result['message'] = 'Le code saisi n\'est pas correcte';
            $result['error']  = true;
            return response()->json($result);
        }
    }
}
