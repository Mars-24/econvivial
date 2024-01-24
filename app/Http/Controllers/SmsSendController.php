<?php

namespace App\Http\Controllers;

use App\AffectationPE;
use App\Association;
use App\Ecole;
use App\Entretien;
use App\SmsSend;
use App\TypeActivite;
use App\TypeEntretien;
use App\EntretienPair;
use App\EntretienParticipant;
use App\NotifToken;
use App\PairEducateur;
use App\Region;
use App\TypeUser;
use App\User;
use App\Ville;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;
use DB;
use Excel;

class SmsSendController extends Controller
{
    //

    public function __invoke(Request $request)
    {
        $sms = SmsSend::where("destination", $request["numero"])->get();
        return response()->json(compact("sms"));
    }
}