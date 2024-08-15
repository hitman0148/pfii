<?php

namespace App\Imports;

use App\Models\PFII_Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if($row['idno'] != null) {
                PFII_Member::create([
                    'id_no' => $row['idno'],
                    'fname' => $row['firstname'],
                    'lname' => $row['lastname'],
                    'mi' => $row['mi'],
                    'bday' => date('Y-m-d',strtotime($row['bday'])),
                    'gender' => $row['gender'],
                    'civil_stat' => $row['civilstatus'],
                    'address' => $row['address'],
                    'mobile_no' => $row['mobileno'],
                    'date_expiration' => date('Y-m-d',strtotime($row['dateexpiration'])),//$row['dateexpiration'],
                ]);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

}
