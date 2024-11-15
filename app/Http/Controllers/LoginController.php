<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Auth; // For authentication

class LoginController extends Controller
{
   
public function loginpost(Request $request)

{

    // Validate incoming request

    $request->validate([

        'username' => 'required|string',

        'password' => 'required|string',

    ]);


    // Get credentials

    $credentials = $request->only('username', 'password');


    // Attempt to log the user in

    if (Auth::attempt($credentials)) {

    

        if (Auth::user()->role == "superadmin") {

            return redirect()->route('home'); 

        } elseif (Auth::user()->role == "admin") {

            return redirect()->route('home'); 

        }
        else{
            return redirect()->route('store.dash'); 
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
