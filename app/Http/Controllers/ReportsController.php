<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function salesreport(){

        $logo = Coresetting::all();
        $store = Store::all();
        return view('admin.reports.salesreport', compact('logo','store'));
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
        $store = Store::all();
        return view('admin.reports.purchasereport', compact('logo','store'));
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
}
