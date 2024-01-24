<?php

namespace App\Http\Middleware;

use App\Abonnement;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->type_user_id == 1 || Auth::user()->typeuser->libelle == "etudiant" || Auth::user()->typeuser->libelle == "eleve")) {
            $check = Abonnement::where('user_id', Auth::user()->id)->first();
           //si l' abonnement est actif 
            if ($check->status == "actif") {
                return $next($request);
            } else {
                return redirect()->route("subscribe")->with('message', 'Veuillez souscrire a une offre');
            }
        }
        return redirect()->route('unAutorize');
    }
}
