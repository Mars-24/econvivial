<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
            'theme'     => $row[0],
            'type'    => $row[1],
            'statut'    => $row[2],
            'indicatif'    => $row[3],
            'code'    => $row[4],
            'age'    => $row[5],
            'sexe'    => $row[6],
            'refere'    => $row[7],
            'cond_masculin'    => $row[8],
            'cond_feminin'    => $row[9],
            'profession'    => $row[10]
        ]);
    }
}