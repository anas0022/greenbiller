<?php

namespace App\Http\Controllers\store\purchase;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Purchase;
use App\Models\Purchaseitems;
use App\Models\Purchasepay;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;

class PurchaseListController extends Controller
{
    public function purchase_list()
    {
        $logo = Coresetting::all();
        $purchase = Purchase::where('created_by',Auth::user()->id)->get();
    
        $purchaseIds = $purchase->pluck('id');
        $purchaseItems = Purchaseitems::whereIn('purchase_id', $purchaseIds)->get();
        $purchasePayments = Purchasepay::whereIn('purchase_id', $purchaseIds)->get();

        $payment_id = $purchasePayments->isNotEmpty() ? $purchasePayments->first()->id : 0;
        $account = Account::all();

        $supplierIds = $purchase->pluck('supplier_id');
        $suppliers = Supplier::whereIn('id', $supplierIds)->get();

        return view('store.purchase.purchase_list', compact('purchase', 'suppliers', 'logo', 'account', 'purchaseItems', 'payment_id'));
    }
}
