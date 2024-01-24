<?php

namespace App\Imports;

use App\EntretienPair;
use App\EntretienParticipant;
use App\Imports\EntretienDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EntretienPairImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $details = new EntretienDetails($row[0], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7],
                $row[8], $row[9], $row[10], $row[11], $row[12]);
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $details->getDate());
            echo '$date : ' . $date;
            /**
             * Enrégistrement des infortations basique d'entretiens
             */
            $entretien = new EntretienPair();
            $entretien->nbreParticipant = 1;
            $entretien->referer = $details->getReferer();
            $entretien->condomMasculin = $details->getCondomMasculin();
            $entretien->condomFeminin = $details->getCondomFeminin();
            $entretien->type_activite_id = $details->type_activite_id;
            $entretien->type_entretien_id = $details->type_entretien_id;
            $entretien->user_id = Auth::user()->id;
            $entretien->created_at = $date;
            $entretien->save();

            /**
             * Enrégistrement des personnes ou participants
             */
            $participant = new EntretienParticipant();
            $participant->code = $details->getCode();
            $participant->sexe = $details->getSexe();
            $participant->age = $details->getAge();
            $participant->statut = $details->getStatut();
            $participant->region_id = $details->getRegion();
            $participant->profession = $details->getProfession();
            $participant->entretien_pair_id = $entretien->id;
            $participant->created_at = $date;
            $participant->save();
//            dump('row', [$row]);
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}