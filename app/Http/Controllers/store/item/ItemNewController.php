<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\Item;
use App\Models\second_store;
use App\Models\Second_wareitems;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Warehouse;
use App\Models\Warehouseitem;
use Illuminate\Http\Request;
Use Auth;

class ItemNewController extends Controller
{
    public function new_item(){
        $brands = Brand::where('status', 'active')->get();
        $category = Category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $store_id = Store::where('id', Auth::user()->store_id)->first();
       
        $ware = Warehouse::whereIn('store_id', $store_id)->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        
     
        return view( 'store.Items.newitem', compact('brands','category','ware','unit','tax','store_id','logo'));
    }
    public function item_post(Request $request)
    {
       
        
            $store = Store::find($request->input('store_id'));
          

            // Create new item
            $item = new Item();
            $item->store_id = Auth::user()->store_id;
            
            $item->item_code = $request->input('item_code');
            $item->created_by = auth()->id();
            $item->second_store_id = $store->second_store_id;
            $item->tax_amount = $request->input('tax_amount');
            $item->item_name = $request->input('item_name');
            $item->show_app = $request->input('app');
            $item->app_price = $request->input('app_Price');
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
            
            // Handle image upload
            if ($request->hasFile('picture')) {
                $imagePath = $request->file('picture')->store('item', 'public');
                $item->image = $imagePath;
            }

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
            $item->status = 'active';  // Set default status

            if (!$item->save()) {
                throw new \Exception('Failed to save item');
            }

            // Save warehouse item details
            $itemWarehouse = new WarehouseItem();
            $itemWarehouse->store_id = $request->input('store_id');
            $itemWarehouse->warehouse_id = $request->input('ware_house');
            $itemWarehouse->item_id = $item->id;
            $itemWarehouse->available_qty = $request->input('opening_stock');
            
         
          if($item->save()){
            return redirect()->back()->with('success', 'Item added successfully');
          }
            return redirect()->back()->with('error','Item not added');
   

      
    }
}