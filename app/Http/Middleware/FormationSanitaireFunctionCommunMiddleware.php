<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationSanitaireFunctionCommunMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->type_user_id == 12 || Auth::user()->type_user_id == 18 || Auth::user()->type_user_id == 19 || Auth::user()->type_user_id == 20 || Auth::user()->type_user_id == 21)
                return $next($request);
        }
        return redirect()->route('unAutorize');
    }
}
