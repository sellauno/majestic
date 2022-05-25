<?php

namespace App\Http\Controllers;

use Google\Service\AdMob\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App as FacadesApp;
use Dompdf\Dompdf;


class ReportController extends Controller
{
    public function generateReport()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        // $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream();
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }
}
