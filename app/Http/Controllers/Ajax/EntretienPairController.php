<?php

namespace App\Http\Controllers\Ajax;

use App\EntretienPair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EntretienPairController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->with(EntretienPair::query(), ['typeactivite', 'typeentretien', 'entretienparticipan.region'])
            ->sorting($request->order, $request->columns)
            ->filtering($request->search['value'], $request->columns)
            ->query();

        // counts
        $recordsTotal = EntretienPair::count();

        $recordsFiltered = !empty($request->search['value']) ? $query->count() : $recordsTotal;

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
