<?php

namespace App\Exports;

use App\Models\PFII_Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PFII_Member::all();
    }

    public function headings(): array
    {
        return [
            'ID No',
            'First Name',
            'Last Name',
            'MI',
            'Birth Day',
            'Gender',
            'Civil Status',
            'Mobile No',
            'Address',
            'Date Expiration',
        ];
    }
}
