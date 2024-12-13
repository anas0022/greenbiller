<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpiryController extends Controller
{
    public function expired(){
        
        return view('supperadmin.subexpiry.expiry');
    }
}
