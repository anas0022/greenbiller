<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Secondryunit;
use Auth;
use Illuminate\Http\Request;

class SecondryController extends Controller
{
    public function secondryunitlist(){
        $secondry = Secondryunit::where('created_by', Auth::user()->id);
        $logo = Coresetting::all();
        return view('admin.settings.secondryunitlist' , compact('secondry','logo'));
    }
}
