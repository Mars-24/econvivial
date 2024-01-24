<?php

namespace App\Providers;

// use Auth;
// use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*' , function($view){
            $view->with('utilisateur' , Auth::user());
        });
		
		if (app()->environment('local')) {
		    DB::listen(function($sql) { info($sql->sql); info($sql->bindings); info($sql->time); });
		}
		
		// custom regex validation
		Validator::extend('custom_regex', 'App\Rules\Regex@validate');
		
		// custom range validation
		Validator::extend('custom_range', 'App\Rules\Range@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
