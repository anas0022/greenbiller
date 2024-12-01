<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\Item;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
Use Auth;
class ItemEditController extends Controller
{
    public function edititem(Request $request){

        $items = Item::where('id', $request->input('id'))->first();
        $brand = Brand::where('id',$items->brand_id)->first();
        $brands = Brand::all();
        $category = category::where('id',$items->category_id)->first();
        $categories = category::all();
      
        $store_id = Store::where('id', Auth::user()->store_id)->first();
        $warehouse = Warehouse::where('id',$items->ware_house_id)->first();
   $ware = Warehouse::whereIn('store_id', $store_id)->get();
   $unit = Unit::where('id',$items->unit_id)->first();
        $unites = Unit::all();
        $tax = Tax::where('id',$items->tax_id)->first();
        
        $taxes = Tax::all();
      
        $logo = Coresetting::all();
        return view('store.Items.itemedit',compact('warehouse','items','brand','category','ware','unit','tax','logo','brands','categories','unites','store_id','taxes'));
    }

    public function item_edit(Request $request)
    {

        $item = Item::find($request->input('id'));
        if (!$item) {
            return back()->with('error', 'Item not found');
        }
        if ($item) {
            $item->item_code = $request->input('item_code');
            $item->mrp = $request->input('mrp');
            $item->part_no = $request->input('part_no');
            $item->show_app = $request->input('app');
            $item->app_price = $request->input('app_Price');

            $item->show_app = $request->input('app');
            $item->item_name = $request->input('item_name');
            $item->category_id = $request->input('category');
            $item->brand_id = $request->input('brand');
            $item->unit_id = $request->input('unit');
            $item->sku = $request->input('sku');
            $item->hsn_code = $request->input('hsn_code');
            $item->alert_quantity = $request->input('alert_quantity');
            $item->seller_point = $request->input('sellerpoint');
            $item->barcode = $request->input('bar_code');
            $item->expiry_date = $request->input('expiry_date');
            $item->dis = $request->input('dis');

            $item->discount_type = $request->input('discount_type');
            $item->discount = $request->input('discount');
            $item->purchase_price = $request->input('purchase_value');
            $item->tax_id = $request->input('tax');
            $item->tax_type = $request->input('tax_type');
            $item->price = $request->input('price');
            $item->profit_margin = $request->input('profit_margin');
            $item->sales_price = $request->input('sales_price');
            $item->mrp = $request->input('mrp');
            $item->ware_house_id = $request->input('ware_house');
            $item->opening_stock = $request->input('opening_stock');
          
            if ($request->hasFile('picture')) {
                $imagePath = $request->file('picture')->store('item', 'public'); // Store in 'public/brand' directory
                $item->image = $imagePath;
            }
            if ($item->save()) {
                return redirect()->route('store_itemlist')->with('success', 'Item updated successfully');
            }
            return back()->with('error', 'Item not found');

        }
    }
}
