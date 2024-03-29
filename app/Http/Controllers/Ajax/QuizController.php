<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\QuizModule;
use App\QuizResult;
use App\QuizQuestion;
use App\QuizQuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QuizController extends DataTableController
{
    public function __invoke(Request $request)
    {
        $query = $this->query(QuizResult::query()->select()->addSelect(DB::raw('SUM(point) as point'))->groupBy('user_id'))
            ->with(['user'])
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
        return $query->get()->map(function($model) {
            return array_merge($model->toArray(), [
                'created_at' => $model->created_at->format('d-m-Y'),
            ]);
        });
    }
}