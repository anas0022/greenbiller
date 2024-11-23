<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\ledger;
use App\Models\Reciept;
use App\Models\Sale;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RecieptController extends Controller
{
   

 

    // Add new method to show receipt
    public function view_receipt($id)
    {
            $logo = Coresetting::all(); 
            $ledger = ledger::where('id',$id)->first();
            $store = Store::where('id',$ledger->store_id)->first();
            $customer =Customer::where('id',$ledger->customer_id)->first();
          
            return view('admin.reciept.view_receipt',compact('logo','ledger','customer','store'));
        } 
    }

