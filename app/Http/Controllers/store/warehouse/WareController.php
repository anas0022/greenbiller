<?php

namespace App\Http\Controllers\store\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareController extends Controller
{
    public function warehouse(){
        $logo =Coresetting::all();
        return view('store.warehouse.addwarehouse',compact('logo'));
    }
    
    public function warelist() {
        $warehose = Warehouse::where('created_by',auth()->user()->id)->get();
        $ware =$warehose;
        $logo = Coresetting::all(); 
        

        return view('store.warehouse.listwarehouse', compact('ware', 'logo'));
    }
    
    
      
      
      
        
}
