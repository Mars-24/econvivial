<?php

namespace App\Http\Controllers;

use App\Theme;
use App\WebSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //

    public function  index(){
        $videos = WebSerie::where("userDash",true)->get();

        if(count($videos) > 4)
        $videos = $videos->random(4);

        $theme = Theme::where("user_id", Auth::user()->id)->first();
        if($theme != null){
            Session::put("navColor", $theme->navColor);
            Session::put("sideColor", $theme->sideColor);
        }

      //  return json_encode($videos);
        return view("Dashboard.index")
            ->with(["page" => "dashboard"])
            ->with(["videos" => $videos]);
    }
}
