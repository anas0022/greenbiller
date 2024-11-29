<?php

namespace App\Http\Controllers;

use App\Models\Closing;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Purchasepay;
use App\Models\Sale;
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
            $closing = Closing::all();
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
            $today_date = $request->input('date');
            $yesterday_date = date('Y-m-d', strtotime($today_date . ' -1 day'));
            $sales_payments = salespayment::where('payment_date', $today_date)
            ->pluck('sales_id'); 
            $purchase_payments = Purchasepay::where('payment_date', $today_date)
                ->pluck('purchase_id');

            $purchases = Purchase::whereIn('id', $purchase_payments)
                ->select('id', 'prefix', 'purchase_code', 'purchase_date')
                ->get();

            $sales = Sale::whereIn('id', $sales_payments)  
            ->select('id', 'prefix', 'sales_code', 'sales_date')
            ->get();

            \Log::info('Sales Data:', $sales->toArray());

            $total_expense = Expense::where('date', $today_date)->get()->sum('amount');


            if (empty($total_expense)) {
                $previous_closing = Closing::latest('id')->first();
                $total_expense = $previous_closing ? $previous_closing->opening_balance : 0;
            }

            $purchase_payment = Purchasepay::where('payment_date', $today_date)
                ->where('payment_type', 'cash')
                ->get();

            \Log::info('Purchase Payment Data:', [
                'date' => $today_date,
                'payments' => $purchase_payment->toArray(),
                'sum' => $purchase_payment->sum('payment')
            ]);

            $purchase_payment_ids = Purchasepay::where('payment_date', $today_date)
                ->where('payment_type', 'cash')
                ->pluck('purchase_id');

            $purchases = Purchase::whereIn('id', $purchase_payment_ids)
                ->select('id', 'prefix', 'purchase_code', 'purchase_date')
                ->get();

            \Log::info('Purchase Payment Data:', [
                'date' => $today_date,
                'payments' => $purchase_payment_ids->toArray(),
                'purchases' => $purchases->toArray()
            ]);

            return response()->json([
                'sale_payment' => salespayment::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->get()->sum('payment'),

                'sale' => $sales,
                'sale_amount' => salespayment::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->get(),
                'payment' => Purchasepay::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->select('payment')
                    ->get()
                    ->map(function($item) {
                        return [
                            'payment' => $item->payment
                        ];
                    }),
                'opening_balance' => Closing::latest('id')->first(),
                'expense' => Expense::where('date', $today_date)->get(),
                'total_invoice_count' => $sales->count(),
                'purchase_bill_count'=>$purchases->count(),
                'total_expense' => $total_expense,
                'expense_amount' => $total_expense
            ]);
        }

        $logo = Coresetting::all();
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        $initial_sales = Sale::where('sales_date', $today)
            ->select('id', 'prefix', 'sales_code', 'sales_date')
            ->get();

        $purchase_payments = Purchasepay::where('payment_date', $today)
            ->where('payment_type', 'cash')
            ->pluck('purchase_id');

        $purchases = Purchase::whereIn('id', $purchase_payments)
            ->select('id', 'prefix', 'purchase_code', 'purchase_date')
            ->get();

        $payment_total = Purchasepay::where('payment_date', $today)
            ->where('payment_type', 'cash')
            ->sum('payment');

        return view('admin.closing.dailyclosing', [
            'logo' => $logo,
            'sale' => $initial_sales,
            'sale_amount' => [],
            'expense' => [],
            'opening_balance' => Closing::latest('id')->first(),
            'total_invoice_count' => 0,
            'purchase_bill_count'=>0,
            'sale_payment' => 0,
            'expense_amount' => 0,
            'payment' => [],
            'payment_total' => $payment_total,
            'purchases' => $purchases,
            'purchase_count' => $purchases->count(),
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
            'closing_code' => $closing_code
        ]);

        return redirect()->route('closing.bill', ['id' => $closing->id]);
    }


    public function closingBill($id)
    {
        if (request()->ajax()) {
            $closing = Closing::findOrFail($id);
            $storeId = Auth::user()->store_id;
            $store = Store::where('id', $storeId)->first();
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
