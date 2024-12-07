<?php

namespace App\Http\Controllers\supperadmin;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\sub_method;
use Illuminate\Http\Request;

class SupperAdminHomeController extends Controller
{
    public function home(){

        $logo = Coresetting::all();

        return view('supperadmin.home.dashboard',compact('logo'));
    }
}
