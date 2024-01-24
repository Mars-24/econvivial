<?php

namespace App\Http\Controllers\Ajax;

use Carbon\Carbon;
use App\Menstruation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SuiviRegleController extends DataTableController
{
    public function __invoke(Request $request)
    {
        // Database Pre-check Update
        $this->updateRegle();

        $query = $this->query(Menstruation::query()->where('type', 'regle'))
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
            'controller' => $this->updateRegle()
        ]);
    }
    
    protected function updateRegle() {

        $menstruations = Menstruation::where("type","regle")->get();
        $answers = [];

        foreach ($menstruations as $key => $menstruation) {
            // Get dates and substract
            $today = Carbon::now();
            $dateProchaineRegle = Carbon::parse($menstruation->dateRegle);    
            
            // Substract
            $timestamp = $today->diffInDays($dateProchaineRegle);

            // Get timestamp
            $timestamp = (int)$timestamp;
            $dureeCycle = (int)$menstruation->dureeCycle;

            // Get previous cycle date
            $count = (int)($timestamp/$dureeCycle);
            $count = (int)($dureeCycle*($count+1));
            
            $dateProchaineRegle->addDays($count);

            // Compare
            if($dateProchaineRegle->lte($today))
                $dateProchaineRegle->addDays($dureeCycle);

            // Update in db
            // Reformat to string beforehand
            $menstruation->dateProchainRegle = $dateProchaineRegle->format("Y-m-d");
            $menstruation->dateRegle = $dateProchaineRegle->subDays($dureeCycle)->format("Y-m-d");
            $menstruation->save();

            array_push($answers, $dateProchaineRegle);
        }

        return $answers;
    }

    protected function data($query)
    {
        return $query->get()->map(function($model) {
            $dateProchainRegle = Carbon::parse($model->dateProchainRegle);
            
            // if ($dateProchainRegle->lt(Carbon::now())) {
            //     while($dateProch < $dateCourant){
            //         $model->dateRegle = $model->dateProchainRegle;
                    
            //         $model->dateProchainRegle = $dateProchainRegle->addDay($model->dureeCycle);
                    
            //         $model->save();
                    
            //         $dateProchainRegle = new Carbon($model->dateProchainRegle);
            //     }
            // }
            
            return array_merge($model->toArray(), [
                'created_at' => $model->created_at->format('d-m-Y'),
                'dateRegle' => Carbon::parse($model->dateRegle)->format('d-m-Y'),
                'dateProchainRegle' => $dateProchainRegle->format('d-m-Y'),
            ]);
        });
    }
}