<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public $query;
    
    // load relations
    protected function with($with)
    {
        $this->query = $this->query->with($with);
        
        return $this;
    }
    
    // created_at range
    protected function range($between = null)
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
            
        $end = Carbon::now()->endOfMonth()->toDateString();
        
        if ($between) {
            list($start, $end) = explode('@', $between);    
        }
        
        info('between', compact('start', 'end'));
        
        $this->query->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end);
        
        return $this;
    }
    
    protected function groupBy($column)
    {
        $this->query = $this->query->groupBy($column);
        
        return $this;
    }
    
    protected function orderBy($column, $dir = 'asc')
    {
        $this->query = $this->query->orderBy($column, $dir);
        
        return $this;
    }
    
    // sorting
    protected function sorting($orders, $columns)
    {
        foreach($orders as $order) {
            $column = $columns[$order['column']];
            
            // only orderable column can be parsed
            if (empty($column['data']) || (isset($column['orderable']) && $column['orderable'] === false)) continue;
            
            $column_name = $column['name'] ?: $column['data'];
            
            $this->query = $this->query->orderBy($column_name, $order['dir']);
        }
        
        return $this;
    }
    
    // filtering
    protected function filtering($search = null, $columns)
    {
        if (!empty($search)) {
            $this->query = $this->query->where(function($subQuery) use($search, $columns) {
                foreach($columns as $key => $column) {
                    // only searchable column can be parsed
                    if (empty($column['data']) || (isset($column['searchable']) && $column['searchable'] === false)) continue;
                    
                    $column_name = $column['name'] ?: $column['data'];
                    
                    // can't filter relation
                    if (strpos($column_name, '.') !== false) continue;
                    
                    $searchValue = $search;
                    
                    info('filtering', ['$column' => $column]);
                    
                    if ($column_name === 'created_at' || (isset($column['is_date']) && (bool) $column['is_date'] === true)) {
                        try {
                            $searchValue = Carbon::parse($search)->toDateString();
                        } catch(\Exception $e) {
                            $searchValue = $search;
                        }
                    }
                    
                    $subQuery = $subQuery->orWhere($column_name, 'LIKE', '%' . $searchValue . '%');
                }
            });
        }
        
        return $this;
    }
    
    // limit and offset
    protected function limit($limit, $offset)
    {
        if ($limit !== '-1') {
            $this->query = $this->query->limit($limit)->offset($offset);
        }
        
        return $this;
    }
    
    // data
    protected function data($query)
    {
        // 
    }
    
    public function query($query)
    {
        $this->query = $query;
        
        return $this;
    }
}