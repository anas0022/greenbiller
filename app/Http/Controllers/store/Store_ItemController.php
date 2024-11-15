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
    public function new_item(){
        $brands = Brand::where('status', 'active')->get();
        $category = category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $store_id = Store::where('id', Auth::user()->store_id)->first();
       
        $ware = Warehouse::whereIn('store_id', $store_id)->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        
     
        return view( 'store.Items.newitem', compact('brands','category','ware','unit','tax','store_id','logo'));
    }
    public function item_post(Request $request)
    {
        
       

       
        $item = new Item();
        $item ->store_id = $request->input('store_id');
        $item -> item_code = $request->input('item_code');
        $item ->created_by = Auth()->id();
        $item -> tax_amount = $request->input('tax_amount');
        $item -> item_name = $request->input('item_name');
        $item -> show_app = $request->input('app');
        $item -> app_price = $request->input('app_Price');
        $item -> category_id = $request->input('category');
        $item -> brand_id = $request->input('brand');
        $item ->store_id = Auth::user()->store_id;
        $item -> unit_id = $request->input('unit');
        $item -> sku = $request->input('sku');
        $item -> hsn_code = $request->input('hsn_code');
        $item -> alert_quantity= $request->input('alert_quantity');
        $item -> seller_point = $request->input('sellerpoint');
        $item -> barcode = $request->input('bar_code');
        $item -> expiry_date = $request->input('expiry_date');
        $item -> dis = $request->input('dis');
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('item', 'public'); // Store in 'public/brand' directory
            $item->image = $imagePath;
        }
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

        if($item->save()){


            $itemwarehouse = new Warehouseitem();
            $itemwarehouse ->store_id = Auth::user()->store_id;
            $itemwarehouse -> warehouse_id = $request->input('ware_house');
            $itemwarehouse ->item_id=$item->id;
            $itemwarehouse ->available_qty =$request->input('opening_stock');
            $itemwarehouse ->save();
            
                // Success response
                return back()->with('success' ,'Item Added Successfully');
            
        
            // Failure response
         

            /* return back()->with('success', 'Item Added Successfully'); */
        }
        /* return back()->withErrors('Items Not Added'); */
        return back()->with('error' ,'Items Not Added');
    }
    public function itemlist(Request $request)
{
    $items = Item::where('store_id', Auth::user()->store_id)->get();

$categories = Category::all();
$unites = Unit::all();
 $tax = Tax::all();

$brand = Brand::all();

    $logo = Coresetting::all();
    return view('store.Items.itemlist', compact('logo','items','categories','brand','unites','tax'));
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
    public function item_bulkpost(Request $request)
    {
        \Log::info('Request received:', $request->all());
    
        if ($request->hasFile('excel_file')) {
            \Log::info('File uploaded:', [$request->file('excel_file')->getClientOriginalName()]);
    
            try {
                Excel::import(new ItemsImport, $request->file('excel_file'));
                return back()->with('success', 'Items Imported Successfully');
            } catch (\Exception $e) {
                \Log::error('Error importing file: ' . $e->getMessage());
                return back()->with('error', 'Error importing file: ' . $e->getMessage());
            }
        }
    
        \Log::warning('No file uploaded');
        return back()->with('error', 'File not uploaded');
    }
}
