<?php

namespace App\Http\Controllers\Ajax;

use App\User;
use Carbon\Carbon;
use App\ChatTimeLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UtilisateurAssisteController extends DataTableController
{
    public function __invoke(Request $request)
    {
        // $users = DB::select("select DISTINCT c.user_id, u.*,c.assistant_id, TIMESTAMPDIFF(YEAR, u.datenaissance,CURDATE() ) age, c.lastMessage
        //                         from users u, chat_time_lines c
        //                         where c.user_id = u.id 
        //                         and  c.created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59'
        //                         group by c.user_id
        //                         order By c.updateTime desc");
        
        $query = $this->query(ChatTimeLine::query())
            ->with(['user', 'assistant'])
            ->groupBy('user_id')
            ->orderBy('updateTime', 'desc')
            ->range($request->range)
            ->query;
            
        // counts
        $recordsTotal = $query->count();
        info('Query $recordsTotal', ['recordsTotal', $recordsTotal]);
            
        $query = $this->sorting($request->order, $request->columns)
            ->filtering($request->search['value'], $request->columns)
            ->query;
        
        $recordsFiltered = !empty($request->search['value']) ? $query->count() : $recordsTotal;
        info('Query $recordsFiltered', ['$recordsFiltered', $recordsFiltered]);
        
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
            $user->age = empty($user->datenaissance)
                ? ''
                : Carbon::now()->diffInYears(Carbon::parse($user->datenaissance));
            
            return array_merge($user->toArray(), [
                'created_at' => $user->created_at->format('d-m-Y'),
            ]);
        });
    }
}