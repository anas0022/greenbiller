<?php

namespace App\Http\Controllers\store\supplier;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierListController extends Controller
{
    public function list_supplier(){
        $logo = Coresetting::all();
    
        $supplier = Supplier::all();
        
        return view ('store.contacts.supplierlist' , compact('supplier','logo'));
    }

    public function deletesupplier_store(Request $request){
        $brand  = Supplier::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
    public function updateStatus_supplier_store(Request $request){
        $brands = Supplier::find($request->input('id'));
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
      }
}
