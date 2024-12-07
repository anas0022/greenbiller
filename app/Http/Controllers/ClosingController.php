<?php

namespace App\Http\Controllers;

use App\Models\Closing;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\SaleReturn;
use App\Models\sales_return_payments;
use App\Models\salespayment;
use App\Models\Store;
use App\Models\Purchase;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClosingController extends Controller
{

    public function closing_list()
    {
        if (request()->ajax()) {
            // Fetch all closing records including store_id
            $closing = Closing::select('id', 'date', 'invoice_count', 'total_sale', 'total_expense', 'closing_amount', 'opening_balance', 'prefix', 'closing_code', 'purchase_count', 'total_purchase', 'store_id')->get();
    
            return response()->json([
                'data' => $closing
            ]);
        }
    
        $logo = Coresetting::all();
        return view('admin.closing.closinglist', [
            'logo' => $logo
        ]);
    }

    public function daily_closing(Request $request)
    {       
        if ($request->ajax()) {
            $store = Store::all();
            $storeId = $request->input('store_id');
            $today_date = $request->input('date');
            $yesterday_date = date('Y-m-d', strtotime($today_date . ' -1 day'));
            $sales_payments = salespayment::where('payment_date', $today_date)
            ->where('store_id',$storeId)
            ->pluck('sales_id'); 
            $purchase_payments = Purchasepay::where('payment_date', $today_date)
            ->where('store_id',$storeId)
                ->pluck('purchase_id');

            $purchases = Purchase::whereIn('id', $purchase_payments)
            
                ->select('id', 'prefix', 'purchase_code', 'purchase_date')
                
                ->get();



            $sales = Sale::whereIn('id', $sales_payments)  
            ->select('id', 'prefix', 'sales_code', 'sales_date')
            ->where('store_id',$storeId)
            ->get();

            \Log::info('Sales Data:', $sales->toArray());

            $total_expense = Expense::where('date', $today_date)
            ->where('store_id',$storeId)
            ->get()->sum('amount');


            if (empty($total_expense)) {
                $previous_closing = Closing::latest('id')
                ->where('store_id',$storeId)
                ->first();
                $total_expense = $previous_closing ? $previous_closing->opening_balance : 0;
            }

            $purchase_payment = Purchasepay::where('payment_date', $today_date)
                ->where('payment_type', 'cash')
                ->where('store_id',$storeId)
                ->get();

            \Log::info('Purchase Payment Data:', [
                'date' => $today_date,
                'payments' => $purchase_payment->toArray(),
                'sum' => $purchase_payment->sum('payment')
            ]);

            $purchase_payment_ids = Purchasepay::where('payment_date', $today_date)
                ->where('payment_type', 'cash')
                ->where('store_id',$storeId)
                ->pluck('purchase_id');
        

            $purchases = Purchase::whereIn('id', $purchase_payment_ids)
                ->select('id', 'prefix', 'purchase_code', 'purchase_date')
                ->get();

         

            return response()->json([
                'sale_payment' => salespayment::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->where('store_id',$storeId)
                    ->get()->sum('payment'),

                'sale' => $sales,
                'sale_amount' => salespayment::where('payment_date', $today_date)
                ->where('store_id',$storeId)
                    ->where('payment_type', 'cash')
                    ->get(),
                'payment' => Purchasepay::where('payment_date', $today_date)
                ->where('store_id',$storeId)
                    ->where('payment_type', 'cash')
                    ->select('payment')
                    ->get()
                    ->map(function($item) {
                        return [
                            'payment' => $item->payment
                        ];
                    }),
                'opening_balance' => Closing::latest('id')->first(),
                'expense' => Expense::where('date', $today_date)
                ->where('store_id',$storeId)
                ->get(),
                'total_invoice_count' => $sales->count(),
                'purchase_bill_count'=>$purchases->count(),
                'total_expense' => $total_expense,
                'expense_amount' => $total_expense,
                'purchases' => $purchases,
            ]);
        }

        // Handle non-AJAX request
        $storeId = $request->input('store_id');
        $logo = Coresetting::all();
        $today = Carbon::today()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();

        // Fetch initial sales and purchases
        $initial_sales = Sale::where('sales_date', $today)
            ->select('id', 'prefix', 'sales_code', 'sales_date')
            ->where('store_id', $storeId)
            ->get();

        $purchase_payments = Purchasepay::where('payment_date', $today)
            ->where('payment_type', 'cash')
            ->where('store_id', $storeId)
            ->pluck('purchase_id');

        $purchases = Purchase::whereIn('id', $purchase_payments)
        
            ->select('id', 'prefix', 'purchase_code', 'purchase_date')
            
            ->get();

        $payment_total = Purchasepay::where('payment_date', $today)
            ->where('payment_type', 'cash')
            ->where('store_id', $storeId)
            ->sum('payment');

        return view('admin.closing.dailyclosing', [
            'logo' => $logo,
            'sale' => $initial_sales,
            'sale_amount' => [],
            'expense' => [],
            'opening_balance' => Closing::latest('id')->first(),
            'total_invoice_count' => 0,
            'purchase_bill_count' => 0,
            'sale_payment' => 0,
            'expense_amount' => 0,
            'payment' => [],
            'payment_total' => $payment_total,
            'purchases' => $purchases,
            'purchase_count' => $purchases->count(),
            'store' => Store::all(),
        ]);
    }

    public function daily_closing_post(Request $request)
    {
        $year = date('Y');
        $prefix = 'CS-' . $year . '-';

        // Get the next ID for the closing code
        $lastId = Closing::max('id');
        $nextId = $lastId ? ($lastId + 1) : 1;
        $closing_code = sprintf('%04d', $nextId);


        \Log::info('Closing Code:', [
            'lastId' => $lastId,
            'nextId' => $nextId,
            'closing_code' => $closing_code
        ]);


        $closing = Closing::create([
            'date' => date('Y-m-d'),
            'invoice_count' => $request->invoice_count,
            'total_sale' => $request->total_sale,
            'total_expense' => $request->total_expense,
            'closing_amount' => $request->closing_amount,
            'opening_balance' => $request->opening,
            'purchase_count'=>$request->total_purchase_bills,
            'total_purchase'=>$request->total_purchase,
            'prefix' => $prefix,
            'closing_code' => $closing_code,
            'store_id' => $request->store_id
        ]);

        return redirect()->route('closing.bill', ['id' => $closing->id, 'store_id' => $request->store_id]);
    }


    public function closingBill($id, $store_Id)
    {
        if (request()->ajax()) {
            $closing = Closing::findOrFail($id);
            $store = Store::findOrFail($store_Id);
            return response()->json([
                'data' => $closing,
                'store' => $store,
            ]);
        }

        $logo = Coresetting::all();
        return view('admin.closing.closing_bill', [
            'logo' => $logo
        ]);
    }
}
