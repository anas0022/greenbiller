<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Response;
use App\Exports\WarehouseExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
class WarehousrController extends Controller
{
    public function warehouse(){
        return view('admin.warehouse.addwarehouse');
    }
    public function warepost(Request $request)
    {
        // Validate the request input
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Create a new Warehouse instance and save the data
        $warehouse = new Warehouse();
        $warehouse->name = $request->input('name');
        $warehouse->address = $request->input('address');
        $warehouse->mobile = $request->input('mobile');
        $warehouse->email = $request->input('email');

        // Save the warehouse and check for success
        if ($warehouse->save()) {
            return back()->with('success', 'Warehouse added successfully');
        }

        return back()->withErrors('Failed to add the warehouse');
    }
    public function warelist() {
        // Fetch warehouses ordered by creation date, with the most recent first
        $ware = Warehouse::all();
        return view('admin.warehouse.listwarehouse', compact('ware'));
    }
    
    
        public function deleteware(Request $request) {
            
         
            $ware = Warehouse::find($request->input('id'));
        
            // Check if the warehouse exists
            if ($ware) {
                $ware->delete();
                return redirect()->back()->with('success', 'Warehouse deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Warehouse not found.');
            }
        }
        public function wareedit(){
            return view('editwarehouse');
        }public function editware(Request $request) {
            // Fetch the warehouse by ID
            $ware = Warehouse::where('id', $request->input('id'))->first();
            
            // Check if the warehouse exists
            if ($ware) {
                return view('admin.warehouse.editwarehouse', compact('ware'));
            } else {
                return redirect()->back()->with('error', 'Warehouse not found.');
            }
        }
        public function update_ware(Request $request) {
            // Fetch the warehouse by ID
         
        
            // Check if the warehouse exists
            $warehouse = Warehouse::find($request->input('id'));
    
            if ($warehouse) {
                $warehouse->name = $request->input('name');
                $warehouse->address = $request->input('address');
                $warehouse->mobile = $request->input('mobile');
                $warehouse->email = $request->input('email');
        
                // Save changes
                if ($warehouse->save()) {
                    return redirect()->route('warelist')->with('success', 'WareHouse updated successfully');
                }
            }
        
            return redirect()->route('warelist')->with('error', 'WareHouse not found');
        }
        public function updateStatus(Request $request) {
            $ware = Warehouse::find($request->input('id'));
        
            if ($ware) {
                // Toggle the status
                $ware->status = $ware->status == 'active' ? 'inactive' : 'active';
                $ware->save();
        
                return redirect()->route('warelist')->with('success', 'Status updated successfully.');
            }
        
            return back()->withErrors('The status could not be updated.');
        }
        
        
        }
        
       
        
        
    
    

