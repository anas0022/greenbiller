<?php

namespace App\Imports;
use App\Models\Customer;
use App\Models\ledger;
Use App\Models\UserList;
Use App\Models\Store;
Use Auth;

use Maatwebsite\Excel\Concerns\ToModel;
class CustomerLedger implements ToModel
{
   
    public function model(array $row)
    {
        $store = Store::where('store_name', $row[0])->first();
        $storeId = $store ? $store->id : null;
      
        $staff = UserList::where('name', $row[4])->first();
        $staffId = $staff ? $staff->id : null;
        $customer = Customer::where('customer_name' , $row[1])->first();
        $customer_id = $customer ? $customer->id :null ;
        return new ledger([
            'exce_id' => $staffId,
            'store_id'=>$storeId,
            'customer_id'=>$customer_id,
            'address'=> $row[2],
            'mobile'=> $row[3],
         
            
        ]);
    }
}
