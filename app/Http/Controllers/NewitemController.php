<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\second_store;
use App\Models\Store;
use App\Models\Warehouseitem;
use Auth;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Tax;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Models\Item;
class NewitemController extends Controller
{
    public function new_item()
    {
        $brands = Brand::where('status', 'active')->get();
        $category = category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $store = Store::where('store_status', 'active')->get();

        return view('admin.Items.newitem', compact('brands', 'category', 'ware', 'unit', 'tax', 'store', 'logo'));
    }
    public function item_post(Request $request)
{
    DB::beginTransaction(); // Start the transaction

    try {
        $store = Store::find($request->input('store_id'));

        // Validate request data
        $request->validate([
            'store_id' => 'required',
            'item_code' => 'required',
            'item_name' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'sales_price' => 'required',
            'purchase_value' => 'required',
            'opening_stock' => 'required',
            'ware_house' => 'required',
     
        ]);

        $item = new Item();
        $item->store_id = $request->input('store_id');
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

        if ($item->save()) {
            // Save warehouse item details
            $itemWarehouse = new WarehouseItem();
            $itemWarehouse->store_id = $request->input('store_id');
            $itemWarehouse->warehouse_id = $request->input('ware_house');
            $itemWarehouse->item_id = $item->id;
            $itemWarehouse->available_qty = $request->input('opening_stock');
            $itemWarehouse->save();

            DB::commit();
            return back()->with('success', 'Item added successfully');
        }

    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error
        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function itemlist(Request $request)
    {
        // Use eager loading to load brands for each item
        $items = Item::with('brand')->get();
        $items = Item::with('category')->get();
        $items = Item::with('unit')->get();
        $items = Item::with('tax')->get();
        $logo = Coresetting::all();
        return view('admin.Items.itemlist', compact('items', 'logo'));
    }

    public function itemstatus(Request $request)
    {
        $brands = Item::find($request->input('id'));

        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();

            return redirect()->route('itemlist')->with('success', 'Status updated successfully.');
        }

        return back()->withErrors('The status could not be updated.');
    }
    public function edititem(Request $request)
    {

        $items = Item::where('id', $request->input('id'))->first();
        $brand = Brand::all();
        $category = category::all();
        $store = Store::all();
        $ware = Warehouse::all();
        $unit = Unit::all();
        $tax = Tax::all();
        $logo = Coresetting::all();
        return view('admin.Items.itemedit', compact('items', 'brand', 'category', 'ware', 'unit', 'tax', 'store','logo'));
    }
   
    public function deleteitem(Request $request)
    {
        $brand = Item::where('id', $request->input('id'));

        if ($brand->delete()) {
            return back()->with('success', 'Deleted successfully');
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

    public function item_edit(Request $request){
        DB::beginTransaction(); // Start the transaction

        try {
            $store = Store::find($request->input('store_id'));

            // Validate request data
            $request->validate([
                'store_id' => 'required',
                'item_code' => 'required',
                'item_name' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'unit' => 'required',
                'sku' => 'required',
                'price' => 'required',
                'sales_price' => 'required',
                'purchase_value' => 'required',
                'opening_stock' => 'required',
                'ware_house' => 'required',
            ]);

            // Retrieve the existing item
            $item = Item::find($request->input('id')); // Get the item by ID

            // Update item properties
            $item->store_id = $request->input('store_id');
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

            if ($item->save()) {
                // Save warehouse item details
                $itemWarehouse = WarehouseItem::where('item_id', $item->id)->first();
                if ($itemWarehouse) {
                    $itemWarehouse->available_qty = $request->input('opening_stock');
                    $itemWarehouse->save();
                }

                DB::commit();
                return redirect()->route('itemlist')->with('success', 'Item updated successfully');
            }

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback on error
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
