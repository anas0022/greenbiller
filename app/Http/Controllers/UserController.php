<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Store;
use App\Models\Userrole;
use App\Models\Warehouse;
use DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\UserList;

class UserController extends Controller
{
  
    public function userlist(){
        $logo = Coresetting::all();
        $userlist = UserList::all();
        $store = Store::all();
        return view('admin.users.userlist',compact('userlist','logo'));
    }
    public function Userpost(){
        $stores = Store::all();
        $country = countrysettings::all();
        $logo = Coresetting::all();
        $role = Userrole::all();
        return view('admin.users.adduser',compact('stores','country','logo','role'));
    }
    public function useradd(Request $request)
{
    
   
    // Create new user instance
    $userlist = new UserList();
 
    $userlist->store_id = $request->input('store');
    $userlist->name = $request->input('name');
    $userlist->mobile = $request->input('mobile');
    $userlist->email = $request->input('email');
    $userlist->role = $request->input('role');
    $userlist->password = bcrypt($request->input('password'));
    $userlist->store_id = $request->input('store');
    $userlist->mobile_code =$request->input('country_code');
    $userlist->role_id =  $request->input('role_id');
    // Generate unique username
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


        $items = UserList::where('id', $request->input('id'))->first();
        return view('admin.users.edituser',compact('items','ware'));
}
public function useredit(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
        'mobile' => 'required',
        'role' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'ware' => 'required',
    ]);
    
    $userlist = UserList::find($request->input('id'));
   
    $userlist->name = $request->input('name');
    $userlist->mobile = $request->input('mobile');
    $userlist->email = $request->input('email');
    $userlist->role = $request->input('role');
    $userlist->password = bcrypt($request->input('password'));
    $userlist->warehouse = $request->input('ware');

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
        return redirect()->route('userlist')->with('success', 'User added successfully!');
    }

    return redirect()->route('userlist')->withErrors('User not added');
}
public function deleteuser(Request $request){
    $brand  = UserList::where('id',$request->input('id'));

    if($brand->delete()){
        return back()->with('success' ,'Deleted successfully');
    }
}

public function userroles(Request $request)
{
    // Fetch data
    $user_role = Userrole::all();
    $logo = Coresetting::all();

  

   
    return view('admin.users.user_role', compact('user_role', 'logo'));
}

public function add_user_role(Request $request)
{
    // Validate the request data
    $request->validate([
        'role' => 'required|string|max:255',
        'description' => 'required|string|max:500',
    ]);

    DB::beginTransaction(); 

    try {
        $user_role = new Userrole;
        $user_role->role = $request->input('role');
        $user_role->description = $request->input('description');

        if ($user_role->save()) { 
            DB::commit(); 
            return back()->with('success', 'Role added successfully');
        } else {
            throw new Exception('Failed to save user role');
        }
    } catch (Exception $e) {
        DB::rollBack(); 
   

        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


}