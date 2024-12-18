<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PayInOutController extends Controller
{
    public function payin(Request $request){
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
       
    
  
    

        return view('admin.pay.payin',compact('prefix','ware','sale','saleCode','store','unit','customers','logo','category','country','brands','tax','items','storeId','customer','account','stores'));

    } 

    public function getbill(Request $request)
    {
        $customer = $request->customer_id; // Access the customer_id from the request
        $salepay = Sale::whereNull('paid_amount')
            ->orWhereColumn('paid_amount', '<', 'grand_total')
            ->where('customer_id', $customer)
            ->get();
    
        return response()->json([
            'success' => true,
            'sales' => $salepay // Return the sales data in a structured format
        ]);
    }
}
