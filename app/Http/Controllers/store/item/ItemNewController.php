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
use Illuminate\Validation\ValidationException;

class ItemNewController extends Controller
{
    public function new_item(){
        try {
            // Get the previous (last) item code
            $previous_item = Item::orderBy('id', 'desc')->first();
            $previous_item_code = $previous_item ? $previous_item->item_code : 'No previous items';
            
            // Get the next item code
            $next_number = $previous_item ? 
                ((int) str_replace('IT-'.Auth::user()->store_id.'-', '', $previous_item->id)) + 1 : 1;
            $item_code = 'IT-' . Auth::user()->store_id .'-'. str_pad($next_number, 4, '0', STR_PAD_LEFT);
            
            // Rest of your existing code
            $brands = Brand::where('status', 'active')->get();
            $category = Category::where('status', 'active')->get();
            $logo = Coresetting::all();
            $store_id = Store::where('id', Auth::user()->store_id)->first();
            $ware = Warehouse::whereIn('store_id', $store_id)->get();
            $unit = Unit::where('status', 'active')->get();
            $tax = Tax::where('status', 'active')->get();
            
            return view('store.Items.newitem', compact(
                'brands', 'category', 'ware', 'unit', 
                'tax', 'store_id', 'logo', 'item_code', 'previous_item_code'
            ));
        } catch (Exception $e) {
            \Log::error('Error generating item code: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error generating item code');
        }
    }
 public function item_post(Request $request)
    {
        try {
            // Move validation before transaction
            $validated = $request->validate([
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

            DB::beginTransaction();
            
            $store = Store::find(Auth::user()->store_id);
            
            $item = new Item();
            $item->store_id = Auth::user()->store_id;
            $item->created_by = auth()->id();
            $item->second_store_id = $store->second_store_id ;
            $item->tax_amount = $request->input('tax_amount');
            $item->item_code = $request->input('item_code');
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
                $itemWarehouse = new WarehouseItem();
                $itemWarehouse->store_id = Auth::user()->store_id;
                $itemWarehouse->warehouse_id = $request->input('ware_house');
                $itemWarehouse->item_id = $item->id;
                $itemWarehouse->available_qty = $request->input('opening_stock');
                $itemWarehouse->save();

                DB::commit();
                return redirect()->back()->with('success', 'Item added successfully');
            }

            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save item');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving item: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred while saving the item')
                ->withInput();
        }
    }
}