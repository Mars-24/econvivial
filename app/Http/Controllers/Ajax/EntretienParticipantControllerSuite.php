<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\EntretienParticipant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EntretienParticipantControllerSuite extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = DB::table('aa_11_xlsx___feuil1')->orderBy('created_at','desc');

        // counts
        $recordsTotal =  $query->count();
	//$query = $query->sorting($request->order,$request->columns)->filtering($request->search['value'],$request->columns);	
        $recordsFiltered = !empty($request->search['value']) ? $query->count() : $recordsTotal;
	//if($request->order){
	//	$query=$query->orderBy('date',$request->order);
	//};
        // pagination
        $query = $query->offset($request->start)->limit($request->length);

        return response()->json([
            'draw' => (int) $request->draw ?: 1,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $this->data($query),
        ]);
    }

    protected function data($query)
    {
        return $query->get();
    }
}
    
