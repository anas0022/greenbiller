<?php

namespace App\Http\Controllers\store\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerDeleteController extends Controller
{
    public function deletecu(Request $request){
        $brand  = Customer::where('id',$request->input('id'));
    
        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }}
}
