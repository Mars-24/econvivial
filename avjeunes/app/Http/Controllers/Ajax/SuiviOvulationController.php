<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\Menstruation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SuiviOvulationController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(Menstruation::query()->where('type', 'ovulation'))
            ->with(['user'])
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
            $dateProchainOvulation = Carbon::parse($model->dateProchainOvulation);
            
            // if ($dateProchainOvulation->lt(Carbon::now())) {
            //     while($dateProch < $dateCourant){
            //         $model->dateRegle = $model->dateProchainOvulation;
                    
            //         $model->dateProchainOvulation = $dateProchainOvulation->addDay($model->dureeCycle);
                    
            //         $model->save();
                    
            //         $dateProchainOvulation = new Carbon($model->dateProchainOvulation);
            //     }
            // }
            
            return array_merge($model->toArray(), [
                'created_at' => $model->created_at->format('d-m-Y'),
                'dateRegle' => Carbon::parse($model->dateRegle)->format('d-m-Y'),
                'dateProchainOvulation' => $dateProchainOvulation->format('d-m-Y'),
            ]);
        });
    }
}