<?php

namespace App\Http\Controllers\store\report;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\ledger;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\UseUse;
Use Auth;
class ReportController extends Controller
{
    public function salesreport(){

        $logo = Coresetting::all();
        $store = Store::where('id',Auth::user()->store_id)->first();
        $customers = Customer::where('store_id', Auth::user()->store_id)
        ->select('id', 'customer_name')
        ->get();
        return view('store.reports.salesreport', compact('logo','store','customers'));
    }
    public function getSalesByCustomer(Request $request)
    {
        try {
            $customerId = $request->customer_id;
            $fromDate = $request->from_date; // Get the from_date from the request
            $toDate = $request->to_date; // Get the to_date from the request
    
            // Log the input values
            \Log::info('Input Values:', [
                'customer_id' => $customerId,
                'from_date' => $fromDate,
                'to_date' => $toDate,
            ]);
    
            // Query sales with date filtering
            $sale = Sale::with('store')
                ->where('customer_id', $customerId)
                ->when($fromDate, function ($query) use ($fromDate) {
                    return $query->where('created_at', '>=', $fromDate);
                })
                ->when($toDate, function ($query) use ($toDate) {
                    return $query->where('created_at', '<=', $toDate);
                })
                ->get();
    
            return response()->json([
                'success' => true,
                'sale' => $sale
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function purchasereport(){
        
        $logo = Coresetting::all();
        $store = Store::where('id',Auth::user()->store_id)->first();
        $suppliers = Supplier::where('store_id', Auth::user()->store_id)

        ->get();
        return view('store.reports.purchasereport', compact('logo','store','suppliers'));
    }
    public function getsupplierByStore(Request $request)
    {
        $storeId = $request->store_id;
        $customers = Supplier::where('store_id', $storeId)
            ->select('id', 'name')
            ->get();
        return response()->json($customers);
    }
    public function getPurchaseByCustomer(Request $request)
    {
        try {
            $supplier_id = $request->customer_id;
            $fromDate = $request->from_date; // Get the from_date from the request
            $toDate = $request->to_date; // Get the to_date from the request
    
            // Log the input values
            \Log::info('Input Values:', [
                'customer_id' => $supplier_id,
                'from_date' => $fromDate,
                'to_date' => $toDate,
            ]);
    
            // Query sales with date filtering
            $purchase = Purchase::with('store')
                ->where('supplier_id', $supplier_id)
                ->when($fromDate, function ($query) use ($fromDate) {
                    return $query->where('created_at', '>=', $fromDate);
                })
                ->when($toDate, function ($query) use ($toDate) {
                    return $query->where('created_at', '<=', $toDate);
                })
                ->get();
    
            return response()->json([
                'success' => true,
                'sale' => $purchase
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function ledgerreport(){

        $logo = Coresetting::all();
        $store = Store::where('id',Auth::user()->store_id)->first();
        $customers = Customer::where('store_id', Auth::user()->store_id)
        ->select('id', 'customer_name')
        ->get();
        return view('store.ledgerreport.ledger',compact('logo','store','customers'));
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
