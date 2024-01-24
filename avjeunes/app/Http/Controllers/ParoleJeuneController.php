<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\ParoleJeuneAdhesion;

class ParoleJeuneController extends Controller
{
    public function addAdhesionToParoleJeune(){
    	$user = Auth::user();
    	if($user){
    		
    		$var = new ParoleJeuneAdhesion();
    		dd('hgll');
            $var->numero = $user->numero;
            $var->username = $user->username;
            $var->codeUser = $user->codeUser;
            $var->dateAdhesion = null;
            $var->save();

             /*ParoleJeuneAdhesion::create([
                'numero'=> $user->numero,
                'username'=> $user->username,
                'codeUser'=> $user->codeUser,
                'dateAdhesion'=> Carbon::now(),
            ]);*/
    	}
    	header('Location: http://www.facebook.com/');
    }
}
