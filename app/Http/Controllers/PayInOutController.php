<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SalesPayment;
use App\Models\Coresetting;
use App\Models\Countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Ledger;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Purchasepay;
use Illuminate\Http\Request;

class PayInOutController extends Controller
{
    public function payin(Request $request){
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

        $country = Countrysettings::all();
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
       
    
  
    

        return view('admin.pay.payin',compact('prefix','ware','sale','saleCode','store','unit','customers','logo','category','country','brands','tax','items','storeId','customer','account','stores'));

    } 

    public function getbill(Request $request)
    {
        $customer = $request->customer_id;
        
        // Get all bills that are either unpaid or partially paid
        $salepay = Sale::where('customer_id', $customer)
            ->where(function($query) {
                $query
                      ->whereNull('payment_status')
                      ->orWhere('payment_status', 'Partial');
            })
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json([
            'success' => true,
            'sales' => $salepay
        ]);
    }


    public function payinpost(Request $request)
    {
        try {
            $saleIds = $request->input('id_sale');
            $payments = $request->input('totalLinkAmount');
            $customer_id = $request->input('customer_id');
            $store_id = $request->input('store_id');
            $date = date('Y-m-d');
            $payment_type = $request->input('type');
            $account_id = $request->input('account_id');

            // Validate required fields
            if (!$payment_type || !$account_id) {
                return back()->withErrors(['error' => 'Please select payment type and account'])->withInput();
            }

            if (!is_array($saleIds) || !is_array($payments) || empty($saleIds) || count($saleIds) !== count($payments)) {
                return back()->withErrors(['error' => 'Invalid payment data'])->withInput();
            }

            // Start transaction
            \DB::beginTransaction();
            try {
                foreach ($saleIds as $key => $saleId) {
                    // Find sale and update
                    $sale = Sale::findOrFail($saleId);
                    if (!$sale) {
                        \DB::rollBack();
                        return back()->withErrors(['error' => 'Sale not found'])->withInput();
                    }

                   $sale_staus = $sale->payment_status;
                 $grand = $sale->grand_total;
                 $paid = $sale->paid_amount;
                 if($paid >= $grand){
                    $sale->payment_status = 'Paid';
                    $sale->save();
                 }
                    $currentPaidAmount = $sale->paid_amount ?? 0;
                    $newPayment = floatval($payments[$key]);
                    $newPaidAmount = $currentPaidAmount + $newPayment;
                    
                    // Update sale record
                    $sale->paid_amount = round($newPaidAmount, 2);
                    $sale->payment_status = ($newPaidAmount >= $sale->grand_total) ? 'Paid' : 'Partial';
                    $sale->save();

                    // Check and update or create ledger entry
                    $existingLedger = Ledger::where('sale_id', $saleId)
                        ->where('type', $payment_type)
                        ->where('date', $date)
                        ->first();

                    if ($existingLedger) {
                        $existingLedger->credit = $newPayment;
                        $existingLedger->customer_id = $customer_id;
                        $existingLedger->store_id = $store_id;
                        $existingLedger->type = $payment_type;
                        $existingLedger->save();
                    } else {
                        $ledger = new Ledger();
                        $ledger->customer_id = $customer_id;
                        $ledger->store_id = $store_id;
                        $ledger->sale_id = $saleId;
                        $ledger->credit = $newPayment;
                        $ledger->date = $date;
                        $ledger->type = $payment_type;
                        $ledger->save();
                    }

                    // Get store details for payment code
                    $store = Store::findOrFail($store_id);
                    $sales_payment_init = $store->sales_payment_init;
                    $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);

                    // Check and update or create sales payment entry
                    $existingPayment = SalesPayment::where('sales_id', $saleId)
                        ->where('payment_type', $payment_type)
                        ->where('payment_date', $date)
                        ->first();

                    if ($existingPayment) {
                        $existingPayment->payment = $newPayment;
                        $existingPayment->customer_id = $customer_id;
                        $existingPayment->count_id = $sale->count_id;
                        $existingPayment->store_id = $store_id;
                        $existingPayment->payment_type = $payment_type;
                        $existingPayment->payment_date = $date;
                        $existingPayment->status = 'Received';
                        $existingPayment->created_by = auth()->user()->id;
                        $existingPayment->account_id = $account_id;
                        $existingPayment->save();
                    } else {
                        $payment = new SalesPayment();
                        $payment->customer_id = $customer_id;
                        $payment->count_id = $sale->count_id;
                        $payment->store_id = $store_id;
                        $payment->sales_id = $saleId;
                        $payment->payment = $newPayment;
                        $payment->payment_type = $payment_type;
                        $payment->payment_date = $date;
                        $payment->status = 'Received';
                        $payment->created_by = auth()->user()->id;
                        $payment->payment_code = 'PAY-' . $payment_code;
                        $payment->account_id = $account_id;
                        $payment->save();
                    }
                }

                // Calculate total of all payments
                $totalPaid = array_sum(array_map('floatval', $payments));
                
                // Get bill details for all processed sales
                $billDetails = [];
                foreach ($saleIds as $saleId) {
                    $sale = Sale::find($saleId);
                    if ($sale) {
                        $billDetails[] = [
                            'bill_no' => $sale->prefix . $sale->sales_code,
                            'amount' => $payments[array_search($saleId, $saleIds)]
                        ];
                    }
                }
               

                $payment = new SalesPayment();
                $payment->customer_id = $request->customer_id;
                $payment->payment_code = 'QA' . date('Y') . '-' . str_pad($payment_code, 6, '0', STR_PAD_LEFT);
                $payment->payment_date = date('Y-m-d');
                $payment->payment_mode = $request->payment_mode;
                $payment->amount = $totalPaid;
                $payment->save();

                \DB::commit();

                return redirect()->route('pay.bill', [
                    'billDetails' => $billDetails,
                    'totalPaid' => $totalPaid,
                    'customer_id' => $request->customer_id
                ]);
            } catch (\Exception $e) {
                \DB::rollBack();
                return back()
                    ->withErrors(['error' => 'Error processing payment: ' . $e->getMessage()])
                    ->withInput();
            }
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'System error: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function paybill(Request $request)
    {
        $logo = Coresetting::all();
        try {
            $billDetails = $request->billDetails ?? [];
            $totalPaid = $request->totalPaid ?? 0;
            $customer_id = $request->customer_id;

            if (empty($billDetails)) {
                return redirect()->route('pay.in')->with('error', 'No bill details found');
            }

            $store = Store::first();
            if (!$store) {
                return redirect()->route('pay.in')->with('error', 'Store information not found');
            }

            $customer = Customer::find($customer_id);
            if (!$customer) {
                return redirect()->route('pay.in')->with('error', 'Customer information not found');
            }

            // Find the payment record
            $payment = SalesPayment::where('customer_id', $customer_id)
                                 ->orderBy('id', 'desc')
                                 ->first();

            if (!$payment) {
                return redirect()->route('pay.in')->with('error', 'Payment record not found');
            }
            
            $ledger = new \stdClass();
            $ledger->invoice_purchase_no = $billDetails[0]['bill_no'] ?? '';
            $ledger->date = now()->format('Y-m-d');
            $ledger->payment_code = $payment->payment_code;
            
            return view('admin.pay.bill_details', compact('billDetails', 'totalPaid', 'store', 'customer', 'ledger', 'logo'));
        } catch (\Exception $e) {
            \Log::error('Error in paybill: ' . $e->getMessage());
            return redirect()->route('pay.in')->with('error', 'An error occurred while processing the payment receipt');
        }
    }

    /* payin completed */


    public function payout(Request $request){
        $ware = Warehouse::all();
        $purchase = Purchase::latest('id')->first();
      
      
        $purchaseCode = $purchase
            ? str_pad($purchase->count_id + 1, 4, '0', STR_PAD_LEFT)
            : '0001';


        $store = Store::all();
        $storeId = $request->input('store_id');
        $supplier = $request->input('supplier_id');
        $unit = Unit::all();
        $suppliers = [];
        $prefix = [];
        if ($storeId) {
            $suppliers = Supplier::where('store_id', $storeId)->get();
        }
        if ($supplier) {
            $prefix = Purchase::where('supplier_id', $supplier)->where('prefix')->get();
        }



        $category = Category::all();

        $country = Countrysettings::all();
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
       
    
  
    

        return view('admin.pay.payout',compact('prefix','ware','purchase','purchaseCode','store','unit','suppliers','logo','category','country','brands','tax','items','storeId','supplier','account','stores'));

    } 
 public function getSuppliersByStore(Request $request)
    {
        $storeId = $request->store_id;
        $suppliers = Supplier::where('store_id', $storeId)
            ->select('id', 'name')
            ->get();
        return response()->json($suppliers);
    }
    public function getbillpurchase(Request $request)
    {
        $supplier = $request->supplier_id;
        
        // Get all bills that are either unpaid or partially paid
        $purchasepay = Purchase::where('supplier_id', $supplier)
            ->where(function($query) {
                $query
                      ->whereNull('payment_status')
                      ->orWhere('payment_status', 'Partial');
            })
            ->orderBy('created_at', 'desc')
            ->get();
    
        return response()->json([
            'success' => true,
            'purchases' => $purchasepay
        ]);
    }
public function payoutpost(Request $request){
    try {
        $saleIds = $request->input('id_sale');
        $payments = $request->input('totalLinkAmount');
        $supplier_id = $request->input('supplier_id');
        $store_id = $request->input('store_id');
        $date = date('Y-m-d');
        $payment_type = $request->input('type');
        $account_id = $request->input('account_id');

       
        try {
            foreach ($saleIds as $key => $saleId) {
                // Find sale and update
                $sale = Purchase::findOrFail($saleId);
                if (!$sale) {
                    \DB::rollBack();
                    return back()->withErrors(['error' => 'Sale not found'])->withInput();
                }

               $sale_staus = $sale->payment_status;
             $grand = $sale->grand_total;
             
             $paid = $sale->paid_amount;
           
             if($paid >= $grand){
                $sale->payment_status = 'Paid';
                $sale->save();
             }
                $currentPaidAmount = $sale->paid_amount ?? 0;
                $newPayment = floatval($payments[$key]);
                $newPaidAmount = $currentPaidAmount + $newPayment;
                
                // Update sale record
                $sale->paid_amount = round($newPaidAmount, 2);
                $sale->payment_status = ($newPaidAmount >= $sale->grand_total) ? 'Paid' : 'Partial';
                $sale->save();

                $existingLedger = Ledger::where('purchase_id', $saleId)
                    ->where('type', $payment_type)
                    ->where('date', $date)
                    ->first();

                if ($existingLedger) {
                    $existingLedger->debit = $newPayment;
                    $existingLedger->supplyer_id = $supplier_id;
                    $existingLedger->store_id = $store_id;
                    $existingLedger->type = $payment_type;
                    
                    $existingLedger->save();
                } else {
                    $ledger = new Ledger();
                    $ledger->supplyer_id = $supplier_id;
                    $ledger->store_id = $store_id;
                    $ledger->purchase_id = $saleId;
                    $ledger->debit = $newPayment;
                    $ledger->date = $date;
                    $ledger->type = $payment_type;
                    $ledger->save();
                }

                // Get store details for payment code
                $store = Store::findOrFail($store_id);
                $sales_payment_init = $store->sales_payment_init;
                $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);

                // Check and update or create sales payment entry
                $existingPayment = Purchasepay::where('purchase_id', $saleId)
                    ->where('payment_type', $payment_type)
                    ->where('payment_date', $date)
                    ->first();

                if ($existingPayment) {
                    $existingPayment->payment = $newPayment;
                    $existingPayment->supplier_id = $supplier_id;
                    $existingPayment->count_id = $sale->count_id;
                    $existingPayment->store_id = $store_id;
                    $existingPayment->payment_type = $payment_type;
                    $existingPayment->payment_date = $date;
                    $existingPayment->status = 'Received';
                    $existingPayment->created_by = auth()->user()->id;
                    $existingPayment->account_id = $account_id;
                    $existingPayment->save();
                } else {
                    $payment = new Purchasepay();
                    $payment->supplier_id = $supplier_id;
                    $payment->count_id = $sale->count_id;
                    $payment->store_id = $store_id;
                    $payment->purchase_id = $saleId;
                    $payment->payment = $newPayment;
                    $payment->payment_type = $payment_type;
                    $payment->payment_date = $date;
                    $payment->status = 'Received';
                    $payment->created_by = auth()->user()->id;
                    $payment->payment_code = 'PAY-' . $payment_code;
                    $payment->account_id = $account_id;
                    $payment->save();
                }
            }

            // Calculate total of all payments
            $totalPaid = array_sum(array_map('floatval', $payments));
            
            // Get bill details for all processed sales
            $billDetails = [];
            foreach ($saleIds as $saleId) {
                $sale = Sale::find($saleId);
                if ($sale) {
                    $billDetails[] = [
                        'bill_no' => $sale->prefix . $sale->sales_code,
                        'payment' => $payments[array_search($saleId, $saleIds)]
                    ];
                }
            }
           

            $payment = new Purchasepay();
            $payment->supplier_id = $supplier_id;
            $payment->payment_code = 'QA' . date('Y') . '-' . str_pad($payment_code, 6, '0', STR_PAD_LEFT);
            $payment->payment_date = date('Y-m-d');
            //$payment->payment_mode = $request->payment_mode;
            $payment->payment = $totalPaid;
            $payment->purchase_id = $saleId;
            $payment->save();

            \DB::commit();

            return redirect()->route('pay.bill', [
                'billDetails' => $billDetails,
                'totalPaid' => $totalPaid,
                'supplier_id' => $request->supplier_id
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()
                ->withErrors(['error' => 'Error processing payment: ' . $e->getMessage()])
                ->withInput();
        }
    } catch (\Exception $e) {
        return back()
            ->withErrors(['error' => 'System error: ' . $e->getMessage()])
            ->withInput();
    }
}
public function paybillpurchase(Request $request)
{
    $logo = Coresetting::all();
    try {
        $billDetails = $request->billDetails ?? [];
        $totalPaid = $request->totalPaid ?? 0;
        $supplier_id = $request->supplier_id;

        if (empty($billDetails)) {
            return redirect()->route('pay.out')->with('error', 'No bill details found');
        }

        $store = Store::first();
        if (!$store) {
            return redirect()->route('pay.out')->with('error', 'Store information not found');
        }

        $supplier = Supplier::find($supplier_id);
        if (!$supplier) {
            return redirect()->route('pay.out')->with('error', 'Supplier information not found');
        }

        // Find the payment record
        $payment = PurchasePayment::where('supplier_id', $supplier_id)
                             ->orderBy('id', 'desc')
                             ->first();

        if (!$payment) {
            return redirect()->route('pay.out')->with('error', 'Payment record not found');
        }
        
        $ledger = new \stdClass();
        $ledger->invoice_purchase_no = $billDetails[0]['bill_no'] ?? '';
        $ledger->date = now()->format('Y-m-d');
        $ledger->payment_code = $payment->payment_code;
        
        return view('admin.pay.bill_details_purchase', compact('billDetails', 'totalPaid', 'store', 'supplier', 'ledger', 'logo'));
    } catch (\Exception $e) {
        \Log::error('Error in paybill: ' . $e->getMessage());
        return redirect()->route('pay.out')->with('error', 'An error occurred while processing the payment receipt');
    }
}}