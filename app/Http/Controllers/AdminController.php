<?php

namespace App\Http\Controllers;

use DateTime;
use Excel;
use App\User;
use App\Role;
use App\Region;
use App\Presence;
use App\Planning;
use App\TypeUser;
use App\WebSerie;
use Carbon\Carbon;
use App\NotifToken;
use App\AffecterRole;
use Exception;
use GuzzleHttp\Client;
use App\ObjetConsultation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\PlanningSouscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\FormationSanitaire;

class AdminController extends Controller
{
    public function dashboard()
    {
        $roles = Role::whereHas('affecterRoles', function($query) {
            $query->whereUserId(Auth::user()->id);
        })->get();

        return view("Admin.User.dashboard")
            ->with(["roles" => $roles])
            ->with(["page" => "dashboard"]);
            
    }

    public function index(){
        $users = User::where("type_user_id",2)->where("username", "<>", "Myster")->orderBy("username", "asc")->get();
         $roles = DB::select("select * from roles where code not in ('TC', 'FS')");
        return view("Admin.User.index")
                ->with(["users" => $users])
                ->with(["roles" => $roles])
                ->with(["page" => "gestion-admin"]);
    }

    public function saveAdminConvivial(Request $request){

        $typeUser = TypeUser::where("libelle", "admin")->first();

        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }

      //  return $request["email"]." and ".$request["password"];

        $user  = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = null;
        $user->password = $request["password"];
        $user->type_user_id = $typeUser->id;
        $user->activation = true;

        $user->save();

            //affecter automatique le role
        $roleAffecter = new AffecterRole();
        $roleAffecter->user_id = $user->id;
        $roleAffecter->role_id = $request["role"];
        $roleAffecter->save();

