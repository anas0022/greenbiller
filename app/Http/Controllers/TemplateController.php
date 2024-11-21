<?php

namespace App\Http\Controllers;
use App\Models\template;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
     public function printdemo(){
        $template = template::all();
        return view('admin.invoicetemplates.invoiceprint',compact('template'));
     }
}
