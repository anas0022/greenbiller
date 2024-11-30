<?php

namespace App\Http\Controllers\store\sale;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ledger;
use App\Models\Offsaleitems;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\SaleReturn;
use App\Models\sales_return_items;
use App\Models\sales_return_payments;
use App\Models\salespayment;
use App\Models\Second_wareitems;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\UserList;
use App\Models\Warehouseitem;
Use Auth;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class SaleMassReController extends Controller
{
    


    public function salereturn_list_store()
    {
        $sales = SaleReturn::all();
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

            $userIds = $sales->pluck('created_by');
            $user = UserList::whereIn('id', $userIds)->first();
            $suppliers = Customer::whereIn('id', $supplierIds)->get();
            $account = Account::all();



        }


        $logo = Coresetting::all();
        $supplierIds = $sales->pluck('customer_id');

        $userIds = $sales->pluck('created_by');
        $user = UserList::whereIn('id', $userIds)->first();
        $suppliers = Customer::whereIn('id', $supplierIds)->get();
        $account = Account::all();
        return view('store.salereturn.salereturnitems', compact('sales', 'suppliers', 'user', 'logo', 'account'));

    }


    public function salereturn_store(Request $request)
    {
        $ware = Warehouse::all();
        $sale = Sale::latest('id')->first();
      
      
        $saleCode = $sale
            ? str_pad($sale->count_id + 1, 4, '0', STR_PAD_LEFT)
            : '0001';


        $store = Store::where('id',Auth::user()->store_id)->first();
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
        $category = category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $stores = Store::where('store_status', 'active')->get();

        $taxes = Tax::all();
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();
        return view('store.salereturn.salereturn', compact('prefix', 'customers', 'tax', 'saleCode', 'storeId', 'stores', 'ware', 'taxes', 'store', 'unit', 'account', 'brands', 'category', 'items', 'country'));


    }

    public function getCustomersByStore_store(Request $request)
    {
        $storeId = $request->store_id;
        $customers = Customer::where('store_id', $storeId)
            ->select('id', 'customer_name')
            ->get();
        return response()->json($customers);
    }

    public function getPrefixByCustomer_store(Request $request)
    {
        try {
            $customerId = $request->customer_id;
            $sales = Sale::where('customer_id', $customerId)
                ->select('id', 'prefix', 'sales_code', 'sales_type','paid_amount','grand_total')
                ->get();

            return response()->json([
                'success' => true,
                'sales' => $sales
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function getSaleItems_store(Request $request)
    {
        try {
            // Validate request
            $validated = $request->validate([
                'search' => 'required|string',
                'sales_ids' => 'required',
                'sales_types' => 'required'
            ]);

            $searchQuery = $request->input('search');
            $sale_id = $request->input('sales_ids');
            $sale_type = $request->input('sales_types');

            // Debug logging
            \Log::info('getSaleItems request:', [
                'search' => $searchQuery,
                'sale_id' => $sale_id,
                'sale_type' => $sale_type
            ]);

            // Query builder
            if($sale_type == '2') {
                $query = Offsaleitems::query();
            } else {
                $query = Saleitems::query();
            }

            $items = $query->where('sales_id', $sale_id)
                ->where(function($q) use ($searchQuery) {
                    $q->where('item_name', 'LIKE', "%{$searchQuery}%")
                      ->orWhere('part_no', 'LIKE', "%{$searchQuery}%");
                })
                ->get();

            // Log the query results
            \Log::info('Query results:', [
                'count' => $items->count(),
                'items' => $items->toArray()
            ]);

            if ($items->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No items found',
                    'data' => []
                ]);
            }

            $transformedItems = $items->map(function($item) {
                return [
                    'item_id' => $item->item_id,
                    'item_name' => $item->item_name,
                    'part_no' => $item->part_no ?? '',
                    'sales_qty' => $item->sales_qty ?? 0,
                    'unit_id' => $item->unit_id ?? 0,
                    'rate_inclusive_tax' => $item->rate_inclusive_tax ?? 0,
                    'price_per_unit' => $item->price_per_unit ?? 0,
                    'discount_amt' => $item->discount_amt ?? 0,
                    'tax_amt' => $item->tax_amt ?? 0,
                    'mrp' => $item->mrp ?? 0,
                    'total_cost' => $item->total_cost ?? 0
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $transformedItems
            ]);

        } catch (ValidationException $e) {
            \Log::error('Validation Error:', [
                'errors' => $e->errors()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Error in getSaleItems:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function return_sale_mass_store(Request $request)
    {

        $rules = [
            'sales_date' => 'required',
            'purchase_price' => 'required|array',
            'purchase_price.*' => 'required',
            'tax_type' => 'required',
            'tax_amt' => 'required|array',
            'tax_amt.*' => 'required',
            'rate_inc_tax' => 'required|array',
            'rate_inc_tax.*' => 'required',
            'subtotal' => 'required',
            'unit_id' => 'required|array',
            'unit_id.*' => 'required',
            'discount_amt' => 'required|array',
            'discount_amt.*' => 'required',
            'total_amount' => 'required|array',
            'total_amount.*' => 'required',
            'prefixs' => 'required|array',

        ];

        if (!empty($paid_amount)) {
            $rules['paymenttypes'] = 'required';
            $rules['payment_note_1'] = 'required';
        }

        $request->validate($rules, [
            'sales_date.required' => 'The sales date is required.',
            'purchase_price.required' => 'The purchase price is required.',
            'purchase_price.*.required' => 'Each purchase price is required.',
            'tax_type.required' => 'The tax type is required.',
            'tax_amt.required' => 'Tax amounts are required.',
            'tax_amt.*.required' => 'Each tax amount is required.',
            'rate_inc_tax.required' => 'Rate including tax is required.',
            'rate_inc_tax.*.required' => 'Each rate including tax is required.',
            'subtotal.required' => 'The subtotal is required.',
            'unit_id.required' => 'Unit IDs are required.',
            'unit_id.*.required' => 'Each unit ID is required.',
            'discount_amt.required' => 'Discount amounts are required.',
            'discount_amt.*.required' => 'Each discount amount is required.',
            'total_amount.required' => 'Total amounts are required.',
            'total_amount.*.required' => 'Each total amount is required.',
            'paymenttypes.required' => 'Payment type is required.',
            'payment_note_1.required' => 'Payment note is required.',
        ]);

        try {

            $sale_code = $request->input('sale_code');

            $prefix = $request->input('prefix');

            $sales_date = $request->input('sales_date');

            $tax_report = $request->input('tax_report');

            $due_date = $request->input('due_date');

            $store_id = $request->input('store_id');

            $customer_id = $request->input('customer_id');

            $created_on = $sales_date;


            $re_no = $request->input('re_no');

            $discount_to_all_input = $request->input('discount_to_all_input');

            $tot_discount_to_all_amt = $request->input('total_discount_amt');

            $note = $request->input('purchase_note');

            $subtotal_amt = $request->input('subtotal');

            $other_charges = $request->input('other_charge');

            $round_off = $request->input('round_off');

            $grand_total = $request->input('grand_total');

            $payment_amount = $request->input('paid_amount');

            $payment_type = $request->input('paymenttypes');
            $return_sale_code = $request->input('return_sale_code');
            $account = $request->input('account');

            $total_qty = $request->input('total_qty');

            $payment_note = $request->input('payment_note');

            $other_charges_tax_id = $request->input('othercharges_tax_id');

            $discount_to_all_type = $request->input('discount_to_all_type');

            $description = $request->input('purchase_note');

            $warehouse_id = $request->input('ware_id');

            $sales_qty = $request->input('sales_qty');
            $sale_id = $request->input('sale_id');
            $return_prefix = $request->input('return_prefix');
            $invoice_terms = $request->input('invoice_terms');
            $prefixs = $request->input('prefixs', []);

            $isNewPurchase = $request->input('is_new_sale', true);

            $customer = Customer::find($customer_id);

            $totalbilledamt = SaleReturn::where('customer_id', $customer_id)->sum('grand_total');

            $totalpayedamt = SaleReturn::where('customer_id', $customer_id)->sum('paid_amount');

            $sales_type = $request->input('sales_types');


            // Determine new or existing sale ID

            $maxSaleId = SaleReturn::max('count_id');

            $saleId = $isNewPurchase ? $maxSaleId + 1 : $request->input('existing_sale_id');

            

            $lastSaleEntry = SaleReturn::where('store_id', $store_id)

                ->where('sales_type', $sales_type)

                ->orderBy('id', 'desc')

                ->first();

            $newcount = $lastSaleEntry ? $lastSaleEntry->count_id + 1 : 1;
         
            
            if (!empty($prefixs)) {
                foreach ($prefixs as $prefix) {
                    if (is_null($prefix)) {

                        \Log::error('Prefix is null');
                
                        continue; // Skip to the next iteration if prefix is null
                
                    }
                    $sale = SaleReturn::create([
                       
                        'tot_discount_to_all_amt' => $tot_discount_to_all_amt,
                        'sale_prefix' => $prefix,
                        'sales_type' => $sales_type,

                        'total_qty' => $total_qty,

                        'prefix' => $return_prefix,
                        'return_sale_code' => $return_sale_code,
                        'sales_code' => $sale_code,

                        'tax_report' => $tax_report,

                        'discount_to_all_type' => $discount_to_all_type,

                        'discount_to_all_input' => $discount_to_all_input,

                        'created_by' => Auth()->id(),

                        'order_id' => $request->input('order_id'),

                        'warehouse_id' => $warehouse_id,

                        'other_charges_amt' => $other_charges,

                        'store_id' => $store_id,

                        'payment_type' => $payment_type,

                        'purchase_note' => $note,

                        'subtotal' => $subtotal_amt,

                        'reference_no' => $re_no,

                        'payment_note' => $payment_note,

                        'paid_amount' => $payment_amount,

                        'round_off' => $round_off,

                        'customer_id' => $customer_id,

                        'created_on' => $created_on,

                        'grand_total' => $grand_total,

                        'invoice_terms' => $invoice_terms,

                        'account' => $account,

                        'sales_note' => $description,

                        'sales_date' => $sales_date,

                        'count_id' => $newcount,

                        'due_date' => $due_date,
                        'sale_id' => $sale_id,


                        'other_charges_tax_id' => $other_charges_tax_id

                    ]);
                }
            }

            // Process and add each sale item

            $item_ids = $request->input('item_id');

            $purchase_qtys = $request->input('purchase_qty');

            $purchase_prices = $request->input('purchase_price');

            $tax_id = $request->input('tax_id');

            $tax_amount = $request->input('tax_amt');

            $discount_type = $request->input('discount_to_all_type');

            $discount_input = $request->input('discount_to_all_input');

            $total_amounts = $request->input('total_amount');

            $hsn_code = $request->input('hsn_code');

            $mrp = $request->input('mrp');

            $item_name = $request->input('item_name');

            $tax_type = $request->input('tax_type');

            $discount_amt = $request->input('discount_amt');

            $show_part = $request->input('show_part');

            $tax_inclusive = $request->input('rate_inc_tax');

            $part_no = $request->input('part_no');

            $unit_id = $request->input('unit_id');


            if (

                is_array($item_ids) && count($item_ids) > 0 &&

                count($item_ids) === count($sales_qty) &&

                count($item_ids) === count($purchase_prices) &&

                count($item_ids) === count($total_amounts) &&

                count($item_ids) === count($part_no) &&

                count($item_ids) === count($unit_id) &&

                count($item_ids) === count($tax_id) &&

                count($item_ids) === count($tax_amount) &&

                count($item_ids) === count($item_name) &&

                count($item_ids) === count($mrp) &&

                count($item_ids) === count($discount_amt) &&

                count($item_ids) === count($tax_inclusive) &&

                count($item_ids) === count($hsn_code)

            ) {

                for ($i = 0; $i < count($item_ids); $i++) {
                    


                  
                    $normalsale = sales_return_items::create([

                        'item_id' => $item_ids[$i],

                        'part_no' => $part_no[$i],

                        'sales_id' => $sale->id,

                        'show_part' => $show_part,

                        'mrp' => $mrp[$i],

                        'unit_id' => $unit_id[$i],

                        'rate_inclusive_tax' => $tax_inclusive[$i],

                        'item_name' => $item_name[$i],

                        'grand_total' => $grand_total,

                        'price_per_unit' => $purchase_prices[$i],

                        'discount_amt' => $discount_amt[$i],

                        'total_cost' => $total_amounts[$i],

                        'description' => $description,

                        'discount_input' => $discount_input,

                        'sales_qty' => $sales_qty[$i],

                        'store_id' => $store_id,

                        'tax_type' => $tax_type,

                        'customer_id' => $customer_id,

                        'created_on' => $created_on,

                        'hsn_code' => $hsn_code[$i],

                        'tax_id' => $tax_id[$i],

                        'tax_amt' => $tax_amount[$i],

                        'discount_type' => $discount_type,

                        'paid_amount' => $payment_amount
                    ]);






                    // Ledger and stock management updates

                    $ledger = new ledger();

                    $ledger->customer_id = $customer_id;
                    $ledger->store_id = $store_id;

                    $ledger->date = $sales_date;



                    $ledger->type = "Sales Return";



                    $ledger->invoice_purchase_no = $sale->prefix . '/' . $sale->sales_code;

                    $ledger->title = 'SALES';

                    $ledger->debit = $grand_total;

                    $ledger->save();


                    $storeIds = Store::where('id', $store_id);

                    $sales_payment_init = $storeIds->pluck('sales_payment_init');

                    $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);


                    $paid_amount = $request->input('paid_amount');

                    if ($paid_amount != "") {

                        $salespayment = new sales_return_payments();

                        $salespayment->payment = $request->input('paid_amount');

                        $salespayment->count_id = $sale->count_id;

                        $salespayment->payment_type = $request->input('paymenttypes');

                        $salespayment->account_id = $request->input('account_id');

                        $salespayment->payment_note = $request->input('payment_note_1');

                        $salespayment->payment_code = $payment_code;

                        $salespayment->store_id = $store_id;

                        $salespayment->sales_id = $sale->id;

                        $salespayment->payment_date = $sales_date;

                        $salespayment->customer_id = $customer_id;

                        $salespayment->status = 'Returned';

                        $salespayment->created_by = Auth()->id();

                        $salespayment->save();


                        $ledger = new Ledger();

                        $ledger->customer_id = $customer_id;

                        $ledger->date = $sales_date;

                        $ledger->type = "Receipt";

                        $ledger->invoice_purchase_no = $payment_code;

                        $ledger->title = 'Cash';

                        $ledger->credit = $paid_amount;

                        $ledger->save();

                    }


                    $warehouse = Warehouse::where('store_id', $request->input('store_id'))

                        ->where('type', 'System')

                        ->first();


                    $stockdetails = Warehouseitem::where('store_id', $request->input('store_id'))

                        ->where('warehouse_id', $warehouse->id)

                        ->where('item_id', $item_ids[$i])

                        ->first();
                    $secondware = Second_wareitems::where('store_id', $request->input('store_id'))

                        ->where('warehouse_id', $warehouse->id)

                        ->where('item_id', $item_ids[$i])

                        ->first();

                    if (!$sales_type == "2") {
                        if (!empty($stockdetails) && $stockdetails->count() > 0) {

                            $new_qty = ($stockdetails->available_qty + $sales_qty[$i]);


                            Warehouseitem::where('id', $stockdetails->id)->update([

                                'available_qty' => $new_qty,

                            ]);
                            Second_wareitems::where('id', $stockdetails->id)->update([

                                'available_qty' => $new_qty,

                            ]);


                            $itamdeatils = Item::where('id', $item_ids[$i])->first();

                            $new_qty = ($itamdeatils->opening_stock + $sales_qty[$i]);


                            Item::where('id', $item_ids[$i])->update([

                                'opening_stock' => $new_qty,

                            ]);

                        } else {

                            $itamdeatils = Item::where('id', $item_ids[$i])->first();

                            $new_qty = ($itamdeatils->opening_stock - $sales_qty[$i]);


                            Warehouseitem::create([

                                'store_id' => $request->input('store_id'),

                                'warehouse_id' => $warehouse->id,

                                'item_id' => $item_ids[$i],

                                'available_qty' => $new_qty,

                            ]);
                            Second_wareitems::create([

                                'store_id' => $request->input('store_id'),

                                'warehouse_id' => $warehouse->id,

                                'item_id' => $item_ids[$i],

                                'available_qty' => $new_qty,

                            ]);


                            if ($itamdeatils) {

                                $new_opening_stock = $itamdeatils->opening_stock - $sales_qty[$i];

                                $itamdeatils->update(['opening_stock' => $new_opening_stock]);

                            }
                        }
                    }

                }

            }

           



            if ($payment_amount < $grand_total) {

                $previous_due = $customer->previous_due;

                $new_due = (($grand_total - $payment_amount) - $previous_due);


                $customer->previous_due = $new_due;

                $customer->save();

            }


            DB::commit();






            $logo = Coresetting::all();


            $sales_itemdata = sales_return_items::where('sales_id', $sale->id)->get();
            $store = Store::where('id', $sale->store_id)->first();
            $customer = Customer::where('id', $sale->customer_id)->first();
            $tax = Tax::whereIn('id', $sales_itemdata->pluck('tax_id'))->get();
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $item_alqty = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get();
            $part_no = Item::whereIn('id', $sales_itemdata->pluck('part_no'))->first();
            $url = route('qrview', ['id' => $sale->id]); // Generate the URL for the specific route
            $qrCode = QrCode::size(100)->generate($url);
            $upiID = $store->upi_code;
            $payeeName = $store->store_name;
            $amount = $grand_total;
            $currency = 'INR';



            $upiUrl = "upi://pay?pa={$upiID}&pn={$payeeName}&am={$amount}&cu={$currency}";
            $pay = QrCode::size(100)->generate($upiUrl);

            $storeurl = route('store_itemsscan', ['id' => $sale->store_id]); // Generate the URL for the specific route
            $storeurlstore = QrCode::size(100)->generate($storeurl);

            return redirect()->route('invoice_sale.view.store', [
                'id' => $sale->id,
                'sale_id'=>$sale_id,
                'sale_type' => $sales_type
            ])->with([
                        'success' => 'Sale return processed successfully',
                        'sale' => $sale,
                        'logo' => $logo,
                        'tax' => $tax,
                        'unit_id' => $unit_id,
                        'sales_itemdata' => $sales_itemdata,
                        'store' => $store,
                        'customer' => $customer,
                        'qrCode' => $qrCode,
                        'pay' => $pay,
                        'storeurlstore' => $storeurlstore,
                        'item_alqty' => $item_alqty,
                        'part_no' => $part_no
                    ]);





        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the sale return: ' . $e->getMessage()]);
        }
    }
}
