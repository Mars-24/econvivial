
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntretienParticipantControllerData extends Controller
{
  public function data()
     {
      //  $data= DB::table('Donnees_PE')->paginate(20);

        //return response()->json($data);
	return dd('Hello');
   }
}
