<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\salespayment;
use App\Models\Store;
use Illuminate\Http\Request;

class MakepaymentController extends Controller
{
    public function makepayment(Request $request){

        $request->validate( [
            'paid_amount'=>'required',
            'paymenttypes'=>'required',
            'account_id'=>'required',
            'payment_note_1'=>'required'
        ]);

        $sale =Sale::where('id',$request->input('id'))->first();
        $storeIds = Store::where('id',$sale->store_id)->first();
       
        $sales_payment_init = $storeIds->pluck('sales_payment_init')->first();
       
        $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);
     
        $sale->paid_amount =  $request->input('paid_amount');
        $sale->update();
    $salespayment = new salespayment();
    
        $salespayment->payment = $request->input('paid_amount');

        $salespayment->count_id = $sale->count_id;

        $salespayment->payment_type = $request->input('paymenttypes');

        $salespayment->account_id = $request->input('account_id');

        $salespayment->payment_note = $request->input('payment_note_1');

        $salespayment->payment_code = $payment_code;

        $salespayment->store_id = $sale->store_id;
      

        $salespayment->sales_id = $sale->id;

        $salespayment->payment_date =$sale->sales_date;

        $salespayment->customer_id = $sale->customer_id;

        $salespayment->status = 'Received';

        $salespayment->created_by = Auth()->id();

        if($salespayment->save()){
            return redirect()->route('payment.view' , ['id'=>$salespayment->id]);
        }

        }
   
        public function makepayment_purchase(Request $request){
            
        $request->validate( [
            'paid_amount'=>'required',
            'paymenttypes'=>'required',
            'account_id'=>'required',
            'payment_note_1'=>'required'
        ]);

        $purchase =Purchase::where('id',$request->input('id'))->first();
        $storeIds = Store::where('id',$purchase->store_id)->first();
       
        $sales_payment_init = $storeIds->pluck('sales_payment_init')->first();
       
        $payment_code = $sales_payment_init . '/' . sprintf("%04d", $purchase->id + 1);
     
        $purchase->paid_amount =  $request->input('paid_amount');
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

        $salespayment->payment_date =$purchase->sales_date;

        $salespayment->supplier_id = $purchase->supplier_id;

        $salespayment->status = 'Received';

        $salespayment->created_by = Auth()->id();

        if($salespayment->save()){
            return redirect()->route('payment.view_purchase',['id'=> $salespayment->id]);
        }

        }
    }       

