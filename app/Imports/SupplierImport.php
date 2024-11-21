<?php

namespace App\Imports;

use App\Models\Store;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;

class SupplierImport implements ToModel
{
    public function model(array $row)
    {
        $store = Store::where('store_name', $row[1])->first();
        $storeId = $store ? $store->id : null;

        $latestCustomer = Supplier::orderBy('supplier_id', 'desc')->first();

        $lastNumber = $latestCustomer ? (int) substr($latestCustomer->supplier_id, -4) : 0;
        
        // Increment the number by 1
        $nextNumber = $lastNumber + 1;

        // Generate next supplier code, handling potential null storeId
        $nextCustomerCode = 'SP-' . ($storeId .'-'?? '0000') . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        
        return Supplier::create([
            'store_id' => $storeId,
            'name' => $row[0],
            'state' => $row[2],
            'gst' => $row[3],
            'balance' => $row[4],
            'supplier_id' => $nextCustomerCode
            
        ]);
    }
}
