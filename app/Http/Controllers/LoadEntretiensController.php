<?php

namespace App\Http\Controllers;

use App\EntretienPair;
use Illuminate\Support\Facades\DB;

class LoadEntretiensController extends Controller
{
    public function index()
    {
        $page = 'consulter-entretiens';

        return view('PaireEducateur.PE.dashboardEntretien', compact('page'));
    }
}
