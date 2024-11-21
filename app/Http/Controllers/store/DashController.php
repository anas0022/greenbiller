<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function dashboard(){
        $logo = Coresetting::all();
        return view('store\home\dashboard',compact('logo'));
    }
}
