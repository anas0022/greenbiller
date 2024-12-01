<?php

namespace App\Http\Controllers;
use App\Models\Advance;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Purchase;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\salespayment;
use App\Models\Supplier;
use App\Models\template;
use Auth;
use Exception;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home() {
    $user = Auth::user();
    $logo = Coresetting::all();
    if (!$user) {
        return redirect()->route('login'); // Redirect to login if not authenticated
    }
    return view('admin.dashboard.home', compact('user','logo'));
}
    public function tem(){
        return view ('template');
    }
    public function tempost(Request $request){
        $template = new template();
        $template->template_name = $request->input('template_name');
        $template->template_html = $request->input('template_html');

        $template->save();
    }

  
    public function report(Request $request) {
        $salpay = salespayment::sum('payment');
    
        return response()->json($salpay);
    }
    public function expencesum(Request $request) {
        $expense = Expense::sum('amount');
    
        return response()->json($expense);
    }
    public function advancesum(Request $request) {
        $expense = Advance::sum('amount');
    
        return response()->json($expense);
    }
    public function customercount(Request $request) {
        $customerCount = Customer::count();
    
        return response()->json($customerCount);
    }
    public function suppliercount(Request $request) {
        $suppliercount = Supplier::count();
    
        return response()->json($suppliercount);
    }
    public function salecount(Request $request) {
        $salecount = Sale::count();
    
        return response()->json($salecount);
    }
    public function purchasecount(Request $request) {
        $purchasecount = Purchase::count();
    
        return response()->json($purchasecount);
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

            $monthlyData['sales'][] = SalesPayment::whereMonth('created_at', $i)->sum('payment');

            $monthlyData['expenses'][] = Expense::whereMonth('created_at', $i)->sum('amount');

            $monthlyData['purchase'][] = Purchasepay::whereMonth('created_at', $i)->sum('payment');

        }


        return response()->json($monthlyData);

    }
}