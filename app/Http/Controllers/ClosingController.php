<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\salespayment;
use Illuminate\Http\Request;

class ClosingController extends Controller
{
    public function daily_closing(){
        $today_date = date('Y-m-d');
        $sale_payment = salespayment::where('payment_date',$today_date)
        ->where('payment_type','cash')
        ->get()->sum('payment');
        $sale = Sale::where('sales_date',$today_date)->get();
        $sale_amount =salespayment::where('payment_date',$today_date)
        ->where('payment_type','cash')
        ->get();
        $expense = Expense::where('date',$today_date)->get();
        $invoice_count = Sale::where('sales_date',$today_date)->get();
        $total_invoice = $invoice_count->pluck('prefix');
        $total_invoice_count = $invoice_count->count();
        $total_expense = Expense::where('date',$today_date)->get()->sum('amount');
        $logo = Coresetting::all();
        $expense_amount = Expense::where('date',$today_date)->get()->sum('amount');
        return view('admin.closing.dailyclosing', [
            'sale_payment' => $sale_payment,
         'logo' => $logo,
         'total_invoice' => $total_invoice,
         'total_invoice_count' => $total_invoice_count,
         'total_expense' => $total_expense,
         'expense_amount' => $expense_amount,
         'sale' => $sale,
         'sale_amount' => $sale_amount,
         'expense' => $expense
        ]);
    }
}
