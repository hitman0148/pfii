<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function download123(){
        $pdf = Pdf::loadView('pdf');
        return $pdf->download();
    }
}
