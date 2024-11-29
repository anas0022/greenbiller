<?php

namespace App\Http\Controllers\store\customer;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Store;
Use Auth;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    public function customer_list()
    {
 
  $storeIds = Store::where('id',Auth::user()->store_id)->first();

        $customer = Customer::whereIn('store_id',$storeIds)->get();
      
        $logo = Coresetting::all();
        return view('store.contacts.customerlist', compact('customer','logo'));
    }
}
