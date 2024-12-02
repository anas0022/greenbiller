<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\ledger;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    
    public function ledgerreport(){

        $logo = Coresetting::all();
        $store = Store::all();
        return view('admin.ledgerreport.ledger',compact('logo','store'));
    }

    public function getCustomersByStore(Request $request)
    {
        $storeId = $request->store_id;
        $customers = Customer::where('store_id', $storeId)
            ->select('id', 'customer_name')
            ->get();
        return response()->json($customers);
    }

    public function getLedgerByCustomer(Request $request)
    {
        try {
            $customerId = $request->customer_id;
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
    
            $query = ledger::with('store')->where('customer_id', $customerId);
    
            // Apply date filters if provided
            if ($fromDate) {
                $query->where('date', '>=', $fromDate);
            }
            if ($toDate) {
                $query->where('date', '<=', $toDate);
            }
    
            $ledger = $query->select('id', 'store_id', 'customer_id', 'debit', 'invoice_purchase_no', 'date')->get();
    
            return response()->json([
                'success' => true,
                'ledger' => $ledger
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
