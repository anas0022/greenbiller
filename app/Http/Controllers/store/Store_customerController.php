<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Imports\SupplierImport;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Store;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
class Store_customerController extends Controller
{
  

    
    public function customer_status(Request $request){
        $brands = Customer::find($request->input('id'));
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function editcustomer(Request $request){
        
        $country = countrysettings::all();
        $logo = Coresetting::all();
       
    $customer = Customer::where('id', $request->input('id'))->first();
        $country_name = countrysettings::where('id',$customer->country)->first();
    
        return view('store/contacts/customeredit', compact( 'country','logo','customer','country_name'));
    }
    
    public function customer_edit(Request $request) 
    {
        // Retrieve the customer record by ID
        $customer = Customer::find($request->input('id'));
    
        // Check if the customer was found
        if ($customer) {
            // Update the customer properties with request inputs
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
    

    public function add_supplier(){
        $logo = Coresetting::all();
        $cuntry = countrysettings::all();
        return view('admin.contacts.addsupplier', compact('cuntry','logo'));
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
    $nextCustomerCode = 'SP-1-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // CUS-1-XXXX format
    $supplier = new Supplier();

    $supplier->supplier_id = $nextCustomerCode; // Set the auto-incrementing customer code
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

    if($supplier -> save()){
        return back()->with('success' , 'supplier added succesfully');
    }
    return back()->with('error' , 'supplier not added');

}

public function list_supplier(){
    $logo = Coresetting::all();

    $supplier = Supplier::all();
    
    return view ('admin.contacts.supplierlist' , compact('supplier','logo'));
}

    public function edit_supplier(Request $request){
       
    
        // Get the country name of the customer


    
        $supplier = Supplier::where('id', $request->input('id'))->first();
                $country_select = countrysettings::firstWhere('id', $supplier->country);
        $country = countrysettings::all();
        return view('admin.contacts.supplieredit',compact('supplier','country','country_select'));
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
                    return redirect()->route('list_supplier')->with('success', 'supplier updated successfully');
                } else {
                    return redirect()->route('list_supplier')->with('error', 'Failed to update customer');
                }
            } else {
                return redirect()->route('list_supplier')->with('error', 'Customer not found');
            }
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


        public function findCustomer(Request $request){

            $customer_details  = Customer::where('id',$request->input('customer_id'))->get();
            if($customer_details){

                return $customer_details;

            }
        }

        public function import(Request $request)
        {
            \Log::info('Request received:', $request->all());
    
            if ($request->hasFile('excel_file')) {
                \Log::info('File uploaded:', [$request->file('excel_file')->getClientOriginalName()]);
        
                try {
                    Excel::import(new CustomersImport, $request->file('excel_file'));
                    return back()->with('success', 'Items Imported Successfully');
                } catch (\Exception $e) {
                    \Log::error('Error importing file: ' . $e->getMessage());
                    return back()->with('error', 'Error importing file: ' . $e->getMessage());
                }
            }
        
            \Log::warning('No file uploaded');
            return back()->with('error', 'File not uploaded');
        }

        public function supplier_import(Request $request){
            \Log::info('Request received:', $request->all());
    
            if ($request->hasFile('excel_file')) {
                \Log::info('File uploaded:', [$request->file('excel_file')->getClientOriginalName()]);
        
                try {
                    Excel::import(new SupplierImport, $request->file('excel_file'));
                    return back()->with('success', 'Items Imported Successfully');
                } catch (\Exception $e) {
                    \Log::error('Error importing file: ' . $e->getMessage());
                    return back()->with('error', 'Error importing file: ' . $e->getMessage());
                }
            }
        
            \Log::warning('No file uploaded');
            return back()->with('error', 'File not uploaded');
        }
    }

