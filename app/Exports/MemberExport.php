<?php

namespace App\Exports;

use App\Models\PFII_Member;
use Maatwebsite\Excel\Concerns\FromCollection;

class MemberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PFII_Member::all();
    }
}
