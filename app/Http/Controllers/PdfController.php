<?php

namespace App\Http\Controllers;

use App\Models\PFII_Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function dlAttendance(){
        $members = PFII_Member::where('is_active','Y')->orderBy('lname')->get();
        $pdf = Pdf::loadView('admin.attendance',array('title' => 'PARDSS STA-ANA ATTENDANCE','members' => $members))->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('attendance.pdf');
    }
}
