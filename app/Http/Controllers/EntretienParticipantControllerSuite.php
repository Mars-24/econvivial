<?php

namespace App\Http\Controllers;

use App\EntretienPair;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntretienParticipantControllerSuite extends Controller
{
  public function __invoke()
     {
        $page = 'entretien-participant-suite';

        return view('Admin.entretien_participant_suite.index', compact('page'));
   }
}
