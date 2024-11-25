<?php

namespace App\Http\Controllers\store\user;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Store;
use App\Models\UserList;
use Illuminate\Http\Request;
Use Auth;

class UserController extends Controller
{
    public function userlist(){
        $logo = Coresetting::all();
       
   
        $user = UserList::where('created_by',Auth::user()->id)->get();
        $userlist = $user;
     
        
        return view('store.users.userlist',compact('userlist','logo'));
    }
}
