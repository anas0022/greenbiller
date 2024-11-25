<?php

namespace App\Http\Controllers\store\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareUpadteController extends Controller
{
    
    
    public function wareedit(){
        $logo =Coresetting::all();
        return view('store.warehouse.editwarehouse',compact('logo'));
    }
    public function editware(Request $request) {
 
        $logo =Coresetting::all();
        $ware = Warehouse::where('id', $request->input('id'))->first();
        
        if ($ware) {
            return view('store.warehouse.editwarehouse', compact('ware','logo'));
        } else {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }
    }
    public function update_ware(Request $request) {
        $logo =Coresetting::all();  

        $warehouse = Warehouse::find($request->input('id'));

        if ($warehouse) {
            $warehouse->name = $request->input('name');
            $warehouse->address = $request->input('address');
            $warehouse->mobile = $request->input('mobile');
            $warehouse->email = $request->input('email');
    
            // Save changes
            if ($warehouse->save()) {
        return redirect()->route('store_warelist')->with('success', 'WareHouse updated successfully');
            }
        }
    
        return redirect()->route('store_warelist')->with('error', 'WareHouse not found');
    }
}