        return redirect()->back()->with(["message" => "Administrateur créer avec succès"]);
    }

    public function deleteUser(Request $request){
        $user = User::where("id", $request["id"])->first();
        if($user == null){
            return redirect()->back()->with(["erreur" => "Utilisateur inexistant"]);
        }
        $user->delete();
        return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
    }

    public function deleteAdminFSUser(Request $request){
        $user = User::where("id", $request["id"])->first();

        $user->delete();
        return redirect()->back()->with(["message" => "Utilisateur supprimé avec succès"]);
    }

    //Objet de consultation

    public function getObjetConsultation(){
        $objets  = ObjetConsultation::orderBy("libelle", "asc")->get();
        return view("Admin.ObjetConsultation.index")
                ->with(["objets" => $objets])
                ->with(["page" => "objet-consultation"]);
    }

    public function saveObjetConsultation(Request $request){
        $objet = new ObjetConsultation();
        $objet->libelle = $request["libelle"];
        $objet->description = $request["description"];
        $objet->save();
        return redirect()->back()->with(["message" => "Objet de consultation enrégistré avec succès"]);
    }

    public function editObjetConsultation(Request $request){
        $objet = ObjetConsultation::where("id", $request["id"])->first();
        if($objet == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, la modification n'a pas aboutit"]);
        }
        $objet->libelle = $request["libelle"];
        $objet->description = $request["description"];
        $objet->save();
        return redirect()->back()->with(["message" => "Modification effectuée avec succès"]);

    }

    public  function  deleteObjetConsultation(Request $request){
        $objet = ObjetConsultation::where("id", $request["id"])->first();
        if($objet == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, la modification n'a pas aboutit"]);
        }
        $objet->delete();
        return redirect()->back()->with(["message" => "Supression effectuée avec succès"]);
    }




                


    public function getListeUser(Request $request){
        $users = User::where('type_user_id', 1)->orderByDesc('id', 'desc')->get();

        // $quartiers = Quartier::orderBy("libelle", "asc")->get();
        return view("Admin.User.listeUser")
                ->with(["page" => "afficher-liste-utilisateur"])
                ->with(["users" => $users]);
                // ->with(["quartiers" => $quartiers]);

        //           $user  = new User();
        //  $user->username = $request["username"];
        //  $user->email = $request["email"];
        //  $user->age ;
        // $user->sexe ;
        // $user->profession ;
        // $user->numero ;
        // $user->region;
        // $user->codeuser = true;

        //  $user->save();
    }




   //// public function getListeUser(Request $request) {


       
    //     $regions = Region::orderBy('libelle')->get();

    //     if(isset($_GET["debut"]) && isset($_GET["fin"]) $request->filled('debut') && $request->filled('fin')) {
    //       $debut = $_GET["debut"];
    //       $fin = $_GET["fin"];

    //         if ($debut > $fin) {
    //             return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
    //         }

    //         $users = User::where("type_user_id", 1)
    //                         ->where("created_at", ">=", $debut." 00:00:00")
    //                         ->where("created_at", "<=", $fin." 23:59:59")
    //                         ->orderBy("id", "desc")->get();


    //         $date = new \DateTime();

    //         return view("Admin.User.listeUser")
    //           ->with(["users" => $users])
    //           ->with(["debut" => $debut])
    //           ->with(["fin" => $fin])
    //             ->with(["regions" => $regions])
    //           ->with(["date" => new Carbon($date->format("Y-M-d"))])
    //           ->with(["page" => "liste-user"]);
    //   }else{
    //       $users = User::where('type_user_id', 1)->orderByDesc('id', 'desc')->take(25)->get();

    //     //   $date = new \DateTime();

    //     //   $carbonDate = new Carbon($date->format("Y-M-d"));



    //       foreach ($users as $user) {
    //           $age = $carbonDate->diffInYears(new \Carbon\Carbon($user->datenaissance));

    //           $ageConcat = $age + $user->id;

    //           $user->codeUser = $user->id."eCC".$ageConcat."U";

    //           $user->save();
    //       }

    //       return view('Admin.User.listeUser')
    //           ->with(["users" => $users])
    //           ->with(["debut" => null])
    //           ->with(["fin" => null])
    //             ->with(["regions" => $regions])
    //           ->with(["date" => new Carbon($date->format("Y-M-d"))])
    //           ->with(["page" => "liste-user"]);
    //   }

      ////  $regions = Region::orderBy('libelle')->get();

        // $users = User::where('type_user_id', 1)->orderByDesc('id', 'desc')->take(25)->get();

        // foreach ($users as $user) {
        //     $age = $carbonDate->diffInYears(new \Carbon\Carbon($user->datenaissance));

        //     $ageConcat = $age + $user->id;

        //     $user->codeUser = $user->id."eCC".$ageConcat."U";

        //     $user->save();
        // }

        // $date = Carbon::now();

       /// $page = 'liste-user';

        // return view('Admin.User.listeUser', compact('regions', 'users', 'date', 'page'));
         //// return view('Admin.User.listeUser', compact('page', 'regions'));

        
        /// $user  = new User();
        /// $user->username = $request["username"];
        /// $user->email = $request["email"];
        /// // $user->age = null;
        // // $user->sexe = null;
        // // $user->nationalite = null;
        // // $user->numero = null;
        // // $user->password = $request["password"];
        // // $user->activation = true;

        // $user->save();



   /// }


    public function exportListeUserToExcel(){

     if(isset($_GET["debut"]) && isset($_GET["fin"])){
            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut != null && $fin != null){
                $users = User::where("type_user_id", 1)
                    ->where("created_at", ">=", $debut." 00:00:00")
                    ->where("created_at", "<=", $fin." 23:59:59")
                    ->orderBy("id", "desc")->get();
            }else{
                $users = User::where("type_user_id", 1)->orderBy("id", "desc")->get();
            }

        }else{
            $users = User::where("type_user_id", 1)->orderBy("id", "desc")->get();
        }

        Excel::create('Liste_Utilisateur', function($excel) use($users) {
            $excel->setTitle("Liste des utilisateurs");
            $excel->sheet('ExportFile', function($sheet) use($users) {

                $date = new DateTime();
                $dateJour = new Carbon($date->format("Y-M-d"));

                foreach($users as $user) {
                    $data[] = array(
                        $user->codeUser,
                        $user->username != null ? $user->username : "Non défini",
                        $user->email != null ? $user->email : "Non défini",
                        $user->numero,
                        $user->sexe == "M" ? "Masculin" : "Féminin",
                        $dateJour->diffInYears(new Carbon($user->datenaissance)) == null ? 0 : $dateJour->diffInYears(new Carbon($user->datenaissance)) ,
                        $user->region != null ? $user->region->libelle : "Non défini",
                        $user->profession != null ? $user->profession : "Non défini",
                        date_format(date_create($user->created_at), "d/m/y")
                    );
                }

                $headings = array("Code","Nom utilisateur", "Email", 'N° Téléphone', 'Sexe', 'Age','Région','Profession','Compte crée le');
                $sheet->prependRow(1, $headings);
                $sheet->fromArray($data, null, 'A1', false, true);
            });
        })->export('xlsx');

        return redirect()->with(["message" => "Fichier exporté"]);
    }


      public function editUserInfo(Request $request){

        $user = User::where("id", $request["id"])->first();

        if($user != null){
            //Vérification de la date de naissance

            $date = new DateTime();

            try{
                $dateCourante  = new Carbon($date->format("Y-M-d"));

                $dateNaissance = new Carbon($request["datenaissance"]);

                if($dateNaissance->diffInYears($dateCourante) <= 13){
                    return redirect()->back()->with(["error" => "Veuillez renseigner une date de naissance valide"])->withInput();
                }
            }catch (Exception $e){
                return redirect()->back()->with(["error" => "Le format de la date de naissance n'est pas valide"])->withInput();
            }

            $user->username = $request["username"];
            $user->datenaissance = $request["datenaissance"];
            $user->sexe = $request["sexe"];
            $user->region_id = $request["region"];
            $user->profession = $request["profession"];
            $user->save();

            return redirect()->back()->with(["message" => "Informations modifiées avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier"]);
    }


    /**
     * Informer des users par SMS
     */

    public function sendSmsToUser(Request $request){


        $userIDs = $request["userID"];

        $tokens = array();
        $message = "";
        foreach ($userIDs as $id){
            try{
                    $user = User::where("id", $id)->first();
                    if($user != null){
                        $userNumber = preg_replace('/\s+/', '', substr($user->numero,1));

                        $message = "Cher utilisateur de eCentre Convivial, notre service assistance en ligne a répondu à votre message. Merci de vous connecter à votre compte via : www.e-centreconvivial.org";

                       // $client = new Client();
                        $res = $client->request('GET', "http://sms.supersmsgb.com:8080/sendsms?username=slu-majecticp&password=majestic&type=0&dlr=1&destination=".$userNumber."&source=eConvivial&message=".$message);


                        $sendSMS = new NotifToken();

                        $output = $sendSMS->sendProviderSMS($userNumber,$message);

                        if(strpos($output, '1701') !== false){


                        }else{

                        }

                        //Envoie de notification Internet sur leur Smartphone

                        if($user->id != null){
                            $notifKey = NotifToken::where("user_id", $user->id)->first();
                            if($notifKey !=null)
                                $tokens[] =  $notifKey->token;
                        }

                    }

            }catch (Exception $e){
                return redirect()->back()->with(["error"  => "Une erreur s'est produite lors de la diffusion du message"]);
            }
        }
        $notifToken = new NotifToken();
        $notifToken->sendNotificationToUser($tokens, "eCentre Convivial", $message);

        return redirect()->back()->with(["message"  => "SMS d'alerte diffusé avec succès"]);
    }

    public function getListePresenceTeleConseiller(){

        if(isset($_GET["debut"]) && isset($_GET["fin"])){

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            if($debut > $fin){
              return redirect()->back()->with(["error" => "Veuillez saisir des dates valides"]);
            }


            /*$presences = DB::select("SELECT * FROM presences where created_at
			BETWEEN '".$debut." 00:00:00' and  '".$fin." 23:59:59' group by prenom");*/

			$presences = DB::query()
			->from('presences')
			->where('presences.teleconseiller_id', '!=', 0)
			->whereBetween('presences.created_at', [$debut." 00:00:00", $fin.' 23:59:59'])
			->groupBy('presences.teleconseiller_id')
			->get();

			$teleconseillers = DB::select("SELECT * FROM teleconseillers");

            return view("Admin.Teleconseiller.presence")
                ->with(["presences" => $presences])
                ->with(["teleconseillers" => $teleconseillers])
                ->with(["debut" => $debut])
                ->with(["fin" => $fin])
                ->with(["page" => "gestion-presence-teleconseiller"]);
        }else{
            $presences = DB::select("SELECT * FROM presences group by prenom");

			$teleconseillers = DB::select("SELECT * FROM teleconseillers");

            return view("Admin.Teleconseiller.presence")
                ->with(["presences" => $presences])
                ->with(["teleconseillers" => $teleconseillers])
                ->with(["debut" => null])
                ->with(["fin" => null])
                ->with(["page" => "gestion-presence-teleconseiller"]);
        }

    }

    /**
     * @return $this|RedirectResponse
     * Récupérer la liste de présence d'un teleconseiller
     */ 

    public function getListeOneTeleConseiller(){

        if(isset($_GET)){
            $id = $_GET["ref"];

            $debut = $_GET["debut"];
            $fin = $_GET["fin"];

            $acteur = Presence::where("id",$id)->first();

            if($fin == null && $debut == null){
                $presences = Presence::where("nom",$acteur->nom)->orderBy("id", "desc")->get();
            }else{
                $presences = DB::select("select * from presences where prenom =\"".$acteur->prenom."\" and created_at between '".$debut."  00:00:00' and '".$fin." 23:59:59' order by id desc");
            }
            return view("Admin.Teleconseiller.userPresence")
                ->with(["presences" => $presences])
                ->with(["debut" => $debut])
                ->with(["fin" => $fin])
                ->with(["page" => "gestion-presence-teleconseiller"]);
        }

    }
 
    public function getDetailPrestation(){

        if(isset($_GET)){
            $id = $_GET["ref"];

            $presence = Presence::where("id", $id)->first();
            if($presence != null){
                return view("Admin.Teleconseiller.detailPrestation")->with(["presence" => $presence])->with(["page" => "gestion-presence-teleconseiller"]);
            }
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de consulter les détails"])->with(["page" => "gestion-presence-teleconseiller"]);
        }
    }



    /**
     * Enrégistrer un nouveau utilisateur pour la gestion des
     * Femmes enceintes et PVVIH
     */

    public function getAdminHealthPage(){
        $users = DB::select("select * from users where type_user_id in (12,18,19) order by id desc");
        $formations = FormationSanitaire::get();
        return view("Admin.User.innov")
            ->with(["users" => $users])
            ->with(["formations" => $formations])
            ->with(["page" => "gestion-innov"]);
    }


    public function saveAdminInnov(Request $request){

        $typeUser = TypeUser::where("libelle","=", $request["typeAdmin"])->first();
        if($request["password"] != $request['confirmation']){
            return redirect()->back()->with(["erreur" => "Veuillez confirmer votre mot de passe"]);
        }

        $formation = FormationSanitaire::where("libelle", $request["formation"])->first();
        if($formation == null){
            return redirect()->back()->with(["error" => "Formation sanitaire inexistante"]);
        }

        $user  = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->datenaissance = null;
        $user->sexe = null;
        $user->nationalite = null;
        $user->numero = $request["telephone"];
        $user->password = $request["password"];
        $user->type_user_id = $typeUser->id;
        $user->formation_sanitaire_id = $formation->id;
        $user->activation = true;
        if($request["typeAdmin"] == "Femmes Enceintes"){
            //$user->typeCpn = $request["typeCPN"];
            $user->typeCpn = 8;
        }

        $user->save();
        return redirect()->back()->with(["message" => "Administrateur  créer avec succès"]);
    }



        /**
     * Gestion des webSéries
     */

    public function getWebSeriePage(){

        $webSerie = WebSerie::orderBy("id", "desc")->get();
        return view("Admin.WebSerie.serie")
                ->with(["series" => $webSerie])
                ->with(["page" => "web-serie"]);
    }

     public function getWebSerieUserDash(){

       $webSerie = WebSerie::where("userDash",true)->orderBy("id", "desc")->get();
        return view("Admin.WebSerie.userDash")
            ->with(["series" => $webSerie])
            ->with(["page" => "web-serie-dash"]);
    }

    public function postSaveWebSerie(Request $request)
    {
        // dd($request->file('image')->store('webtv', 'webtv_driver'));

        $this->validate($request, [
            'titre' => 'required',
            'url' => 'required',
            'description' => 'required',
            'userDash' => 'nullable',
            'image' => 'required'
        ]);

		if ($request->HasFile('image')) {
            $cover = $request->file('image');
            $image = Image::make($cover)->encode('jpg');
            $image->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Image::make($image)->save('images/webtv'.$request->url.'.jpg');

            $file_name ='images/webtv'.$request->url.'.jpg';

        }

		$serie = new WebSerie();
        $serie->titre = $request["titre"];
        $serie->description = $request["description"];
        $serie->url = $request["url"];
        $serie->userDash = $request["userDash"];
		$serie->image = $file_name;

        $serie->save();

        return redirect()->back()->with(['message' => 'Série enrégistré']);
    }

    public function postEditWebSerie(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'url' => 'required',
            'description' => 'required',
            'userDash' => 'nullable',
        ]);

        $serie = WebSerie::where('id', $request['id'])->first();

        if ($serie !== null) {
            $serie->fill($request->only('titre', 'url', 'description', 'userDash'));

            if ($request->has('image')) {
                Storage::delete('webtv/' . $serie->image);

                $serie->image = $request->file('image')->store('webtv', 'webtv_driver');
            }

            $serie->save();

            return redirect()->back()->with(['message' => 'Série modifiée']);
        }

        return redirect()->back()->with(['error' => 'Impossible de modifier la web série']);
    }


    public function postDeleteWebSerie(Request $request)
    {
        $serie = WebSerie::where('id', $request['id'])->first();

        if ($serie !== null) {
            $serie->delete();

            Storage::delete('webtv/' . $serie->image);

            return 'success';
        }

        return 'error';
    }

      //Afficher liste des admin suivi d'affectation

    public function listeAdmin(){
        $users = User::where("type_user_id",2)->orderBy("username", "asc")->get();
        return view("Admin.Role.listeAdmin")
            ->with(["users" => $users])
            ->with(["page" => "liste-admin"]);
    }

    public function affecterRole(){
        if(isset($_GET)){
          $id = $_GET["id"];

          $user = User::where("id", $id)->first();

          if($user != null){
           $roles = DB::select("select * from roles where id not in (select role_id from affecter_roles where user_id  = ".$id.")");

           //$rolesAffecter = DB::select("select * from roles where id in (select role_id from affecter_roles where user_id  = ".$id.")");

           $rolesAffecter = AffecterRole::where("user_id", $id)->get();
           return view("Admin.Role.affecterRole")
                    ->with(["roles" => $roles])
                    ->with(["userID" => $id])
                    ->with(["affectations" => $rolesAffecter])
                    ->with(["page" => "liste-admin"]);
          }
          return redirect()->back()->with(["error" => "Impossible d'affecter"]);
        }
    }

    public function postAffectation(Request $request){

        $roles = $request["roleID"];
        $userID = $request["userID"];

        foreach($roles as $roleID){
            //Nouveau role à enrégistrer

            $roleAffecter = new AffecterRole();
            $roleAffecter->user_id = $userID;
            $roleAffecter->role_id = $roleID;
            $roleAffecter->save();
        }

        return redirect()->back()->with(["message" => "Roles affectés"]);
    }

    public function postDeleteAffectation(Request $request){

        $affectation = AffecterRole::where("id", $request["affectationID"])->first();

        if($affectation != null){
            $affectation->delete();
            return redirect()->back()->with(["message" => "Role retiré"]);
        }
        redirect()->back()->with(["error" => "Impossible de retirer le role"]);
    }


    /**
     * Planning famillial
     *
     */
    public function getPlanningPage(){

        $plannings = Planning::where("type", "moderne")->orderBy("id", "desc")->get();
         return view("Admin.Planning.moderne")
                ->with(["plannings" => $plannings])
                ->with(["type" => "moderne"])
                ->with(["page" => "planning-moderner"]);

    }

    public function getPlanningPageNaturelle(){

        $plannings = Planning::where("type", "naturelle")->orderBy("id", "desc")->get();

            return view("Admin.Planning.naturelle")
                ->with(["plannings" => $plannings])
                ->with(["type" => "naturelle"])
                ->with(["page" => "planning-naturelle"]);
    }

    public function savePlanning(Request $request){
        $planning = new Planning();
        $planning->titre = $request["titre"];
        $planning->description = $request["description"];
        $planning->url = $request["url"];
        $planning->type = $request["type"];

        $image = $request->file("image");
        if($image != null){
            $extension = $image->getClientOriginalExtension();
            $fileName = time()."Planning.".$extension;
            Image::make($image)->resize(400,250)->save(base_path("images/plannings/".$fileName));
            $planning->image = $fileName;
        }
        $planning->save();

        return redirect()->back()->with(["message" => "Planning moderne enrégistré"]);
    }

    public  function editPlanning(Request $request){

        $planning = Planning::where("id", $request["id"])->first();
        if($planning != null){

            $planning->titre = $request["titre"];
            $planning->description = $request["description"];
            $planning->url = $request["url"];
            $planning->type = $request["type"];

            $image = $request->file("image");
            if($image != null){
                $extension = $image->getClientOriginalExtension();
                $fileName = time()."Planning.".$extension;
                Image::make($image)->resize(400,250)->save(base_path("images/plannings/".$fileName));
                $planning->image = $fileName;
            }
            $planning->save();
            return redirect()->back()->with(["message" => "Planning modifié avec succès"]);
        }
        return redirect()->back()->with(["error" => "Impossible de modifier le planning"]);
    }

    public function  deletePlanning(Request $request){
        $planning = Planning::where("id", $request["id"])->first();
        if($planning != null){
            $planning->delete();
            return redirect()->back()->with(["message" => "Planning supprimé"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer le planning"]);
    }

    public function getApiListePlanning($type){
        $result["plannings"] = [];
        $result["error"]  = false;
        $plannings = Planning::where("type",$type)->orderBy("id", "desc")->get();
        $result["plannings"] = $plannings;
        return response()->json($result);
    }

    public function getListeSouscriptionPlanning(){
        $plannings = PlanningSouscription::orderBy("id", "desc")->get();
        return view("Admin.Planning.souscription")
            ->with(["plannings" => $plannings])
            ->with(["page" => "planning-souscription"]);
    }

    public function deleteSouscription(Request $request){
        $planning = PlanningSouscription::where("id", $request["id"])->first();
        if($planning != null){
            $planning->delete();
            return redirect()->back()->with(["message" => "Souscription supprimé"]);
        }
        return redirect()->back()->with(["error" => "Impossible de supprimer la souscription"]);
    }

}
