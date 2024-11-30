<?php

namespace App\Http\Controllers\store\supplier;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\UserList;
use Illuminate\Http\Request;
Use Auth;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function add_supplier(){
        $logo = Coresetting::all();
        $store = Store::all();
        $country = countrysettings::all();
    
        $excu = UserList::where('role','Sale Executive')->get();
        return view('store.contacts.addsupplier', compact('country','logo','store','excu'));
}

    public function supplier_post_store(Request $request){
   

        $storeId = Auth::user()->store_id;
   $latestCustomer = Supplier::orderBy('supplier_id', 'desc')->first();

   $lastNumber = $latestCustomer ? (int) substr($latestCustomer->supplier_id, -4) : 0;

   $nextNumber = $lastNumber + 1;

   $nextCustomerCode = 'SP-' . ($storeId .'-'?? '0000') . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
   
   $supplier = new Supplier(); 

   $supplier->supplier_id = $nextCustomerCode; 
   $supplier->name= $request->input('supplier_name');
   $supplier->sale_executive_id = $request->input('execu');
   $supplier->store_id = Auth::user()->store_id;
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

   try {
       if($supplier->save()){
           return back()->with('success' , 'supplier added successfully');
       } else {
           Log::error('Supplier not saved: ' . json_encode($supplier->getErrors())); // Log validation errors if save fails
           return back()->with('error' , 'supplier not added due to validation errors');
       }
   } catch (\Exception $e) {
       Log::error('Database error: ' . $e->getMessage()); // Log the error message
       return back()->with('error' , 'supplier not added due to a database error');
   }
}
}
