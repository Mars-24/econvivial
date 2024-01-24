<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EntretienPair extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function entretienparticipan()
    {
        return $this->hasMany(EntretienParticipant::class);
    }

    public function typeactivite()
    {
        return $this->belongsTo(TypeActivite::class, 'type_activite_id');
    }

    public function typeentretien()
    {
        return $this->belongsTo(TypeEntretien::class, 'type_entretien_id');
    }

    //Récupérer les données par statut, sexe et type d'activité (individuel ou groupe)
    public function getStatisticByTypeActivite($statut, $sexe, $idType,$debut,$fin, $userID){
        $result = DB::select("select count(*) as nbre from entretien_participants e, entretien_pairs en 
                                where e.statut = '".$statut."' 
                                and e.sexe = '".$sexe."' 
                                and e.created_at between '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID." 
                                and e.entretien_pair_id = en.id 
                                and en.type_activite_id = ".$idType);

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }

    //Récupérer les données par statut, sexe, et thèmes de discussion

    public function getStatisticByTheme($statut, $sexe, $idTheme,$debut,$fin, $userID){
        $result = DB::select("select count(*) as nbre from entretien_participants e, entretien_pairs en 
                                where e.statut = '".$statut."' 
                                and e.sexe = '".$sexe."' 
                                and e.created_at between   '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID." 
                                and e.entretien_pair_id = en.id 
                                and en.type_entretien_id = ".$idTheme);

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }

    //Récupérer les données par statut, sexe, et nature condom

    public function getStatisticByCondom($statut, $sexe, $condom,$debut,$fin, $userID){
        $result = DB::select("select SUM(".$condom.") as nbre from entretien_participants e, entretien_pairs en 
                                where e.statut = '".$statut."' 
                                and e.sexe = '".$sexe."'
                                and e.created_at between   '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID."  
                                and e.entretien_pair_id = en.id 
                            ");

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }

    //Récupérer les données par statut, sexe puis référer

    public function getStatisticByRefere($statut, $sexe, $refere,$debut,$fin, $userID){
        $result = DB::select("select COUNT(referer) as nbre from entretien_participants e, entretien_pairs en 
                                where e.statut = '".$statut."' 
                                and e.sexe = '".$sexe."' 
                                and e.created_at between  '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID." 
                                and e.entretien_pair_id = en.id 
                                and referer = '".$refere."' ");

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }


    //Récupérer le nombre de jeune ayant suivi une formation sur un thème
    public function getStatisticByThemeAndTranche($sexe, $inf, $sup,$statut,$debut,$fin, $userID){
        $result = DB::select("select COUNT(*) as nbre from entretien_participants e, entretien_pairs en 
                                where e.age between ".$inf." and ".$sup." 
                                and e.sexe = '".$sexe."'
                                and e.created_at between   '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID." 
                                and e.statut = '".$statut."' 
                                and e.entretien_pair_id = en.id 
                            ");

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }



    //Récupérer le nombre de jeune ayant suivi une formation sur le VIH
    public function getStatisticByVihThemeAndTranche($sexe,$inf, $sup,$debut,$fin, $userID){

        $theme = TypeEntretien::where("code", "IST")->first();

        $result = DB::select("select COUNT(*) as nbre from entretien_participants e, entretien_pairs en 
                                where e.age between ".$inf." and ".$sup." 
                                and e.sexe = '".$sexe."'
                                and e.created_at between   '".$debut." 00:00:00' and '".$fin." 23:59:59'
                                and en.user_id = ".$userID." 
                                and e.entretien_pair_id = en.id 
                                and en.type_entretien_id = '".$theme->id."'
                            ");

        if(count($result) > 0){
            return $result[0]->nbre != null ? $result[0]->nbre : 0;
        }
        return 0;
    }
}
