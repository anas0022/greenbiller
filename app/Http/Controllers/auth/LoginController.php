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
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
   
            \Log::info('User Type Debug', [
                'user_type' => $user->user_type,
                'user_type_type' => gettype($user->user_type)
            ]);

      
            $userType = (string)$user->user_type;
            
            switch ($userType) {
                case "1":
                    return redirect()->route('supper.home'); 
                
                case "2":
        
                    if (empty($user->plan)) {
                        Auth::logout();
                        return back()->with("error", "No plan assigned");
                    }

                    if ($this->hasActiveSubscription($user)) {
                        return redirect()->route('home')->with('plan', $user->plan);
                    } 
                    

                   
                    \Log::info('Redirecting to expired route');
                    return redirect()->route('expired');
 
                default:
                    \Log::error('Unexpected User Type', [
                        'user_type' => $userType,
                        'user_id' => $user->id
                    ]);
                    Auth::logout();
                    return back()->with('error', 'Invalid user type: ' . $userType);
            }
        }
        
        // If authentication fails
        return back()->with('error', 'Invalid credentials');
    } 
          
        
    
   
    

private function hasActiveSubscription($user)
{
  
    $subscription = \App\Models\Subscription::where('id', $user->plan)
        ->first();
        $userUpdatedAt = $user->updated_at;
  if (!$subscription) {
            return false;
        }
    $expirationDate = $userUpdatedAt->addDays($subscription->duration);


    return now()->lessThan($expirationDate);
}

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    
        return redirect('/'); 
    }
}
