<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use App\Models\Coresetting;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdvanceController extends Controller
{
    public function advanceadd()
    {    $logo = Coresetting::all();
        $customers = Customer::all(); // Retrieve all customers
        return view('admin.advance.advanceadd', compact('customers','logo')); // Pass customers to the view
    }
    public function advancepost(Request $request){
        $customer = new Advance();

        $customer -> date = $request->input('date');
        $customer -> name = $request->input('name');
        $customer -> id = $request->input('id');
        $customer -> amount = $request->input('amount');
        $customer -> type = $request->input('type');
        $customer -> note = $request->input('note');
        $customer -> customer_id = $request->input('customer_id');
        if($customer->save()){
            return back()->with('success' , 'advance added successfully');
        }
        return back()->with('error','advance not added');
    }
    public function advancelist(){
        $logo = Coresetting::all();
        $advance = Advance::all();
        return view('admin.advance.advancelist',compact('advance','logo')); // Pass customers to the vie
    }
    public function status_advance(Request $request){
        $brands = Advance::find($request->input('id'));
    
    if ($brands) {
        // Toggle the status
        $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
        $brands->save();

        return back()->with('success', 'Status updated successfully.');
    }

    return back()->withErrors('The status could not be updated.');}

public function edit_advance(Request $request){

    $advance = Advance::where('id', $request->input('id'))->first();
    $customers = Customer::all(); // Retrieve all customers
    return view('Advanceedit',compact('advance','customers'));
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
            return redirect()->route('advancelist')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('advancelist')->with('error', 'Failed to update customer');
        }
    } else {
        return redirect()->route('advancelist')->with('error', 'Customer not found');
    }
    
}
public function deleteadvance(Request $request){
    $brand  = Advance::where('id',$request->input('id'));

    if($brand->delete()){
        return back()->with('success' ,'Deleted successfully');
    }}
 
}

    

