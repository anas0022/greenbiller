<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PosController extends Controller
{
    //
    public function add_pos(Request $request){
        $ware = Warehouse::all();
      
        $store = Store::all();
      
        $unit = Unit::all();
        $customers = Customer::all();
 
        $category = category::all();
     
        $country = countrysettings::all();
        $brands = Brand::where('status', 'active')->get();
        $category = category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $stores = Store::where('store_status', 'active')->get();
        
        $tax = Tax::all();
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();
        return view('admin.salepos.salesbill',compact('customers','stores', 'ware', 'tax', 'store', 'unit',   'account', 'brands', 'category', 'items', 'country'));



    }
}
