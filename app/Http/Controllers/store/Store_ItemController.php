<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coresetting;
use App\Models\Store;
use App\Models\Warehouseitem;
use Auth;

use App\Models\Brand;
use App\Models\category;
use App\MOdels\Warehouse;
use App\Models\Unit;
use App\Models\Tax;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Models\Item;

class Store_ItemController extends Controller
{
       public function itemlist(Request $request)
{
   
}

    public function itemstatus(Request $request){
        $brands = Item::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return redirect()->route('store_itemlist')->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
   
    public function item_edit(Request $request){
     
        $item = Item::find($request->input('id'));
        if (!$item) {
            return back()->with('error', 'Item not found');
        }
        if ($item) {
            $item -> item_code = $request->input('item_code');
            $item -> mrp = $request->input('mrp');
            $item -> part_no = $request->input('part_no');
            $item -> show_app = $request->input('app');
            $item -> app_price = $request->input('app_Price');
            
            $item -> show_app = $request->input('app');
            $item -> item_name = $request->input('item_name');
            $item -> category_id = $request->input('category');
            $item -> brand_id = $request->input('brand');
            $item -> unit_id = $request->input('unit');
            $item -> sku = $request->input('sku');
            $item -> hsn_code = $request->input('hsn_code');
            $item -> alert_quantity= $request->input('alert_quantity');
            $item -> seller_point = $request->input('sellerpoint');
            $item -> barcode = $request->input('bar_code');
            $item -> expiry_date = $request->input('expiry_date');
            $item -> dis = $request->input('dis');
          
            $item -> discount_type = $request->input('discount_type');
            $item -> discount = $request->input('discount');
            $item -> purchase_price = $request->input('purchase_value');
            $item -> tax_id = $request->input('tax');
            $item -> tax_type = $request->input('tax_type');
            $item -> price = $request->input('price');
            $item -> profit_margin = $request->input('profit_margin');
            $item -> sales_price = $request->input('sales_price');
            $item -> mrp = $request->input('mrp');
            $item -> ware_house_id = $request->input('ware_house');
            $item ->opening_stock =$request->input('opening_stock');
            if ($request->hasFile('picture')) {
                $imagePath = $request->file('picture')->store('item', 'public'); // Store in 'public/brand' directory
                $item->image = $imagePath;
            }
            if ($item->save()) {
                return redirect()->route('itemlist')->with('success', 'Item updated successfully');
            }
            return back()->with('error', 'Item not found');
    
        }
    }
    public function deleteitem(Request $request){
        $brand  = Item::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
  
}
