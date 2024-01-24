<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    // Google Sociale login
    public function google_resgistration(){
        return Socialite::driver('google')->redirect();
    }

    public function store(){
      $socialUserData = Socialite::driver('google')->user();

      $user = User::where('google_id',$socialUserData->id)->first();

      if(!$user){
            //dd($socialUserData);
            return redirect()->route('google_register.complete',encrypt($socialUserData));
        }else{
        Auth::login($user);
        return redirect()->intended('espacemembre');
        }
    }

    public function googleComplete($socialData){
        $googleData = decrypt($socialData);
        $retrieveData=array(
            "id"=>$googleData->id,
            'name'=>$googleData->name,
            "email"=>$googleData->email,
        );
        //dd($retrieveData);
        return view('Register.googleRegistration',compact('retrieveData'));
    }

    public function storegoogleData(Request $request){
        //dd($request->all());
        //dd($request->someData[0]);

        $data = [
            "google_id"=>$request->someData[0],
            "username"=>$request->someData[1],
            "email"=>$request->someData[2],
            "datenaissance" =>$request->datenaisance,
            "sexe" => $request->sexe,
            "country" => $request->country,
            "region" => $request->region,
            "numero" => $request->numero,
            "profession" => $request->profession
            ];
            dd($data);

    }

    // facebook Social login 
    public function facebook_resgistration(){
        return Socialite::driver('facebook')->redirect();

    }
    public function facebookCallBack(){
        
        return dd('Hello');
       // $socialUserData = Socialite::driver('facebook')->user();
       // dd($socialUserData);
       // $user = User::where('facebook_id',$socialUserData->id)->first();
    }
}
