<?php

namespace App\Http\Controllers\store\supplier;

use App\Http\Controllers\Controller;
use App\Imports\SupplierImport;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SupplierEditController extends Controller
{
    public function edit_supplier(Request $request)
    {
        $country = countrysettings::all();
        $logo = Coresetting::all();

        $supplier = Supplier::where('id', $request->input('id'))->first();
        $country_name = countrysettings::where('id', $supplier->country)->first();



        return view('store.contacts.supplieredit', compact('country', 'logo', 'supplier', 'country_name'));
    }

    public function edit_supplierpost(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'gstin' => 'nullable|string|max:15',
            'tax_number' => 'nullable|string|max:15',
            'opening_balance' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:10',
            'country' => 'required|integer|exists:countrysettings,id',
        ]);

        $supplier = Supplier::find($request->input('id'));

        if ($supplier) {
            $supplier->name = $request->input('supplier_name');
            $supplier->mobile = $request->input('mobile');
            $supplier->email = $request->input('email');
            $supplier->phone = $request->input('phone');
            $supplier->gst = $request->input('gstin');
            $supplier->tax = $request->input('tax_number');
            $supplier->balance = $request->input('opening_balance');
            $supplier->address = $request->input('address');
            $supplier->city = $request->input('city');
            $supplier->state = $request->input('state');
            $supplier->postcode = $request->input('postcode');
            $supplier->country = $request->input('country');

            // Save the updated customer details
            try {
                if ($supplier->save()) {
                    return redirect()->route('store_list_supplier')->with('success', 'Supplier updated successfully');
                } else {
                    return redirect()->route('store_list_supplier')->with('error', 'Failed to update supplier');
                }
            } catch (\Exception $e) {
                \Log::error('Database error: ' . $e->getMessage());
                return redirect()->route('store_list_supplier')->with('error', 'Database error: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('store_list_supplier')->with('error', 'Supplier not found');
        }
    }

    public function supplier_import_store(Request $request){
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
