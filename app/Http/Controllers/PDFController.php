<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    

    public function generatePDF(){

    	$data = ['title' => 'Welcome to sazzadashique.blogspot.com'];
    	$pdf = PDF::loadView('myPDF', $data);



    	return $pdf->download('sazzadashique.pdf');
    }
}
