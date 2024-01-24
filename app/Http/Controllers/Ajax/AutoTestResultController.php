<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\AutoTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AutoTestResultController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(
            AutoTestResult::query()
                ->with('user.region')
                // ->whereHas('user', function($query) {
                //     $query->whereHas('typeuser', function($query) { $query->utilisateurs(); });
                // })
        )
            ->range($request->range)
            ->query;
            
        // counts
        $recordsTotal = $query->count();
        info('Query recordsTotal', ['query' => $query->toSql(), 'bindings' => $query->getBindings()]);
            
        $query = $this->sorting($request->order, $request->columns)
            ->filtering($request->search['value'], $request->columns)
            ->query;
        
        $recordsFiltered = !empty($request->search['value']) ? $query->count() : $recordsTotal;
        
        info('Query recordsFiltered', ['query' => $query->toSql(), 'bindings' => $query->getBindings()]);
        
        $query = $this->limit($request->length, $request->start)->query;
        
        info('Query', ['query' => $query->toSql(), 'bindings' => $query->getBindings()]);
        
        return response()->json([
            'draw' => (int) $request->draw ?: 1,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $this->data($query),
        ]);
    }
    
    protected function data($query)
    {
        return $query->get()->map(function($result) {
            $result->user->age = empty($result->user->datenaissance)
                ? ''
                : Carbon::now()->diffInYears(Carbon::parse($result->user->datenaissance));
            
            return array_merge($result->toArray(), [
                'created_at' => $result->created_at->format('d-m-Y H:i'),
            ]);
        });
    }
}