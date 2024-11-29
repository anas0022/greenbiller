<?php

namespace App\Http\Controllers\store\customer;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerEditController extends Controller
{
    public function editcustomer(Request $request){
     
        $country = countrysettings::all();
        
    
        $customer = Customer::where('id', $request->input('id'))->first();
  
    $logo = Coresetting::all();
   
        $country_select = countrysettings::firstWhere('id', $customer->country);
    
        return view('store.contacts.customeredit', compact('customer', 'country', 'logo', 'country_select'));
    }
    
    public function customer_edit(Request $request) 
    {
   
        $customer = Customer::find($request->input('id'));
    
        
        if ($customer) {
           
            $customer->customer_name = $request->input('customer_name');
            $customer->mobile = $request->input('mobile');
            $customer->email = $request->input('email');
            $customer->gst_number = $request->input('gstin');
            $customer->tax_number= $request->input('tax_number');
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
    
            // Save the updated customer details
            if ($customer->save()) {
                return redirect()->route('store_customer_list')->with('success', 'Customer updated successfully');
            } else {
                return back()->with('error', 'Failed to update customer');
            }
        } else {
            // Redirect back if customer not found
            return back()->with('error', 'Customer not found');
        }
    }
}
