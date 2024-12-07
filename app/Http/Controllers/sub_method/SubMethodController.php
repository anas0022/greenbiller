<?php

namespace App\Http\Controllers\sub_method;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\sub_method;
use Illuminate\Http\Request;

class SubMethodController extends Controller
{
    public function method (){
        $logo = Coresetting::all();
        $method = sub_method::all();
        return view("supperadmin.method.methodlist",compact("logo","method"));
    }
    public function method_add(Request $request){
        $validatedData = $request->validate([
            'methodName' => 'required',
            'methodDescription' => 'required',
        
        ]);

        $method =  new sub_method();

        $method->method = $request->input('methodName');
        $method->dis = $request->input('methodDescription');

        $method->save();
        return redirect()->back()->with('success','method added');
    }
}
