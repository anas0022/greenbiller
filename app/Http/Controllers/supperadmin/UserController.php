<?php

namespace App\Http\Controllers\supperadmin;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\UserList;
use App\Models\Userrole;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist(){
        $logo = Coresetting::all();
        $userlist = UserList::where('vendore_id',Auth::user()->id);
        
        return view('supperadmin.users.userlist',compact('userlist','logo'));
    }
    public function useradd(){


        $country = countrysettings::all();
        $logo = Coresetting::all();

    
        return view('supperadmin.users.adduser',compact('country','logo'));
    }
}
