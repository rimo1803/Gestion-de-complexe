<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //

    public function generatePDF()
        {

        $personnels = Personnel::all();
        $data = [
            'title' => 'impression avec DOMPDF',
            'personnels' => $personnels,
        ];

            $pdf = PDF::loadView('pdf.personnels', $data);
            return $pdf->download('document.pdf');
        }
}

