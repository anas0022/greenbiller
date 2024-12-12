<?php

namespace App\Http\Controllers\supperadmin;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\sub_method;
use App\Models\Subscription;
use App\Models\UserList;
use App\Models\Userrole;
use App\Models\Warehouse;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist(){
        $logo = Coresetting::all();
        $userlist = UserList::where('created_by',Auth::user()->id)->get();
        
        return view('supperadmin.users.userlist',compact('userlist','logo'));
    }
    public function useradd(){


        $country = countrysettings::all();
        $logo = Coresetting::all();
        $subscription = Subscription::all();
        $type = $subscription->pluck('type');
        $method = sub_method::where('id',$type)->first();
        return view('supperadmin.users.adduser',compact('country','logo','subscription','method'));
    }

    public function userpost(Request $request){
        $userlist = new UserList();
 
      
        $userlist->name = $request->input('name');
        $userlist->mobile = $request->input('mobile');
        $userlist->plan = $request->input('plan');
        $userlist->email = $request->input('email');
        $userlist->role = 'admin';
        $userlist->password = bcrypt($request->input('password'));
        $userlist->creaed_by = Auth::user()->id;
        $userlist->mobile_code =$request->input('country_code');
        $userlist->role_id =  $request->input('role_id');
         $userlist->user_type ="2";
        $username = strtolower($request->input('name')) . '@admin.com';
        if (UserList::where('username', $username)->exists()) {
            // Append unique identifier if username exists
            $username = strtolower($request->input('name')) . rand(100, 999) . '@admin.com';
        }
        $userlist->username = $username;
    
        // Handle image upload and storage in 'storage/userprofile' directory
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('userprofile', 'public');
            $userlist->image = $imagePath;
        }
    
        // Save user to database
        if ($userlist->save()) {
            return redirect()->back()->with('success', 'User added successfully!');
        }
    
        return back()->withErrors('User not added');
    }

  
}
