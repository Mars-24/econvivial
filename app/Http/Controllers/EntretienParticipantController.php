<?php

namespace App\Http\Controllers;

use App\EntretienPair;
use Illuminate\Support\Facades\DB;

class EntretienParticipantController extends Controller
{
    public function __invoke()
    {
        $page = 'entretien-participant';

        return view('Admin.entretien_participant.index', compact('page'));
    }
}
