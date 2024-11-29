<?php

namespace App\Http\Controllers\store\customer;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
Use Auth;
use App\Models\Store;
use App\Models\UserList;
use Illuminate\Http\Request;

class CustomerAddController extends Controller
{

    public function customer(){
        $country = countrysettings::all();
        $store = Store::where('id', Auth::user()->store_id)->first();
        $store_name = $store->store_name;
        $store_id = $store->id;

        $excu = UserList::where('role','Sale Executive')->get();
        
        $logo = Coresetting::all();
        return view('store.contacts.addcustomer',compact('country','store','logo','excu','store_name','store_id'));
    }
    public function customer_post(Request $request)
    {
  
        $latestCustomer = Customer::orderBy('customer_id', 'desc')->first(); 

if ($latestCustomer) {
    $lastNumber = (int) substr($latestCustomer->customer_id, -4);
} else {
    $lastNumber = 0;
}


$nextNumber = $lastNumber + 1;
$nextCustomerCode = 'CUS-1-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); 


$customer = new Customer();


$customer->customer_id = $nextCustomerCode;
$customer->customer_name = $request->input('customer_name');
$customer->sale_executive_id = $request->input('execu');
$customer->mobile = $request->input('mobile');
$customer->email = $request->input('email');
$customer->gst_number = $request->input('gstin');
$customer->store_id = Auth::user()->store_id;
$customer->created_by = Auth::user()->id;
$customer->tax_number = $request->input('tax_number');
$customer->credit_limit = $request->input('credit_limit');
$customer->previous_due = $request->input('opening_balance');
$customer->address = $request->input('address');
$customer->city = $request->input('city');
$customer->state = $request->input('state');
$customer->postcode = $request->input('postcode');
$customer->country = $request->input('country_name');
$customer->ship_address = $request->input('address_shipping');
$customer->ship_city = $request->input('city_shipping');
$customer->ship_state = $request->input('state_shipping');
$customer->ship_postcode = $request->input('postcode_shipping');
$customer->ship_country = $request->input('shipping_country');
$customer->price_leveltype = $request->input('price_type');
$customer->price_level = $request->input('price_level');


if ($customer->save()) {
    return back()->with('success', 'Customer added successfully with code ' . $nextCustomerCode);
}

return back()->with('error', 'Customer not added');
    }
}
