<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ledger;
use App\Models\Reciept;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RecieptController extends Controller
{
   

 
    public function add_receipt(Request $request)
    {
        $ware = Warehouse::all();
        $sale = Sale::latest('id')->first();
      
      
        $saleCode = $sale
            ? str_pad($sale->count_id + 1, 4, '0', STR_PAD_LEFT)
            : '0001';


        $store = Store::all();
        $storeId = $request->input('store_id');
        $customer = $request->input('customer_id');
        $unit = Unit::all();
        $customers = [];
        $prefix = [];
        if ($storeId) {
            $customers = Customer::where('store_id', $storeId)->get();
        }
        if ($customer) {
            $prefix = Sale::where('customer_id', $sale->customer)->where('prefix')->get();
        }



        $category = Category::all();

        $country = countrysettings::all();
        $brands = Brand::where('status', 'active')->get();
        $category = Category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $stores = Store::where('store_status', 'active')->get();

        $taxes = Tax::all();
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();

        return view('admin.reciept.addreciept',compact('prefix','ware','sale','saleCode','store','unit','customers','logo','category','country','brands','tax','items','storeId','customer','account','stores'));
    }
    public function view_receipt($id)
    {
            $logo = Coresetting::all(); 
            $ledger = ledger::where('id',$id)->first();
            $store = Store::where('id',$ledger->store_id)->first();
            $customer =Customer::where('id',$ledger->customer_id)->first();
          
            return view('admin.reciept.view_receipt',compact('logo','ledger','customer','store'));
        } 
    }

