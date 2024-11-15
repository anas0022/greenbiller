<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\Store;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\Log;

class CustomersImport implements ToModel
{
    public function model(array $row)
    {
        $latestCustomer = Customer::orderBy('customer_id', 'desc')->first(); 

        if ($latestCustomer) {
            $lastNumber = (int) substr($latestCustomer->customer_id, -4);
        } else {
            $lastNumber = 0;
        }
        $store = Store::where('store_name', $row[1])->first();
        $storeId = $store ? $store->id : null;
        
        // Increment the number by 1
        $nextNumber = $lastNumber + 1;
        $nextCustomerCode = 'CUS-'.$storeId.'-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        
        return new Customer([
            'customer_name' => $row[0],
            'customer_id'=>$nextCustomerCode,
            'created_by'=>Auth::user()->id,
            'store_id'=>$storeId,
            'gst_number'        => $row[2],
            'state'=> $row[3],
            'previous_due'  => $row[4],
            
        ]);
    }
    
}
