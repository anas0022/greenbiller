<?php

namespace App\Http\Controllers;

use App\Models\Closing;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\salespayment;
use App\Models\Store;
use Auth;
use Illuminate\Http\Request;

class ClosingController extends Controller
{
    
    public function closing_list(){
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
            
            $sales = Sale::where('sales_date', $today_date)
                ->select('id', 'prefix', 'sales_code', 'sales_date')
                ->get();
            
            \Log::info('Sales Data:', $sales->toArray());
            
            return response()->json([
                'sale_payment' => salespayment::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->get()->sum('payment'),
                'sale' => $sales,
                'sale_amount' => salespayment::where('payment_date', $today_date)
                    ->where('payment_type', 'cash')
                    ->get(),
                'opening_balance' => Closing::where('date', $yesterday_date)->first(),
                'expense' => Expense::where('date', $today_date)->get(),
                'total_invoice_count' => Sale::where('sales_date', $today_date)->count(),
                'total_expense' => Expense::where('date', $today_date)->get()->sum('amount'),
                'expense_amount' => Expense::where('date', $today_date)->get()->sum('amount')
            ]);
        }

        $logo = Coresetting::all();
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        $initial_sales = Sale::where('sales_date', $today)
            ->select('id', 'prefix', 'sales_code', 'sales_date')
            ->get();

        return view('admin.closing.dailyclosing', [
            'logo' => $logo,
            'sale' => $initial_sales,
            'sale_amount' => [],
            'expense' => [],
            'opening_balance' => Closing::where('date', $yesterday)->first(),
            'total_invoice_count' => 0,
            'sale_payment' => 0,
            'expense_amount' => 0
        ]);
    }

    public function daily_closing_post(Request $request){
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
            $store = Store::where('id',$storeId)->first();
            return response()->json([
                'data' => $closing,
                'store'=>$store,
            ]);
        }

        $logo = Coresetting::all();
        return view('admin.closing.closing_bill', [
            'logo' => $logo
        ]);
    }
}
