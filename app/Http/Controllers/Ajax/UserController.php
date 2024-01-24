<?php

namespace App\Http\Controllers\Ajax;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(User::query()->whereHas('typeuser', function($query) { $query->utilisateurs(); }))
        // $query = $this->query(User::query())
            ->with(['region'])
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
        return $query->get()->map(function($user) {
            $user->age = empty($user->datenaissance)
                ? ''
                : Carbon::now()->diffInYears(Carbon::parse($user->datenaissance));
            
            return array_merge($user->toArray(), [
                'created_at' => $user->created_at->format('d-m-Y H:i'),
            ]);
        });
    }
}