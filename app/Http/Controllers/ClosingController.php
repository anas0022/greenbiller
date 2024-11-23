<?php

namespace App\Http\Controllers;

use App\Models\Closing;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\salespayment;
use Illuminate\Http\Request;

class ClosingController extends Controller
{
    
    public function closing_list(){
        $closing = Closing::all();
        $logo = Coresetting::all();
        return view('admin.closing.closinglist',[
            'closing' => $closing,
            'logo' => $logo
        ]);
    }
    
    public function daily_closing(){
        $today_date = date('Y-m-d');
        $sale_payment = salespayment::where('payment_date',$today_date)
        ->where('payment_type','cash')
        ->get()->sum('payment');
        $sale = Sale::where('sales_date',$today_date)->get();
        $sale_amount =salespayment::where('payment_date',$today_date)
        ->where('payment_type','cash')
        ->get();
        $opening_balance = Closing::where('date',$today_date)->first();
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
         'opening_balance' => $opening_balance,
         'total_invoice' => $total_invoice,
         'total_invoice_count' => $total_invoice_count,
         'total_expense' => $total_expense,
         'expense_amount' => $expense_amount,
         
         'sale' => $sale,
         'sale_amount' => $sale_amount,
         'expense' => $expense
        ]);
    }

    public function daily_closing_post(Request $request){
        $closing = Closing::create([
            'date' => date('Y-m-d'),
            'invoice_count' => $request->invoice_count,
            'total_sale' => $request->total_sale,
            'total_expense' => $request->total_expense,
            'closing_amount' => $request->closing_amount,
            'opening_balance' => $request->opening
        ]);

        // Redirect to the closing bill view with the closing ID
        return redirect()->route('closing.bill', ['id' => $closing->id]);
    }

  
    public function closingBill($id)
    {
        $closing = Closing::findOrFail($id);
        $logo = Coresetting::all();
        
        return view('admin.closing.closing_bill', [
            'closing' => $closing,
            'logo' => $logo
        ]);
    }
}
