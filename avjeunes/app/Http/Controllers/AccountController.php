<?php

namespace App\Http\Controllers;

use App\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    // Utilisateurs profil
    public function index(){
        $user = Auth::user();
        return view("Profile.index")
        ->with(["user" => $user])->with(["page" => "profil"]);
    }

    public function updateUserInfo(Request $request){


        //Vérification de la date de naissance

        $date = new \DateTime();

        try{
            $dateCourante  = new Carbon($date->format("Y-M-d"));
            $dateNaissance = new Carbon($request["datenaissance"]);
            if($dateNaissance->diffInYears($dateCourante) <= 13){
                return redirect()->back()->with(["error" => "Veuillez renseigner une date de naissance valide"])->withInput();
            }
        }catch (\Exception $e){
            return redirect()->back()->with(["error" => "Le format de la date de naissance n'est pas valide"])->withInput();
        }

        $user = Auth::user();
        if($user != null){
            $user->username = $request["username"];
            $user->numero = $request["numero"];
            $user->sexe = $request["sexe"];
            $user->datenaissance = $request["datenaissance"];
            $user->save();
            return redirect()->back()->with(["message" => "Informations utilisateur modifiées avec succès"]);
        }
        return redirect()->back()->with(["error" => "Informations utilisateur modifiées avec succès"]);
    }

    public function updateProfile(Request $request){

        $this->validate($request, [
            "image" => "required"
        ]);
        $user = Auth::user();
        $image = $request->file("image");
        if($image){
            $extension = $image->getClientOriginalExtension();
            $fileName = time()."profile.".$extension;
            Image::make($image)->resize(250,250)->save(base_path("/images/profil/".$fileName));
            $user->profil = $fileName;
            $user->save();
            return redirect()->back()->with(["message" => "Photo de profil changée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, la photo de profil n'a pas été changé"]);
    }

    public function  updatePassword(Request $request){

        $this->validate($request, [
            'password' => "required",
            'oldPassword' => "required",
            'confirmation' => "required",
        ]);
        $user = Auth::user();

        if(Auth::attempt([ "email" => $user->email, "password" => $request['oldPassword']])){

            if($request['password'] == $request['confirmation']){
                $user->password = $request["password"];
                $user->save();
                Auth::logout();
                return redirect()->route('connexion')
                    ->with("message" , "Mot de passe changer avec succès.
                     Veuillez vous reconnecter avec votre nouveau mot de passe");
            }
            return redirect()->back()
                ->with(['error' => "Veuillez confirmer votre nouveau mot de passe"]);
        }
        return redirect()->back()
            ->with(['error' => "Votre ancien mot de passe est incorrect. Etes-vous vraiment celui que vous prétendez être?"]);
    }


    // Teleconseiller profil

    public function conseillerProfil(){
        $user = Auth::user();
        return view("Profile.conseillerProfil")
            ->with(["user" => $user])->with(["page" => "profil"]);
    }

    public function updateUserConseillerInfo(Request $request){
        $user = Auth::user();
        if($user != null){
            $user->username = $request["username"];
            $user->numero = $request["numero"];
            $user->save();
            return redirect()->back()->with(["message" => "Informations utilisateur modifiées avec succès"]);
        }
        return redirect()->back()->with(["error" => "Informations utilisateur modifiées avec succès"]);
    }

    public function updateUserConseillerProfile(Request $request){

        $this->validate($request, [
            "image" => "required"
        ]);
        $user = Auth::user();
        $image = $request->file("image");
        if($image){
            $extension = $image->getClientOriginalExtension();
            $fileName = time()."profile.".$extension;
            Image::make($image)->resize(250,250)->save(base_path("/images/profil/".$fileName));
            $user->profil = $fileName;
            $user->save();
            return redirect()->back()->with(["message" => "Photo de profil changée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, la photo de profil n'a pas été changé"]);
    }

    public function  updateUserConseillerPassword(Request $request){

        $this->validate($request, [
            'password' => "required",
            'oldPassword' => "required",
            'confirmation' => "required",
        ]);
        $user = Auth::user();

        if(Auth::attempt([ "email" => $user->email, "password" => $request['oldPassword']])){

            if($request['password'] == $request['confirmation']){
                $user->password = $request["password"];
                $user->save();
                Auth::logout();
                return redirect()->route('connexion')
                    ->with("message" , "Mot de passe changer avec succès.
                     Veuillez vous reconnecter avec votre nouveau mot de passe");
            }
            return redirect()->back()
                ->with(['error' => "Veuillez confirmer votre nouveau mot de passe"]);
        }
        return redirect()->back()
            ->with(['error' => "Votre ancien mot de passe est incorrect. Etes-vous vraiment celui que vous prétendez être?"]);
    }



    // Admin profil

    public function adminProfil(){
        $user = Auth::user();
        return view("Profile.adminProfil")
            ->with(["user" => $user])->with(["page" => "profil"]);
    }

    public function updateAdminInfo(Request $request){
        $user = Auth::user();
        if($user != null){
            $user->username = $request["username"];
            $user->numero = $request["numero"];
            $user->save();
            return redirect()->back()->with(["message" => "Informations utilisateur modifiées avec succès"]);
        }
        return redirect()->back()->with(["error" => "Informations utilisateur modifiées avec succès"]);
    }

    public function updateAdminProfile(Request $request){

        $this->validate($request, [
            "image" => "required"
        ]);
        $user = Auth::user();
        $image = $request->file("image");
        if($image){
            $extension = $image->getClientOriginalExtension();
            $fileName = time()."profile.".$extension;
            Image::make($image)->resize(250,250)->save(base_path("/images/profil/".$fileName));
            $user->profil = $fileName;
            $user->save();
            return redirect()->back()->with(["message" => "Photo de profil changée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, la photo de profil n'a pas été changé"]);
    }

    public function  updateAdminPassword(Request $request){

        $this->validate($request, [
            'password' => "required",
            'oldPassword' => "required",
            'confirmation' => "required",
        ]);
        $user = Auth::user();

        if(Auth::attempt([ "email" => $user->email, "password" => $request['oldPassword']])){

            if($request['password'] == $request['confirmation']){
                $user->password = $request["password"];
                $user->save();
                Auth::logout();
                return redirect()->route('connexion')
                    ->with("message" , "Mot de passe changer avec succès.
                     Veuillez vous reconnecter avec votre nouveau mot de passe");
            }
            return redirect()->back()
                ->with(['error' => "Veuillez confirmer votre nouveau mot de passe"]);
        }
        return redirect()->back()
            ->with(['error' => "Votre ancien mot de passe est incorrect. Etes-vous vraiment celui que vous prétendez être?"]);
    }


    // Formation sanitaire profil

    public function userFormationProfil(){
        $user = Auth::user();
        return view("Profile.formationProfil")
            ->with(["user" => $user])->with(["page" => "profil"]);
    }

    public function updateUserFormationInfo(Request $request){

        $user = Auth::user();
        if($user != null){
            $user->username = $request["username"];
            $user->numero = $request["numero"];
            $user->save();
            return redirect()->back()->with(["message" => "Informations utilisateur modifiées avec succès"]);
        }
        return redirect()->back()->with(["error" => "Informations utilisateur modifiées avec succès"]);

    }

    public function updateUserFormationProfile(Request $request){

        $this->validate($request, [
            "image" => "required"
        ]);
        $user = Auth::user();
        $image = $request->file("image");
        if($image){
            $extension = $image->getClientOriginalExtension();
            $fileName = time()."profile.".$extension;
            Image::make($image)->resize(250,250)->save(base_path("/images/profil/".$fileName));
            $user->profil = $fileName;
            $user->save();
            return redirect()->back()->with(["message" => "Photo de profil changée avec succès"]);
        }
        return redirect()->back()->with(["error" => "Une erreur s'est produite, la photo de profil n'a pas été changé"]);

    }

    public function  updateUserFormationPassword(Request $request){

        $this->validate($request, [
            'password' => "required",
            'oldPassword' => "required",
            'confirmation' => "required",
        ]);
        $user = Auth::user();

        if(Auth::attempt([ "email" => $user->email, "password" => $request['oldPassword']])){

            if($request['password'] == $request['confirmation']){
                $user->password = $request["password"];
                $user->save();
                Auth::logout();
                return redirect()->route('connexion')
                    ->with("message" , "Mot de passe changer avec succès.
                     Veuillez vous reconnecter avec votre nouveau mot de passe");
            }
            return redirect()->back()
                ->with(['error' => "Veuillez confirmer votre nouveau mot de passe"]);
        }
        return redirect()->back()
            ->with(['error' => "Votre ancien mot de passe est incorrect. Etes-vous vraiment celui que vous prétendez être?"]);
    }



    public function introuvable(){
        return view("Error.404");
    }

    public function error(){
        return view("Error.504");
    }

    public function changeSideBarTheme(Request $request){

        if($request["color"] != null){
            $theme = Theme::where("user_id", Auth::user()->id)->first();
            if($theme != null){
                $theme->sideColor = $request["color"];
                $theme->save();
                //Put the side color to the session
                Session::put("sideColor", $request["color"]);
                return "Save";
            }else{
                $theme = new Theme();
                $theme->sideColor = $request["color"];
                $theme->user_id = Auth::user()->id;
                $theme->save();
                //Put the side color to the session
                Session::put("sideColor", $request["color"]);
                return "Save";
            }
        }
    }

    /**
     * @param Request $request
     * @return string
     * Change nav theme
     */
    public function changeNavBarTheme(Request $request){

        if($request["color"] != null){
            $theme = Theme::where("user_id", Auth::user()->id)->first();
            if($theme != null){
                $theme->navColor = $request["color"];
                $theme->save();
                //Put the side color to the session
                Session::put("navColor", $request["color"]);
                return "Save";
            }else{
                $theme = new Theme();
                $theme->navColor = $request["color"];
                $theme->user_id = Auth::user()->id;
                $theme->save();
                //Put the side color to the session
                Session::put("navColor", $request["color"]);
                return "Save";
            }
        }
    }
}
