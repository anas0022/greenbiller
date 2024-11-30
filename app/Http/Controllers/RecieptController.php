<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ledger;
use App\Models\Reciept;
use App\Models\Sale;
use App\Models\salespayment;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RecieptController extends Controller
{
   

 
    public function add_receipt(Request $request)
    {
        $ware = Warehouse::all();
        $sale = Sale::latest('id')->first();
      
      
        $saleCode = $sale
            ? str_pad($sale->count_id + 1, 4, '0', STR_PAD_LEFT)
            : '0001';


        $store = Store::all();
        $storeId = $request->input('store_id');
        $customer = $request->input('customer_id');
        $unit = Unit::all();
        $customers = [];
        $prefix = [];
        if ($storeId) {
            $customers = Customer::where('store_id', $storeId)->get();
        }
        if ($customer) {
            $prefix = Sale::where('customer_id', $sale->customer)->where('prefix')->get();
        }



        $category = Category::all();

        $country = countrysettings::all();
        $brands = Brand::where('status', 'active')->get();
        $category = Category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $stores = Store::where('store_status', 'active')->get();

        $taxes = Tax::all();
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();

        return view('admin.reciept.addreciept',compact('prefix','ware','sale','saleCode','store','unit','customers','logo','category','country','brands','tax','items','storeId','customer','account','stores'));
    }
    public function view_receipt_bill(Request $request , $id){
        $logo = Coresetting::all(); 
        $ledger = ledger::where('id',$id)->first();
            
        $store = Store::where('id',$ledger->store_id)->first();
        $customer =Customer::where('id',$ledger->customer_id)->first();
        $amount = $request->input('amount');
        return view('admin.reciept.view_receipt_bill',compact('logo','ledger','customer','store','amount'));
    }
    public function view_receipt($id)
    {
            $logo = Coresetting::all(); 
            $ledger = ledger::where('id',$id)->first();
            
            $store = Store::where('id',$ledger->store_id)->first();
            $customer =Customer::where('id',$ledger->customer_id)->first();
          
            return view('admin.reciept.view_receipt',compact('logo','ledger','customer','store'));
        } 

        public function add_recieptppost(Request $request){
            try {   
                DB::beginTransaction();
                
             
        
                $storeIds = Store::where('id', $request->input('store_id'))->first();
                $today_date = date('Y-m-d');
        
                $sales_payment_init = $storeIds->pluck('sales_payment_init')->first();
                $payment_code = $sales_payment_init . '/' . sprintf("%04d", time());
                $totalPaidAmount = array_sum($request->input('paid_amount'));

                foreach ($request->input('sale_id') as $index => $saleId) {
                    $sale = Sale::where('id', $saleId)->first();
                    if (!$sale) {
                        continue;
                    }

                    $sale->paid_amount += $request->input('paid_amount')[$index];
                    $sale->sales_date = $today_date;
                    $sale->update();

                    $salespayment = new salespayment();
                    $salespayment->payment = $request->input('paid_amount')[$index];
                    $salespayment->count_id = $sale->count_id;
                    $salespayment->payment_type = $request->input('paymenttypes');
                    $salespayment->account_id = $request->input('account_id');
                    $salespayment->payment_note = $request->input('payment_note_1');
                    $salespayment->payment_code = 'PAY-' . $payment_code;
                    $salespayment->store_id = $sale->store_id;
                    $salespayment->payment_date = $today_date;
                    $salespayment->sales_id = $sale->id;
                    $salespayment->customer_id = $sale->customer_id;
                    $salespayment->status = 'Received';
                    $salespayment->created_by = Auth()->id();
                    $salespayment->save();

                    $ledger = new ledger();
                    $ledger->sale_id = $sale->id;
                    $lastLedgerGroup = ledger::max('ledger_group');
                    $ledger->ledger_group = $lastLedgerGroup ? $lastLedgerGroup + 1 : 1;
                    $ledger->customer_id = $sale->customer_id;
                    $ledger->store_id = $sale->store_id;
                    $ledger->date = $today_date;
                    $ledger->invoice_purchase_no = 'PAY/' . $sale->sales_code;
                    $ledger->title = 'Cash';
                    $ledger->credit = $request->input('paid_amount')[$index];
                    $ledger->save();
                }

                DB::commit();
                return redirect()->route('reciept.view.bulk', ['id' => $sale->id]);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()]);
            }
        }}