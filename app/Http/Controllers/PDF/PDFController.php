<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    } 

    public function view($id)
    {
        return view('pdf.pdf');
    }
}
