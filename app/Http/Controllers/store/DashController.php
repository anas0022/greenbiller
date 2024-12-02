<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Advance;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\salespayment;
use App\Models\Supplier;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function dashboard(){
        $logo = Coresetting::all();
        return view('store.home.dashboard',compact('logo'));
    }



    public function report(Request $request) {
        $today = today();

            $salpay = salespayment::whereDate('created_at', $today)
            ->where('store_id',Auth::user()->store_id)
            ->sum('payment');
  

        return response()->json($salpay);
    }
    public function reportall(Request $request) {
        $reportall = salespayment::
        where('store_id',Auth::user()->store_id)
        ->sum('payment');
        return response()->json($reportall);
    }
    public function expenseall(Request $request) {
        $expenseall = Expense::where('store_id',Auth::user()->store_id)->sum('amount');
        return response()->json($expenseall);
    }
    public function expencesum(Request $request) {
        //$expense = Expense::sum('amount');
        $today = today();
        $expense = Expense::whereDate('created_at', $today)
        ->where('store_id',Auth::user()->store_id)
        ->sum('amount');
        return response()->json($expense);
    }
    public function expenceweeksum(Request $request) {
    
        $expenseweeksum =Expense::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->where('store_id',Auth::user()->store_id)
        ->sum('amount');
        return response()->json($expenseweeksum);
    }
 
    public function customercountall(Request $request) {
        $customerCount = Customer::where('store_id',Auth::user()->store_id)->count();
    
        return response()->json($customerCount);
    }
    public function customercount(Request $request) {
        $today = today();
        $customerCount = Customer::whereDate('created_at', $today)
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($customerCount);
    }
    public function suppliercountall(Request $request) {
        $suppliercount = Supplier::where('store_id',Auth::user()->store_id)->count();
    
        return response()->json($suppliercount);
    }
    public function suppliercount(Request $request) {
        $today = today();
        $salecount = Supplier::whereDate('created_at', $today)
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($salecount);
    }
    public function salecountall(Request $request) {
        $salecount = Sale::where('store_id',Auth::user()->store_id)->count();
    
        return response()->json($salecount);
    }
  
    public function salecount(Request $request) {
        $today = today();
        $salecount = Sale::whereDate('created_at', $today)
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($salecount);
    }
    public function purchasecountall(Request $request) {
        $purchasecount = Purchase::where('store_id',Auth::user()->store_id)->count();
    
        return response()->json($purchasecount);
    }
    public function purchasecount(Request $request) {
        $today = today();
        $purchasecountall = Purchase::whereDate('created_at', $today)
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($purchasecountall);
    }
    public function purchaseweekcount(Request $request) {
        
        $purchaseweekcount =Purchase::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($purchaseweekcount);
    }
    
    public function saleweekcount(Request $request) {
        
        $purchaseweekcount =Sale::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($purchaseweekcount);
    }
    public function customerweekcount(Request $request) {
        
        $customerweekcount =Customer::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        
        ->where('store_id',Auth::user()->store_id)->count();
    
        return response()->json($customerweekcount);
    }
    public function supplierweekcount(Request $request) {
        
        $supplierweekcount =Supplier::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->where('store_id',Auth::user()->store_id)
        ->count();
    
        return response()->json($supplierweekcount);
    }
    public function saleweeksum(Request $request) {
        
        $saleweeksum =salespayment::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->where('store_id',Auth::user()->store_id)
        ->sum('payment');
    
        return response()->json($saleweeksum);
    }
    public function monthlyReport(Request $request)

    {

        $monthlyData = [

            'sales' => [],

            'expenses' => [],

            'advances' => [],

        ];


        // Fetch monthly sales data

        for ($i = 1; $i <= 12; $i++) {

            $monthlyData['sales'][] = SalesPayment::whereMonth('created_at', $i)
            ->where('store_id',Auth::user()->store_id)
            ->sum('payment');

            $monthlyData['expenses'][] = Expense::whereMonth('created_at', $i)
            ->where('store_id',Auth::user()->store_id)
            ->sum('amount');

            $monthlyData['purchase'][] = Purchasepay::whereMonth('created_at', $i)
            ->where('store_id',Auth::user()->store_id)
            ->sum('payment');

        }


        return response()->json($monthlyData);



    }

    public function expenseMonthlySum(Request $request) {
        $expenseMonthlySum = Expense::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->sum('amount');
        return response()->json($expenseMonthlySum);
    }
    public function saleMonthlySum(Request $request) {
        $saleMonthlySum = salespayment::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->sum('payment');
        return response()->json($saleMonthlySum);
    }
    public function customerMonthlycount(Request $request) {
        $customerMonthlycount = Customer::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($customerMonthlycount);
    }
    
    public function supplierMonthlycount(Request $request) {
        $supplierMonthlycount = Supplier::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($supplierMonthlycount);
    }
    public function purchaseMonthlycount(Request $request) {
        $purchaseMonthlycount = Purchase::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($purchaseMonthlycount);
    }
    public function saleMonthlycount(Request $request) {
        $saleMonthlycount = Sale::whereMonth('created_at', now()->month)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($saleMonthlycount);
    }
    public function expenseYearlySum(Request $request) {
        $expenseYearlySum = Expense::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->sum('amount');
        return response()->json($expenseYearlySum);
    }

    public function saleYearlySum(Request $request) {
        $saleYearlySum = salespayment::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->sum('payment');
        return response()->json($saleYearlySum);
    }

    public function saleYearlycount(Request $request) {
        $saleYearlycount = Sale::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($saleYearlycount);
    }
   
    public function purchaseYearlycount(Request $request) {
        $purchaseYearlycount = Purchase::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($purchaseYearlycount);
    }
    public function customerYearlycount(Request $request) {
        $customerYearlycount = Customer::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($customerYearlycount);
    }
    public function suplierYearlycount(Request $request) {
        $supplierYearlycount = Supplier::whereYear('created_at', now()->year)
        ->where('store_id',Auth::user()->store_id)
        ->count();
        return response()->json($supplierYearlycount);
    }
    public function recentitem() {
        $items = Item::latest()->take(5)
        ->where('store_id',Auth::user()->store_id)
        ->get(); 
        return response()->json($items); 
    }
    public function stocklessitem() {
        $items = Item::latest()->take(5)
        ->where('store_id',Auth::user()->store_id)
        ->get(); 
        return response()->json($items); 
    }
    public function salelatest() {

        $sale = Sale::latest()->take(10)
        ->where('store_id',Auth::user()->store_id)
        ->get(); 
        
   
        $user_ids = $sale->pluck('created_by')->unique();
        $customer_ids = $sale->pluck('customer_id')->unique();
    
        $users = User::whereIn('id', $user_ids)
        ->where('store_id',Auth::user()->store_id)
        ->get()->keyBy('id');
        $customer = Customer::whereIn('id', $customer_ids)
        ->where('store_id',Auth::user()->store_id)
        ->get();
    
        $saleWithUser = $sale->map(function($saleItem) use ($users, $customer_ids) {
            $saleItem->name = $users->get($saleItem->created_by)->name ?? 'N/A';
            return $saleItem;
        });
        
        // Return the sales with user names
        return response()->json($saleWithUser);
    }
    
   public function stockalertitem() {
    $items = Item::where('opening_stock', '<', 'alert_quantity')
    ->where('store_id', Auth::user()->store_id)
    ->get(); // Change '>' to '<'
    return response()->json($items); 
}
public function trendingsale() {
    try {
        $trending_sale = Saleitems::select('item_id')->where('store_id',Auth::user()->store_id);
          

        $items = Item::whereIn('id', $trending_sale)
            ->select('id', 'item_name')
            ->where('store_id',Auth::user()->store_id)
            ->get();

        

        return response()->json($trending_sale); // Return the structured data
    } catch (\Exception $e) {
        \Log::error('Error in trendingsale: ' . $e->getMessage()); // Log the error message
        return response()->json(['error' => 'Error fetching data'], 500); // Return a 500 error response
    }
}



}
