<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Store;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;

class Store_supplierController extends Controller
{
    public function add_supplier(){
        $logo = Coresetting::all();
        $cuntry = countrysettings::all();
        
        return view('store.contacts.addsupplier', compact('cuntry','logo'));
}


public function supplier_post(Request $request){
    $latestCustomer = Customer::orderBy('customer_id', 'desc')->first(); 

    if ($latestCustomer) {
        $lastNumber = (int) substr($latestCustomer->supplier_id, -4);
    } else {
        $lastNumber = 0;
    }
    
    // Increment the number by 1
    $nextNumber = $lastNumber + 1;
    $nextCustomerCode = 'SP-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // CUS-1-XXXX format
    $supplier = new Supplier();

    $supplier->supplier_id = $nextCustomerCode; // Set the auto-incrementing customer code
    $supplier->name= $request->input('supplier_name');
    $supplier->mobile= $request->input('mobile');
    $supplier->email= $request->input('email');
    $supplier->phone = $request->input('phone');
    $supplier->store_id = Auth::user()->store_id;
    $supplier->gst= $request->input('gstin');
    $supplier->tax= $request->input('tax_number');
    $supplier->balance= $request->input('opening_balance');
    $supplier->address= $request->input('address');
    $supplier->city= $request->input('city');
    $supplier->state= $request->input('state');
    $supplier->postcode= $request->input('postcode');
    $supplier->country= $request->input('country');

    if($supplier -> save()){
        return back()->with('success' , 'supplier added succesfully');
    }
    return back()->with('error' , 'supplier not added');

}
public function list_supplier(){
    $logo = Coresetting::all();

    $storeIds = Store::where('id',Auth::user()->store_id)->first();

    $supplier = Supplier::whereIn('store_id',$storeIds)->get();
    
    return view ('store.contacts.supplierlist' , compact('supplier','logo'));
}
public function updateStatus_supplier(Request $request){
    $brands = Supplier::find($request->input('id'));
    if ($brands) {
        // Toggle the status
        $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
        $brands->save();

        return back()->with('success', 'Status updated successfully.');
    }

    return back()->withErrors('The status could not be updated.');
  }
  public function deletesupplier(Request $request){
    $brand  = Supplier::where('id',$request->input('id'));

    if($brand->delete()){
        return back()->with('success' ,'Deleted successfully');
    }
}
public function edit_supplier(Request $request){
    $country = countrysettings::all();
    $logo = Coresetting::all();
   
$supplier = Supplier::where('id', $request->input('id'))->first();
    $country_name = countrysettings::where('id',$supplier->country)->first();
   


    return view('store.contacts.supplieredit',compact( 'country','logo','supplier','country_name'));
}

public function edit_supplierpost(Request $request){
    $supplier = Supplier::find($request->input('id'));


    if ($supplier) {
       
        $supplier->name= $request->input('supplier_name');
$supplier->mobile= $request->input('mobile');
$supplier->email= $request->input('email');
$supplier->phone = $request->input('phone');
$supplier->gst= $request->input('gstin');
$supplier->tax= $request->input('tax_number');
$supplier->balance= $request->input('opening_balance');
$supplier->address= $request->input('address');
$supplier->city= $request->input('city');
$supplier->state= $request->input('state');
$supplier->postcode= $request->input('postcode');
$supplier->country= $request->input('country');


        // Save the updated customer details
        if ($supplier->save()) {
            return redirect()->route('store_list_supplier')->with('success', 'supplier updated successfully');
        } else {
            return redirect()->route('store_list_supplier')->with('error', 'Failed to update customer');
        }
    } else {
        return redirect()->route('store_list_supplier')->with('error', 'Customer not found');
    }
  }

}
