<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;

class QrviewController extends Controller
{
    public function qrview($id)
    {
        
        $sale_items = Saleitems::where('sales_id', $id)->get();
        $sale = Sale::where('id', $id)->first();
    
        if ($sale_items->isNotEmpty()) {
            $tax = Tax::whereIn('id', $sale_items->pluck('tax_id'))->get();
            $unit_id = Unit::where('id',$sale_items->pluck('unit_id'))->get();
            $store = Store::where('id', $sale_items->first()->store_id)->first();
            $customer = Customer::where('id', $sale_items->first()->customer_id)->first();
            return view('admin.qrview.invoiceqrview', compact('sale_items', 'store', 'customer', 'sale','unit_id','tax'));
        } else {
            // Handle the case where no Saleitems records were found
            return redirect()->back()->with('error', 'Sale items not found.');
        }
    }
    public function store_itemsscan($id){
        $storeItems = Item::where('store_id', $id)->get();
        

        return view('admin.qrview.storeqrview',compact('storeItems'));
    }
}
