<?php

namespace App\Imports;

use App\Models\ledger;
use App\Models\Store;
use App\Models\Supplier;


use Maatwebsite\Excel\Concerns\ToModel;
class SupplierLedger implements ToModel
{
    
    public function model(array $row)
    {
        $store = Store::where('store_name', $row[0])->first();
        $storeId = $store ? $store->id : null;
        $supplier = Supplier::where('name', $row[1])->first();
  
        $supplierId = $supplier ? $supplier->id : null;
        return ledger::create([
            'store_id' => $storeId,
            'address' => $row[2],
            'supplier_id' => $supplierId,

        ]);
    }
}
