<?php

namespace App\Imports;

use App\Models\PFII_Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PFII_Member([
            'id_no' => $row[0],
            'fname' => $row[1],
            'lname' => $row[2],
            'mi' => $row[3],
            'bday' => $row[4],
            'gender' => $row[5],
            'civil_stat' => $row[6],
            'address' => $row[7],
            'mobile_no' => $row[8],
            'date_expiration' => $row[9],
        ]);
    }
}
