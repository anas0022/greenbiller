<?php

namespace App\Http\Controllers\store\payment;

use App\Http\Controllers\Controller;
use App\Models\ledger;
use App\Models\Sale;
use App\Models\salespayment;
use App\Models\Store;
use Illuminate\Http\Request;

class SaleMakePaymentController extends Controller
{
    public function makepayment_store(Request $request)
    {

        $request->validate([
            'paid_amount' => 'required',
            'paymenttypes' => 'required',
            'account_id' => 'required',
            'payment_note_1' => 'required'
        ]);

        $sale = Sale::where('id', $request->input('id'))->first();
       
        $storeIds = Store::where('id', $sale->store_id)->first();
        $today_date = date('Y-m-d');

        $sales_payment_init = $storeIds->pluck('sales_payment_init')->first();

        $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);
        $salepay = $sale->paid_amount;
       
        $sale->paid_amount = $request->input('paid_amount')+$salepay;
        $sale->sales_date = $today_date;
        $sale->update();
        $salespayment = new salespayment();

        $salespayment->payment = $request->input('paid_amount');

        $salespayment->count_id = $sale->count_id;

        $salespayment->payment_type = $request->input('paymenttypes');

        $salespayment->account_id = $request->input('account_id');

        $salespayment->payment_note = $request->input('payment_note_1');

        $salespayment->payment_code = 'PAY-' . $payment_code;

        $salespayment->store_id = $sale->store_id;
        $salespayment -> payment_date = $today_date;

        $salespayment->sales_id = $sale->id;

        $salespayment->payment_date = $sale->sales_date;

        $salespayment->customer_id = $sale->customer_id;

        $salespayment->status = 'Received';

        $salespayment->created_by = Auth()->id();
        $sales_type = $sale->sales_type;
        if ($salespayment->save()) {
            $saleId = $sale->id;
         
            
            $existingLedger = ledger::where('sale_id', $saleId)->first();
     
            if ($existingLedger) {

                $existingLedger->customer_id = $sale->customer_id;
             
                $existingLedger->store_id = $sale->store_id;
                
                $existingLedger->credit = $existingLedger->credit + $request->input('paid_amount');
             
                $existingLedger->invoice_purchase_no = 'PAY/'.$sale->sales_code;
               
                $existingLedger->date = $today_date;
                
                $existingLedger->save();
                $amount = $request->input('paid_amount');
                return redirect()->route('reciept.view.store', ['id' => $existingLedger->id ,'amount'=> $amount])->with('success','');
            } else {
                $ledger = new ledger();
                $ledger->sale_id = $sale->id;
                $ledger->customer_id = $sale->customer_id;
                $ledger->store_id = $sale->store_id;
                $ledger->date = $today_date;
                $amount = $request->input('amount');
                $ledger->invoice_purchase_no = 'PAY/'.$sale->sales_code;
                $ledger->title = 'Cash';
                $amount = $request->input('paid_amount');
                $ledger->save();
                return redirect()->route('reciept.view.store', ['id' => $existingLedger->id ,'amount'=> $amount]);
            }

            
        }

    }
}
