<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
public function generatePDF(request $request)
{
    // dd($request->all());
        $result = json_decode($request->data, true);
        // dd($result);
    // Get data from session
    // $result = session('numerology_result');
    $yog_labels = session('yog_labels', []);

    if (!$result) {
        abort(404, 'Numerology data not found. Please generate the report first.');
    }

    $pdf = PDF::loadView('user.numerology.pdf.name_numerology_report', compact('result', 'yog_labels'))
              ->setPaper('a4', 'portrait')
              ->setOption('isHtml5ParserEnabled', true)
              ->setOption('isRemoteEnabled', true);
    // return view('user.numerology.pdf.name_numerology_report',compact('result', 'yog_labels'));

    return $pdf->download('name_numerology_report-'.date('Y-m-d').'.pdf');
}
}
