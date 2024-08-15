<?php

namespace App\Imports;

use App\Models\PFII_designation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesignationImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
            if($row['designation'] != null) {
                PFII_designation::create([
                    'designation' => $row['designation'],
                    'date_created' => date('Y-m-d'),
                    'created_by' => Auth('admin')->user()->name
                ]);
            }
        }
    }
}
