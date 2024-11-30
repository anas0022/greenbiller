<?php

namespace App\Http\Controllers\store\sale;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\ledger;
use App\Models\Sale;
use App\Models\SaleReturn;
use App\Models\salespayment;
use App\Models\UserList;
use Auth;
use Illuminate\Http\Request;

class SaleListController extends Controller
{
    public function saleslist_store()
    {

        $sales = Sale::where('store_id',Auth::user()->store_id)->get();
        $sale_return = SaleReturn::all();

        foreach ($sales as $sale) {
      
            $sales_pay = salespayment::where('sales_id', $sale->id)->first();


            if ($sales_pay) {
                $sale_pays = $sales_pay->id;
            } else {
                $sale_pays = 0;
            }

            $logo = Coresetting::all();
            $supplierIds = $sales->pluck('customer_id');
            $ledger = ledger::whereIn('sale_id', $sales->pluck('id'))->get();
          
            $userIds = $sales->pluck('created_by');
            $user = UserList::whereIn('id', $userIds)->first();
            $suppliers = Customer::whereIn('id', $supplierIds)->get();
            $account = Account::all();
            return view('store.sales.saleslist', compact('sales','ledger','sale_return', 'suppliers', 'user', 'logo', 'account', 'sale_pays'));


        }


        $logo = Coresetting::all();
        $supplierIds = $sales->pluck('customer_id');

        $userIds = $sales->pluck('created_by');
        $user = UserList::whereIn('id', $userIds)->first();
        $suppliers = Customer::whereIn('id', $supplierIds)->get();
        $account = Account::all();
        return view('admin.sales.saleslist', compact('sales', 'suppliers', 'user', 'logo', 'account'));

    }
}
