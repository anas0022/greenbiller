<?php

namespace App\Http\Controllers\store;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Store;
use App\Models\Warehouse;
use Auth;
use Illuminate\Http\Request;
use App\Models\UserList;
use App\Http\Controllers\Controller;


class Store_userController extends Controller
{   
  
  
    public function updateStatus_user(Request $request){

        $brands = UserList::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return redirect()->route('userlist')->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    
public function edituser(Request $request){
    $ware = Warehouse::all();
    $logo = Coresetting::all();
    $country = countrysettings::all();
        $items = UserList::where('id', $request->input('id'))->first();
       
        return view('store.users.edituser',compact('items','ware','logo','country'));
}
public function useredit(Request $request){

    $userlist = UserList::find($request->input('id'));
    $userlist->name = $request->input('name');
    $userlist->mobile = $request->input('mobile');
    $userlist->email = $request->input('email');
    $userlist->role = $request->input('role');
    $userlist->password = bcrypt($request->input('password'));
    $userlist->store_id = Auth::user()->store_id;
    $userlist->mobile_code =$request->input('country_code');

    // Generate unique username
    $username = strtolower($request->input('name')) . '@admin.com';
    
    // Check if the generated username already exists in the database
    $existingUser = UserList::where('username', $username)->exists();

    if ($existingUser) {
        // If username exists, append a unique identifier (e.g., a number)
        $username = strtolower($request->input('name')) . rand(100, 999) . '@admin.com';
    }

    $userlist->username = $username;

    // Handle image upload and storage in 'storage/userprofile' directory
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('userprofile', 'public');
        $userlist->image = $imagePath;
    }

    // Save user to database
    if ($userlist->save()) {
        return redirect()->route('store_userlist')->with('success', 'User added successfully!');
    }

    return redirect()->route('store_userlist')->withErrors('User not added');
}

}
