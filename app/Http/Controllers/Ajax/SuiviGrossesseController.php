<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\SuiviGrosesse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SuiviGrossesseController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(SuiviGrosesse::query())
            ->with('user')
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
        return $query->get()->map(function($model) {
            $months = $model->created_at->diffInMonths(Carbon::now());
            
            if($months >= 9) {
                $model->terme = true;
                
                $model->save();
            }
            
            return array_merge($model->toArray(), [
                'weeks' => $model->nbreSemaine + $model->created_at->diffInWeeks(Carbon::now()),
                'created_at' => $model->created_at->format('d-m-Y'),
                'dateRegle' => Carbon::parse($model->dateRegle)->format('d-m-Y'),
            ]);
        });
    }
}