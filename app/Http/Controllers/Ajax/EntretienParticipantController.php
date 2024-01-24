<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\EntretienParticipant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EntretienParticipantController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(EntretienParticipant::query())
            ->with(['entretienpair.typeactivite', 'entretienpair.typeentretien', 'entretienpair.user.paireducateur', 'region'])
            ->range($request->range)
            ->query;
        // counts
        $recordsTotal = $query->count();
            
        $query = $this->sorting($request->order, $request->columns)
            ->filtering($request->search['value'], $request->columns)
            ->query;
        
        $recordsFiltered = !empty($request->search['value']) ? $query->count() : $recordsTotal;
        
        $query = $this->limit($request->length, $request->start)->query;
        
        info('Query', ['query' => $query->toSql()]);
        
        return response()->json([
            'draw' => (int) $request->draw ?: 1,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $this->data($query),
        ]);
    }
    
    protected function data($query)
    {
        return $query->get()->map(function($user) {
            return array_merge($user->toArray(), [
                'created_at' => $user->created_at->format('d-m-Y'),
            ]);
        });
    }
}