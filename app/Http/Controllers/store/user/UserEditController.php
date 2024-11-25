<?php

namespace App\Http\Controllers\store\user;

use App\Http\Controllers\Controller;
use App\Models\countrysettings;
use App\Models\UserList;
use App\Models\Userrole;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserEditController extends Controller
{
    public function edituser(Request $request)
    {
        $ware = Warehouse::all();
        $roles = Userrole::all();
        $role_id = UserList::where('id', $request->input('id'))->first();
        $role = Userrole::where('id', $role_id->role_id)->get();
        $country = countrysettings::all();
        $logo = countrysettings::all();
        $items = UserList::where('id', $request->input('id'))->first();
        return view('store.users.edituser', compact('items', 'ware', 'role', 'country', 'logo', 'country', 'roles'));
    }

    public function useredit(Request $request)
    {
        try {
            // Basic validation
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'role' => 'required',
                'country_code' => 'required',
            ]);

            $userlist = UserList::find($request->input('id'));
            if (!$userlist) {
                return redirect()->route('store_userlist')->with('error', 'User not found');
            }

            // Update basic info
            $userlist->name = $request->input('name');
            $userlist->mobile = $request->input('mobile');

            $username = strtolower($request->input('name')) . '@admin.com';
            if (UserList::where('username', $username)->exists()) {

                $username = strtolower($request->input('name')) . rand(100, 999) . '@admin.com';
            }
            $userlist->username = $username;
            $userlist->email = $request->input('email');
            $userlist->role_id = $request->input('role');
            $userlist->mobile_code = $request->input('country_code');

            // Handle password update if provided
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required'
                ]);
                $userlist->password = bcrypt($request->input('password'));
            }

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);

                // Delete old image if exists
                if ($userlist->image && Storage::disk('public')->exists($userlist->image)) {
                    Storage::disk('public')->delete($userlist->image);
                }

                $image = $request->file('image');
                $imagePath = $image->store('userprofile', 'public');
                $userlist->image = $imagePath;
            }

            if ($userlist->save()) {
                return redirect()->route('store_userlist')->with('success', 'User updated successfully!');
            }

            return redirect()->route('store_userlist')->with('error', 'Failed to update user');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating user: ' . $e->getMessage())
                ->withInput();
        }
    }
}
