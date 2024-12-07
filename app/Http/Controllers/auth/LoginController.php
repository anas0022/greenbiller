<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(){
        return view('auth.login');
    }
    public function loginpost(Request $request)

{

    // Validate incoming request

    $request->validate([

        'username' => 'required|string',

        'password' => 'required|string',

    ]);


   

    $credentials = $request->only('username', 'password');


  

    if (Auth::attempt($credentials)) {

    

        if (Auth::user()->user_type == "1") {

            return redirect()->route('supper.home'); 

        } 
       

    } else {

        // If authentication fails, redirect back with an error

        return back()->withErrors(['login_error' => 'Invalid username or password']);

    }

}
    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    
        return redirect('/login'); 
    }
}
