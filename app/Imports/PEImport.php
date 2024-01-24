<?php

namespace App\Imports;

use App\PairEducateur;
use Illuminate\Support\Collection; // Ajout de l'importation de la classe Collection
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PEImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            PairEducateur::create([
                'theme'         => $row[0],
                'type'          => $row[1],
                'statut'        => $row[2],
                'indicatif'     => $row[3],
                'code'          => $row[4],
                'age'           => $row[5],
                'sexe'          => $row[6],
                'refere'        => $row[7],
                'cond_masculin' => $row[8],
                'cond_feminin'  => $row[9],
                'profession'    => $row[10],
            ]);
        }
    }
}
