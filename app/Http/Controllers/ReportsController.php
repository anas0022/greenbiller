<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function salesreport(){
        return view('admin\reports\salesreport');
    }
}
