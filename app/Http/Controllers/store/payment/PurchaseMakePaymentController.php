<?php

namespace App\Http\Controllers\store\payment;

use App\Http\Controllers\Controller;
use App\Models\ledger;
use App\Models\Purchase;
use App\Models\Purchasepay;
use App\Models\Store;
use Illuminate\Http\Request;

class PurchaseMakePaymentController extends Controller
{
    public function makepayment_purchase_store(Request $request)
    {

        $request->validate([
            'paid_amount' => 'required',
            'paymenttypes' => 'required',
            'account_id' => 'required',
            'payment_note_1' => 'required'
        ]);
        $today_date = date('Y-m-d');

        $purchase = Purchase::where('id', $request->input('id'))->first();
     
        $storeIds = Store::where('id', $purchase->store_id)->first();

        $sales_payment_init = $storeIds->pluck('sales_payment_init')->first();

        $payment_code = $sales_payment_init . '/' . sprintf("%04d", $purchase->id + 1);

       
        $purchasepay = $purchase->paid_amount;
      
        
        $purchase->paid_amount = $request->input('paid_amount')+$purchasepay;
        $purchase->purchase_date = $today_date;
        $purchase->update();
    
        $salespayment = new Purchasepay();

        $salespayment->payment = $request->input('paid_amount');

        $salespayment->count_id = $purchase->count_id;

        $salespayment->payment_type = $request->input('paymenttypes');

        $salespayment->account_id = $request->input('account_id');

        $salespayment->payment_note = $request->input('payment_note_1');

        $salespayment->payment_code = $payment_code;

        $salespayment->store_id = $purchase->store_id;


        $salespayment->purchase_id = $purchase->id;

        $salespayment->payment_date = $today_date;

        $salespayment->supplier_id = $purchase->supplier_id;

        $salespayment->status = 'Received';

        $salespayment->created_by = Auth()->id();

        if ($salespayment->save()) {
            $ledger = new ledger();
            $ledger->purchase_id = $purchase->id;
            $ledger->customer_id = $purchase->supplier_id;
            $ledger->store_id = $purchase->store_id;
            $ledger->date = $today_date;

            
            $ledger->invoice_purchase_no = $payment_code;
    
            $ledger->title = 'Cash';
            $ledger->credit = $request->input('paid_amount');
            $ledger->save();
            return redirect()->route('reciept.view.store', ['id' => $ledger->id]);
        }

    }
}
