<?php

namespace App\Http\Controllers\store\user;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Store;
use App\Models\UserList;
use App\Models\Userrole;
use Illuminate\Http\Request;
Use Auth;

class UserPostController extends Controller
{
    public function Userpost(){

        $stores = Store::all();
        $country = countrysettings::all();
        $logo = Coresetting::all();
        $role = Userrole::all();
    
        return view('store.users.adduser',compact('country','logo','role','stores'));
    }
    public function useradd(Request $request)
{
    
   
    $userlist = new UserList();
 

    $userlist->store_id = Auth::user()->store_id;
    echo(  $userlist->store_id = Auth::user()->store_id);

    $userlist->name = $request->input('name');
    $userlist->mobile = $request->input('mobile');
    $userlist->email = $request->input('email');
    $userlist->created_by = Auth::user()->id;
    $userlist->role = $request->input('role');
    $userlist->password = bcrypt($request->input('password'));
  
    $userlist->mobile_code =$request->input('country_code');
    $userlist->role_id =  $request->input('role_id');
   
    $username = strtolower($request->input('name')) . '@admin.com';
    if (UserList::where('username', $username)->exists()) {
     
        $username = strtolower($request->input('name')) . rand(100, 999) . '@admin.com';
    }
    $userlist->username = $username;


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
