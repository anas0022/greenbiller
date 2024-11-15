<?php

namespace App\Http\Controllers\store;
use App\Models\Coresetting;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Response;
use App\Exports\WarehouseExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Store_wareController extends Controller
{
    public function warehouse(){
        $logo =Coresetting::all();
        return view('store.warehouse.addwarehouse',compact('logo'));
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
        $warehouse->store_id = Auth::user()->store_id;
        $warehouse->created_by = Auth::user()->id;
        
        $warehouse->mobile = $request->input('mobile');
        $warehouse->email = $request->input('email');

        // Save the warehouse and check for success
        if ($warehouse->save()) {
            return back()->with('success', 'Warehouse added successfully');
        }

        return back()->withErrors('Failed to add the warehouse');
    }
    public function warelist() {
       $logo = Coresetting::all();
        $ware = Warehouse::where('store_id',Auth::user()->store_id)->get();
        return view('store.warehouse.listwarehouse', compact('ware','logo'));
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
            $logo  = Coresetting::all();
            $ware = Warehouse::where('id', $request->input('id'))->first();
            
            // Check if the warehouse exists
            if ($ware) {
                return view('store.warehouse.editwarehouse', compact('ware','logo'));
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
                $warehouse->store_id = Auth::user()->store_id;
                $warehouse->created_by = Auth::user()->id;
                
                $warehouse->mobile = $request->input('mobile');
                $warehouse->email = $request->input('email');
        
                // Save changes
                if ($warehouse->save()) {
                    return redirect()->route('store_warelist')->with('success', 'WareHouse updated successfully');
                }
            }
        
            return redirect()->route('store_warelist')->with('error', 'WareHouse not found');
        }
        public function updateStatus(Request $request) {
            $ware = Warehouse::find($request->input('id'));
        
            if ($ware) {
                // Toggle the status
                $ware->status = $ware->status == 'active' ? 'inactive' : 'active';
                $ware->save();
        
                return back()->with('success', 'Status updated successfully.');
            }
        
            return back()->withErrors('The status could not be updated.');
        }
        
}
