<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Advance;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Store;
use Illuminate\Http\Request;
use Auth;
class Store_advancedController extends Controller
{
    public function advanceadd()

    {
        $logo    = Coresetting::all();
        $storeIds = Store::where('id',Auth::user()->store_id)->first();

        $customers = Customer::whereIn('store_id',$storeIds)->get();
   
        return view('store.advance.advanceadd', compact('customers','logo')); // Pass customers to the view
    }
    
    public function advancepost(Request $request){
        $customer = new Advance();

        $customer -> date = $request->input('date');
        $customer -> name = $request->input('name');
     
        $customer -> amount = $request->input('amount');
        $customer -> type = $request->input('payment_type');
        $customer -> note = $request->input('note');
        $customer -> customer_id = $request->input('customer_id');
        if($customer->save()){
            return back()->with('success' , 'advance added successfully');
        }
        return back()->with('error','advance not added');
    }
    public function advancelist(){
        $logo = Coresetting::all();
        $storeIds = Store::where('id',Auth::user()->store_id)->first();
       
        $advance = Advance::whereIn('store_id' , $storeIds)->get();
      
        $customer = Customer::whereIn('store_id' , $storeIds)->first();
      
        return view('store.advance.advancelist',compact('advance','logo','customer')); // Pass customers to the vie
    }

    public function deleteadvance(Request $request){
        $brand  = Advance::where('id',$request->input('id'));
    
        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }}

        public function edit_advance(Request $request){
$logo = Coresetting::all();
            $advance = Advance::where('id', $request->input('id'))->first();
            $storeIds = Store::where('id',Auth::user()->store_id)->first();

            $customers = Customer::whereIn('store_id',$storeIds)->get();
            return view('store.advance.advanceedit',compact('advance','customers','logo'));
        }
public function aadvanceedit(Request $request){
    $customer = Advance::find($request->input('id'));

    
    if ($customer) {
       
        $customer -> date = $request->input('date');
        $customer -> name = $request->input('name');
        $customer -> id = $request->input('id');
        $customer -> amount = $request->input('amount');
        $customer -> type = $request->input('type');
        $customer -> note = $request->input('note');
        $customer -> customer_id = $request->input('customer_id');
        // Save the updated customer details
        if ($customer->save()) {
            return redirect()->route('store_advancelist')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('store_advancelist')->with('error', 'Failed to update customer');
        }
    } else {
        return redirect()->route('store_advancelist')->with('error', 'Customer not found');
    }
    
}
     
}
