<?php
namespace App\Imports;

use App\Models\category;
use App\Models\Item;
use App\Models\Store;

use App\Models\Tax;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Warehouse;
use App\Models\Warehouseitem;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;

class ItemsImport implements ToModel
{
    public function model(array $row)
    {
        static $isFirstRow = true;
        if ($isFirstRow) {
            $isFirstRow = false;
            return null; 
        }

        Log::info('Import row data', ['row' => $row]);

        // Fetch related data
        $store = Store::where('store_name', $row[0])->first();
        $category = category::where('category_name', trim($row[4]))->first();
        $unit = Unit::where('unit_name', $row[6])->first(); 
        $brand = Brand::where('barndname', trim($row[5]))->first(); 
        $tax = Tax::where('per', trim($row[8]))->first();

        // Assign IDs or 'No Data' if not found
        $storeId = $store ? $store->id : 'No Data';
        $categoryId = $category ? $category->id : 'No Data';
        $unitId = $unit ? $unit->id : 'No Data';
        $brandId = $brand ? $brand->id : 'No Data';
        $taxId = $tax ? $tax->id : 'No Data';

        // Log any missing data for debugging
        if ($storeId === 'No Data' || $categoryId === 'No Data' || 
            $unitId === 'No Data' || $brandId === 'No Data' || 
            $taxId === 'No Data') {
            Log::warning("Missing data on import row", [
                'store' => $storeId,
                'category' => $categoryId,
                'unit' => $unitId,
                'brand' => $brandId,
                'tax' => $taxId,
                'row' => $row
            ]);
        }

        // Create a new Item instance and save it
        $item = Item::create([
            'store_id' => $storeId,
            'item_code' => $row[1],
            'created_by' => auth()->id(),
            'part_no'=>$row[2],
            'item_name' => $row[3],
            'category_id' => $categoryId,
            'brand_id' => $brandId,
            'unit_id' => $unitId,
            'hsn_code' => $row[7],
            'tax_id' => $taxId,
        
            'opening_stock' => $row[9],

            
        ]);

        // Fetch the first warehouse linked to the store
        $warehouse = Warehouse::where('store_id', $storeId)->first();

        // Ensure `opening_stock` has a value before creating the Warehouseitem
        if ($warehouse && $item->opening_stock) {
            Warehouseitem::create([
                'store_id' => $storeId,
                'warehouse_id' => $warehouse->id,
                'item_id' => $item->id,
                'available_qty' => $item->opening_stock,
            ]);

            // Log success message for debug
            Log::info('Warehouse item created successfully', [
                'item_id' => $item->id,
                'available_qty' => $item->opening_stock
            ]);
        } else {
            Log::warning("No warehouse found or opening stock missing for store ID", [
                'store_id' => $storeId,
                'item_id' => $item->id,
                'opening_stock' => $item->opening_stock
            ]);
        }

        return $item;
    }
}
