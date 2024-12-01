<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\SaleReturn;
use App\Models\sales_return_items;
use App\Models\sales_return_payments;
use App\Models\salespayment;
use App\Models\Second_wareitems;
use App\Models\UserList;
use App\Models\Warehouse;
use App\Models\Tax;
use App\Models\Supplier;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Unit;
use App\Models\Warehouseitem;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;
use Illuminate\Http\Request;
use App\Models\Ledger;

class SalesController extends Controller
{

    public function add_sales(Request $request)
    {
        $ware = Warehouse::all();
        $tax = Tax::all();
        $store = Store::all();
        $logo = Coresetting::all();
        $unit = Unit::all();
        $customers = Customer::all();
        $brand = Brand::all();
        $category = category::all();
        $store = Store::all();
        $ware = Warehouse::all();
        $country = countrysettings::all();
        $logo = Coresetting::all();

   
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();
        return view('admin.sales.addsales', compact('customers', 'ware', 'tax', 'store', 'unit', 'logo', 'customers', 'account', 'brand', 'category', 'items', 'country'));
    }



    public function getTaxDetails(Request $request)
    {
        $tax = Tax::find($request->tax_id);
        return response()->json([
            'tax_amount' => $tax->amount  // Assuming 'amount' is the column storing the tax value
        ]);
    }
    public function addsale(Request $request)
    {

        // Validate the request inputs

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

            // Collect main sale data

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

            $account = $request->input('account');

            $total_qty = $request->input('total_qty');

            $payment_note = $request->input('payment_note');

            $other_charges_tax_id = $request->input('othercharges_tax_id');

            $discount_to_all_type = $request->input('discount_to_all_type');

            $description = $request->input('purchase_note');

            $warehouse_id = $request->input('ware_id');

            $sales_qty = $request->input('sales_qty');

            $invoice_terms = $request->input('invoice_terms');

            $isNewPurchase = $request->input('is_new_sale', true);

            $customer = Customer::find($customer_id);


            // Calculate total billed and paid amounts

            $totalbilledamt = Sale::where('customer_id', $customer_id)->sum('grand_total');

            $totalpayedamt = Sale::where('customer_id', $customer_id)->sum('paid_amount');

            $sales_type = $request->input('sales_type');


            // Determine new or existing sale ID

            $maxSaleId = Sale::max('count_id');

            $saleId = $isNewPurchase ? $maxSaleId + 1 : $request->input('existing_sale_id');


            // Determine new count ID for the sale

            $lastSaleEntry = Sale::where('store_id', $store_id)

                ->where('sales_type', $sales_type)

                ->orderBy('id', 'desc')

                ->first();

            $newcount = $lastSaleEntry ? $lastSaleEntry->count_id + 1 : 1;


            // Create new Sale entry

            $sale = Sale::create([
                'tot_discount_to_all_amt'=>$tot_discount_to_all_amt,
                'sales_type' => $sales_type,

                'total_qty' => $total_qty,

                'prefix' => $prefix,

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

                'other_charges_tax_id' => $other_charges_tax_id

            ]);


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
                    if ($sales_type == "2") {
                        $offsale = Offsaleitems::create([

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


                    } else {
                        $normalsale = Saleitems::create([

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


                    }


                    // Ledger and stock management updates

                    $ledger = new Ledger();

                    $ledger->customer_id = $customer_id;
                    $ledger->store_id = $store_id;
                    
                    $ledger->date = $sales_date;


                    if ($sales_type == 0) {

                        $ledger->type = "Sales B2B";

                    } elseif ($sales_type == 1) {

                        $ledger->type = "Sales B2C";

                    } else {

                        $ledger->type = "Sales";

                    }

                    $ledger->invoice_purchase_no = $sale->prefix . '/' . $sale->sales_code;

                    $ledger->title = 'SALES';
                    $ledger->sale_id = $sale->id;
                    $ledger->debit = $grand_total;

                    $ledger->save();


                    $storeIds = Store::where('id', $store_id);

                    $sales_payment_init = $storeIds->pluck('sales_payment_init');

                    $payment_code = $sales_payment_init . '/' . sprintf("%04d", $sale->id + 1);


                    $paid_amount = $request->input('paid_amount');

                    if ($paid_amount != "") {

                        $salespayment = new salespayment();

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

                        $salespayment->status = 'Received';

                        $salespayment->created_by = Auth()->id();

                        $salespayment->save();


                        $ledger = new Ledger();

                        $ledger->customer_id = $customer_id;
                        $ledger->store_id = $store_id;
                        $ledger->date = $sales_date;
                        $ledger->sale_id = $sale->id;
                        $ledger->type = "Receipt";

                        $ledger->invoice_purchase_no = 'PAY/'.$sale->sales_code;

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

                    if(!$sales_type == "2"){
                    if (!empty($stockdetails) && $stockdetails->count() > 0) {

                        $new_qty = ($stockdetails->available_qty - $sales_qty[$i]);


                        Warehouseitem::where('id', $stockdetails->id)->update([

                            'available_qty' => $new_qty,

                        ]);
                        Second_wareitems::where('id', $stockdetails->id)->update([

                            'available_qty' => $new_qty,

                        ]);


                        $itamdeatils = Item::where('id', $item_ids[$i])->first();

                        $new_qty = ($itamdeatils->opening_stock - $sales_qty[$i]);


                        Item::where('id', $item_ids[$i])->update([

                            'opening_stock' => $new_qty,

                        ]);

                    } else {

                        $itamdeatils = Item::where('id', $item_ids[$i])->first();

                        $new_qty = ($itamdeatils->opening_stock + $sales_qty[$i]);


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

                            $new_opening_stock = $itamdeatils->opening_stock + $sales_qty[$i];

                            $itamdeatils->update(['opening_stock' => $new_opening_stock]);

                        }
                    }
                    }

                }

            }


            if ($payment_amount < $grand_total) {

                $previous_due = $customer->previous_due;

                $new_due = (($grand_total - $payment_amount) + $previous_due);


                $customer->previous_due = $new_due;

                $customer->save();

            }


            DB::commit();







            $logo = Coresetting::all();
            $sales_itemdata = Saleitems::where('sales_id', $sale->id)->get();
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

            return redirect()->route('invoice_sale.main', ['id' => $sale->id, 'sale_type' => $sales_type])

                ->with(compact('sale', 'logo', 'tax', 'unit_id', 'sales_itemdata', 'store', 'customer', 'qrCode', 'pay', 'storeurlstore', 'item_alqty', 'part_no'));




        } catch (Exception $e) {
            // Handle errors and redirect back with a flash message
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the sale: ' . $e->getMessage()]);
        }

    }








    public function getCustomers(Request $request)
    {
        $store_selectInput = $request->input('store_selectInput');


        if ($store_selectInput) {
            // Fetching customers based on store_id
            $items = Customer::where('store_id', 'LIKE', "%{$store_selectInput}%")->get();

            // Check if there are any items returned
            if ($items->isNotEmpty()) {
                return $items;
            } else {
                return response()->json(['message' => 'No customers found for the selected store'], 404);
            }


        }



    }


    public function saleslist()
    {

        $sales = Sale::all();
        $sale_return = SaleReturn::all();

        foreach ($sales as $sale) {
      
            $sales_pay = SalesPayment::where('sales_id', $sale->id)->first();


            if ($sales_pay) {
                $sale_pays = $sales_pay->id;
            } else {
                $sale_pays = 0;
            }

            $logo = Coresetting::all();
            $supplierIds = $sales->pluck('customer_id');
            $ledger = Ledger::whereIn('sale_id', $sales->pluck('id'))->get();
          
            $userIds = $sales->pluck('created_by');
            $user = UserList::whereIn('id', $userIds)->first();
            $suppliers = Customer::whereIn('id', $supplierIds)->get();
            $account = Account::all();
            return view('admin.sales.saleslist', compact('sales','ledger','sale_return', 'suppliers', 'user', 'logo', 'account', 'sale_pays'));


        }


        $logo = Coresetting::all();
        $supplierIds = $sales->pluck('customer_id');

        $userIds = $sales->pluck('created_by');
        $user = UserList::whereIn('id', $userIds)->first();
        $suppliers = Customer::whereIn('id', $supplierIds)->get();
        $account = Account::all();
        return view('admin.sales.saleslist', compact('sales', 'suppliers', 'user', 'logo', 'account'));

    }
    public function salescode(Request $request)
    {

        $store = Store::where('id', $request->input('store_id'))->first();
        $sales_type = $request->input('sales_type');
        if ($sales_type == 0) {
            $prifix = $store->sales_init;
        } else if ($sales_type == 1) {
            $prifix = $store->sales_b2c_init;
        } else {
            $prifix = "";
        }


        $lastsaleEntry = Sale::where('store_id', $request->input('store_id'))
            ->where('sales_type', $request->input('sales_type'))
            ->orderBy('id', 'desc')
            ->first();


        if ($lastsaleEntry) {
            $ccount = $lastsaleEntry->count_id;
            $newcount = ($ccount + 1);
        } else {
            $newcount = 1;
        }



        $newSalesCode = str_pad($newcount, 4, '0', STR_PAD_LEFT);
        $arr = array('prefix' => $prifix, 'newSalescode' => $newSalesCode);
        return json_encode($arr);
    }

    public function saleitem_edit(Request $request, $id)
    {
        $logo = Coresetting::all();
        $sale = Sale::find($id); // Use findOrFail to get the sale or throw a 404

        // Correctly query for sale items and off sale items
        $sales_itemdata = Saleitems::where('sales_id', $id)->where('status', '0')->get();
        $sales_itemdata_off = Offsaleitems::where('sales_id', $id)->where('status', '0')->get();

        // Initialize variables
        $items = collect();
        $unit_id = collect();
        $subtotal = $sale->subtotal;
        $qty = $sale->total_qty;
        $other_charge = $sale->other_charges_amt;
        $tot_discount_to_all_amt = $sale->tot_discount_to_all_amt;
        $grand_total = $sale->grand_total;

        // If there are sale items, process them
        if (!$sales_itemdata->isEmpty()) {
            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $items = Item::whereIn('id', $itemIds)->get();
        }
        // If there are off sale items, process them
        elseif ($sales_itemdata_off->isNotEmpty()) {
            $itemIds = $sales_itemdata_off->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata_off->pluck('unit_id'))->get();
            $items = Item::whereIn('id', $itemIds)->get();
        }

        // Common data retrieval

        $customerIds = $sale->customer_id;
        $customer_detail = Customer::where('id', $customerIds)->first();


        $taxIds = $sales_itemdata->isNotEmpty() ? $sales_itemdata->pluck('tax_id')->first() : $sales_itemdata_off->pluck('tax_id')->first();
        $tax = Tax::where('id', $taxIds)->first();
        $store = Store::where('id', $sale->store_id)->first();
        $customer = Customer::all();
        $cu_store = Store::all();
        $country = countrysettings::all();
        $unit = Unit::all();
        $account = Account::all();
        $taxes = Tax::all();

        return view('admin.salepos.salebilledit', compact(
            'cu_store',
            'sale',
            'qty',
            'other_charge',
            'sales_itemdata_off',
            'country',
            'unit_id',
            'store',
            'subtotal',
            'taxes',
            'sales_itemdata',
            'customer',
            'items',
            'logo',
            'tax',
            'account',
            'unit',
            'tot_discount_to_all_amt',
            'grand_total',
            'customer_detail',
            'customerIds'
        ));
    }
    public function alt_qtywdit(Request $request)
    {
        // Validate and process the request data


        // Update the item in the database, assuming you have a model called Item
        $item = Item::find($request->id);
        if ($item) {
            $item->alt_unit = $request->alt_unit;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }



    public function part_noedit(Request $request)
    {
        // Validate and process the request data


        // Update the item in the database, assuming you have a model called Item
        $item = Item::find($request->id);
        if ($item) {
            $item->part_no = $request->part_no;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }

    public function customer_mobile(Request $request)
    {
        $item = Customer::find($request->id);
        if ($item) {
            $item->mobile = $request->mobile;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }
    public function customer_email(Request $request)
    {
        $item = Customer::find($request->id);
        if ($item) {
            $item->email = $request->email;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }
    public function customer_address(Request $request)
    {
        $item = Customer::find($request->id);
        if ($item) {
            $item->address = $request->address;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }
    public function customer_gst(Request $request)
    {
        $item = Customer::find($request->id);
        if ($item) {
            $item->gst_number = $request->gst;
            $item->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }

    public function invoice_sale_view($id, $sale_type,$sale_id)
    {
        $logo = Coresetting::all();
        $sale = Sale::find($id);
      
           
       
             
                $sales_itemdata = sales_return_items::where('sales_id', $id)
                ->where('status','0')
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique();
                $prefix_get = SaleReturn::where('sale_id',$sale_id)->get();
                $prefix = $prefix_get->pluck('sale_prefix' );
            
           
            
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = sales_return_items::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status','0')
                        ->get();
                        
                       
                        $tax_amt = $sales_items->pluck('tax_amt')->sum();
                        $rate_inclusive_tax = $sales_items->pluck('rate_inclusive_tax')->sum();
                        $sale_qty = $sales_items ->pluck('sales_qty')->sum();
                        $price_per_unit = $sales_items->pluck('price_per_unit')->sum();
                      
                        $tax_ids = $sales_items->pluck('tax_id');
                
                      
                        $tax_records = Tax::whereIn('id', $tax_ids)->get();
                
                        $total_tax_percentage = 0;
                
                        // Calculate total tax percentage for the current HSN code
                        foreach ($tax_records as $tax) {
                            $count = $tax_ids->filter(function ($id) use ($tax) {
                                return $id == $tax->id;
                            })->count();
                
                            $total_tax_percentage += $tax->per * $count;
                        }
                
                        // Add the calculated data for the current HSN code to the response data
                        $response_data[] = [
                            'hsn_code' => $hsn_code,
                            'tax_amt' => $tax_amt,
                            'rate_inclusive_tax'=>$rate_inclusive_tax,
                            'total_tax_percentage' => $total_tax_percentage,
                            'sales_qty' => $sale_qty,
                        'price_per_unit'=>  $price_per_unit
                        ];
                    }
                }
                
              /*   else {
                    $tax_item = $sales_itemdata
                    ->where('hsn_code', $hsn_code) 
                    ->pluck('rate_inclusive_tax'); 
                    $total = $tax_item; 
                }
                 */
         
                if ($sales_itemdata->isEmpty()) {
                    return back()->with('error','No sale Item Found');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
       
                $sale = SaleReturn::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$sale) {
                    return back()->with('error','Every Item In This Sale Has Been Returned.');
                    
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
        
                $amount_pay = $sales_itemdata->first();
    
                if (!$amount_pay) {
                    return response()->json(['message' => 'No amount payment found.'], 404);
                }
    
                $amount = $amount_pay->grand_total;
                $store = Store::whereIn('id', $store_ids)->first();
    
                if (!$store) {
                    return response()->json(['message' => 'Store not found.'], 404);
                }
    
                $item_alqty = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get();
                $url = route('qrview', ['id' => $sale->id]);
                $qrCode = QrCode::size(100)->generate($url);
                $upiID = $store->upi_code;
                $payeeName = $store->store_name;
                $currency = 'INR';
                $upiUrl = "upi://pay?pa={$upiID}&pn={$payeeName}&am={$amount}&cu={$currency}";
                $pay = QrCode::size(100)->generate($upiUrl);
                $storeurl = route('store_itemsscan', ['id' => $store_view]);
                $storeurlstore = QrCode::size(100)->generate($storeurl);
    
                if ($sale) {
                    $userids = $sale->created_by;
                    $user = UserList::where('id', $userids)->first();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
                return view('admin.invoice.invoice-sale', compact('unit_id','prefix','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
            }
               
            
        
       
        
    
      
    

    public function invoice_sale_main(Request $request , $id , $sale_type){


        $logo = Coresetting::all();
        $sale = Sale::find($id);
     
            if ($sale_type == "2") {
                $sales_itemdata = Offsaleitems::where('sales_id', $id)
          
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')->unique();
            
       
                $response_data = []; 
                
                if ($hsn_codes) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Offsaleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                
                        ->get();
                        
                       
                        $tax_amt = $sales_items->pluck('tax_amt')->sum();
                        $rate_inclusive_tax = $sales_items->pluck('rate_inclusive_tax')->sum();
                        $tax_ids = $sales_items->pluck('tax_id');
                        $sale_qty = $sales_items ->pluck('sales_qty')->sum();
                        $price_per_unit = $sales_items->pluck('price_per_unit')->sum();
                      
                        $tax_records = Tax::whereIn('id', $tax_ids)->get();
                
                        $total_tax_percentage = 0;
                
                        // Calculate total tax percentage for the current HSN code
                        foreach ($tax_records as $tax) {
                            $count = $tax_ids->filter(function ($id) use ($tax) {
                                return $id == $tax->id;
                            })->count();
                
                            $total_tax_percentage += $tax->per * $count;
                        }
                
                        // Add the calculated data for the current HSN code to the response data
                        $response_data[] = [
                            'hsn_code' => $hsn_code,
                            'tax_amt' => $tax_amt,
                            'rate_inclusive_tax'=>$rate_inclusive_tax,
                            'total_tax_percentage' => $total_tax_percentage,
                            'sales_qty' => $sale_qty,
                        'price_per_unit'=>  $price_per_unit
                        ];
                    }
                }
                
                if ($sales_itemdata->isEmpty()) {
                    return back()->with('error', 'No Item Found In This Sale');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
                $taxids = $sales_itemdata->pluck('tax_id');
                
                $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$sale) {
                    return back()->with('error', 'No Item Found In This Sale');
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
                $tax = Tax::whereIn('id', $taxids)->get();
                $amount_pay = $sales_itemdata->first();
    
                if (!$amount_pay) {
                    return back()->with('error', 'No amount payment found.');
                    
                }
    
                $amount = $amount_pay->grand_total;
                $store = Store::whereIn('id', $store_ids)->first();
    
                if (!$store) {
                    

                    return response()->json(['message' => 'Store not found.'], 404);
                }
    
                $item_alqty = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get();
                $url = route('qrview', ['id' => $sale->id]);
                $qrCode = QrCode::size(100)->generate($url);
                $upiID = $store->upi_code;
                $payeeName = $store->store_name;
                $currency = 'INR';
                $upiUrl = "upi://pay?pa={$upiID}&am={$amount}&pn={$payeeName}&cu={$currency}";
                $pay = QrCode::size(100)->generate($upiUrl);
                $storeurl = route('store_itemsscan', ['id' => $store_view]);
                $storeurlstore = QrCode::size(100)->generate($storeurl);
    
                if ($sale) {
                    $userids = $sale->created_by;
                    $user = UserList::where('id', $userids)->first();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            } else {
                $sales_itemdata = Saleitems::where('sales_id', $id)
          
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique(); // Get unique HSN codes
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Saleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                 
                        ->get();
                        
                       
               
                        $tax_amt = $sales_items->pluck('tax_amt')->sum();
                        $rate_inclusive_tax = $sales_items->pluck('rate_inclusive_tax')->sum();
                        $tax_ids = $sales_items->pluck('tax_id');
                        $price_per_unit = $sales_items->pluck('price_per_unit')->sum();
                        $sale_qty = $sales_items ->pluck('sales_qty')->sum();
                        $tax_records = Tax::whereIn('id', $tax_ids)->get();
                
                        $total_tax_percentage = 0;
                
                        // Calculate total tax percentage for the current HSN code
                        foreach ($tax_records as $tax) {
                            $count = $tax_ids->filter(function ($id) use ($tax) {
                                return $id == $tax->id;
                            })->count();
                
                            $total_tax_percentage += $tax->per * $count;
                        }
                
                       
                        $response_data[] = [
                            'hsn_code' => $hsn_code,
                            'tax_amt' => $tax_amt ,
                            'rate_inclusive_tax'=>$rate_inclusive_tax,
                            'total_tax_percentage' => $total_tax_percentage,
                            'sales_qty'=>$sale_qty,
                            'price_per_unit'=>$price_per_unit
                        ];
                    }
                }
                
              /*   else {
                    $tax_item = $sales_itemdata
                    ->where('hsn_code', $hsn_code) 
                    ->pluck('rate_inclusive_tax'); 
                    $total = $tax_item; 
                }
                 */
         
                if ($sales_itemdata->isEmpty()) {
                    return back()->with('error','No sale Item Found');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
       
                $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$sale) {
                    return back()->with('error','Every Item In This Sale Has Been Returned.');
                    
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
        
                $amount_pay = $sales_itemdata->first();
    
                if (!$amount_pay) {
                    return response()->json(['message' => 'No amount payment found.'], 404);
                }
    
                $amount = $amount_pay->grand_total;
                $store = Store::whereIn('id', $store_ids)->first();
    
                if (!$store) {
                    return response()->json(['message' => 'Store not found.'], 404);
                }
    
                $item_alqty = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get();
                $url = route('qrview', ['id' => $sale->id]);
                $qrCode = QrCode::size(100)->generate($url);
                $upiID = $store->upi_code;
                $payeeName = $store->store_name;
                $currency = 'INR';
                $upiUrl = "upi://pay?pa={$upiID}&pn={$payeeName}&am={$amount}&cu={$currency}";
                $pay = QrCode::size(100)->generate($upiUrl);
                $storeurl = route('store_itemsscan', ['id' => $store_view]);
                $storeurlstore = QrCode::size(100)->generate($storeurl);
    
                if ($sale) {
                    $userids = $sale->created_by;
                    $user = UserList::where('id', $userids)->first();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            }
            return view('admin/invoice/invoice-sale-main', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
        
        }
    



    public function sale_edit(Request $request)
    {
        // ... validation rules remain the same ...

        try {
            // Find the existing sale
            $sale = Sale::find($request->input('Ids'));

            if (!$sale) {
                return redirect()->back()->withErrors(['error' => 'Sale not found']);
            }

            // Update the sale record
            $sale->update([
                'tot_discount_to_all_amt' => $request->input('total_discount_amt'),
                'sales_type' => $request->input('sales_type'),
                'total_qty' => $request->input('total_qty'),
                'prefix' => $request->input('prefix'),
                'sales_code' => $request->input('sale_code'),
                'tax_report' => $request->input('tax_report'),
                'discount_to_all_type' => $request->input('discount_to_all_type'),
                'discount_to_all_input' => $request->input('discount_to_all_input'),
                'warehouse_id' => $request->input('ware_id'),
                'other_charges_amt' => $request->input('other_charge'),
                'store_id' => $request->input('store_id'),
                'payment_type' => $request->input('paymenttypes'),
                'purchase_note' => $request->input('purchase_note'),
                'subtotal' => $request->input('subtotal'),
                'reference_no' => $request->input('re_no'),
                'payment_note' => $request->input('payment_note'),
                'paid_amount' => $request->input('paid_amount'),
                'round_off' => $request->input('round_off'),
                'customer_id' => $request->input('customer_id'),
                'created_on' => $request->input('sales_date'),
                'grand_total' => $request->input('grand_total'),
                'invoice_terms' => $request->input('invoice_terms'),
                'account' => $request->input('account'),
                'sales_note' => $request->input('purchase_note'),
                'sales_date' => $request->input('sales_date'),
                'due_date' => $request->input('due_date'),
                'other_charges_tax_id' => $request->input('othercharges_tax_id')
            ]);

            // Delete existing sale items
            if ($request->input('sales_type') == "2") {
                Offsaleitems::where('sales_id', $sale->id)->delete();
            } else {
                Saleitems::where('sales_id', $sale->id)->delete();
            }

            // Process and add updated sale items
            $item_ids = $request->input('item_id');
            // ... other array inputs remain the same ...

            if (is_array($item_ids) && count($item_ids) > 0) {
                for ($i = 0; $i < count($item_ids); $i++) {
                    $item_data = [
                        'item_id' => $item_ids[$i],
                        'sales_id' => $sale->id,
                        'store_id' => $request->input('store_id'),
                        'part_no' => $request->input('part_no')[$i],
                        'show_part' => $request->input('show_part'),
                        'mrp' => $request->input('mrp')[$i],
                        'unit_id' => $request->input('unit_id')[$i],
                        'rate_inclusive_tax' => $request->input('rate_inc_tax')[$i],
                        'item_name' => $request->input('item_name')[$i],
                        'grand_total' => $request->input('grand_total'),
                        'price_per_unit' => $request->input('purchase_price')[$i],
                        'discount_amt' => $request->input('discount_amt')[$i],
                        'total_cost' => $request->input('total_amount')[$i],
                        'description' => $request->input('purchase_note'),
                        'discount_input' => $request->input('discount_to_all_input'),
                        'sales_qty' => $request->input('sales_qty')[$i],
                        'tax_type' => $request->input('tax_type'),
                        'customer_id' => $request->input('customer_id'),
                        'created_on' => $request->input('sales_date'),
                        'hsn_code' => $request->input('hsn_code')[$i],
                        'tax_id' => $request->input('tax_id')[$i],
                        'tax_amt' => $request->input('tax_amt')[$i],
                        'discount_type' => $request->input('discount_to_all_type'),
                        'paid_amount' => $request->input('paid_amount')
                    ];

                    if ($request->input('sales_type') == "2") {
                        Offsaleitems::create($item_data);
                    } else {
                        Saleitems::create($item_data);
                    }
                }
            }

            // Update payment if exists
            if ($request->input('paid_amount')) {
                salespayment::updateOrCreate(
                    ['sales_id' => $sale->id],
                    [
                        'payment' => $request->input('paid_amount'),
                        'payment_type' => $request->input('paymenttypes'),
                        'account_id' => $request->input('account_id'),
                        'payment_note' => $request->input('payment_note_1'),
                        'store_id' => $request->input('store_id'),
                        'payment_date' => $request->input('sales_date'),
                        'customer_id' => $request->input('customer_id'),
                        'status' => 'Received',
                        'created_by' => Auth()->id()
                    ]
                );
            }

            DB::commit();

            // Redirect with success
            return redirect()->route('invoice_sale.main', ['id' => $sale->id, 'sale_type' => $request->input('sales_type')])
                ->with('success', 'Sale updated successfully');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the sale: ' . $e->getMessage()]);
        }
    }

    public function item_delete_salebill(Request $request)
    {
        $saleitems = Saleitems::find($request->input('id'));




        $sale = Sale::find($saleitems->sales_id);
        if ($sale) {


            $subtotal = $sale->subtotal;
            $total_cost = $saleitems->total_cost;
            $grand_total = $sale->grand_total;

            $sale->subtotal = $subtotal - $total_cost;
            $sale->grand_total = $grand_total - $total_cost;
            $sale->save();
        }
        $saleitems->delete();

        return back()->with('success', 'Item deleted successfully.');
    }



    public function payment_view(Request $request, $id)
    {

        $payment_details = salespayment::where('id', $id)->first();

        $customerIds = $payment_details->customer_id;

        $customer = Customer::where('id', $customerIds)->get();
        $logo = Coresetting::all();
        return view('admin.salepos.payview', compact('payment_details', 'logo', 'customer'));
    }
    public function sale_return(Request $request, $id)
    {
        $logo = Coresetting::all();
        $sale = Sale::find($id);


        $saleCode = $sale ? str_pad($sale->count_id + 1, 4, '0', STR_PAD_LEFT) : '0001';

        // Correctly query for sale items and off sale items
        $sales_itemdata = Saleitems::where('sales_id', $id)->where('status', '0')->get();
        $sales_itemdata_off = Offsaleitems::where('sales_id', $id)->where('status', '0')->get();

        // Initialize variables
        $items = collect();
        $unit_id = collect();
        $subtotal = $sale->subtotal;
        $qty = $sale->total_qty;
        $other_charge = $sale->other_charges_amt;
        $tot_discount_to_all_amt = $sale->tot_discount_to_all_amt;
        $grand_total = $sale->grand_total;

        // If there are sale items, process them
        if (!$sales_itemdata->isEmpty()) {
            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $items = Item::whereIn('id', $itemIds)->get();
        }
        // If there are off sale items, process them
        elseif ($sales_itemdata_off->isNotEmpty()) {
            $itemIds = $sales_itemdata_off->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata_off->pluck('unit_id'))->get();
            $items = Item::whereIn('id', $itemIds)->get();
        }

        // Common data retrieval

        $customerIds = $sale->customer_id;
        $customer_detail = Customer::where('id', $customerIds)->first();


        $taxIds = $sales_itemdata->isNotEmpty() ? $sales_itemdata->pluck('tax_id')->first() : $sales_itemdata_off->pluck('tax_id')->first();
        $tax = Tax::where('id', $taxIds)->first();
        $store = Store::where('id', $sale->store_id)->first();
        $customer = Customer::all();
        $cu_store = Store::all();
        $country = countrysettings::all();
        $unit = Unit::all();
        $account = Account::all();
        $taxes = Tax::all();

        return view('admin.salepos.salesreturn', compact(
            'cu_store',
            'sale',
            'qty',
            'other_charge',
            'sales_itemdata_off',
            'country',
            'unit_id',
            'store',
            'subtotal',
            'taxes',
            'sales_itemdata',
            'customer',
            'items',
            'logo',
            'tax',
            'account',
            'unit',
            'tot_discount_to_all_amt',
            'grand_total',
            'customer_detail',
            'customerIds',
            'saleCode'
        ));
    }
    public function return_post(Request $request)
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

            // Collect main sale data

            $sale_code = $request->input('sale_code');

            $prefix = $request->input('prefix');

            $sales_date = $request->input('sales_date');

            $tax_report = $request->input('tax_report');

            $due_date = $request->input('due_date');

            $store_id = $request->input('store_id');

            $customer_id = $request->input('customer_id');

            $created_on = $sales_date;
            $sale_prefix = $request->input('sale_prefix');

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
            $invoice_terms = $request->input('invoice_terms');

            $isNewPurchase = $request->input('is_new_sale', true);

            $customer = Customer::find($customer_id);


            // Calculate total billed and paid amounts

            $totalbilledamt = SaleReturn::where('customer_id', $customer_id)->sum('grand_total');

            $totalpayedamt = SaleReturn::where('customer_id', $customer_id)->sum('paid_amount');

            $sales_type = $request->input('sales_type');


            // Determine new or existing sale ID

            $maxSaleId = SaleReturn::max('count_id');

            $saleId = $isNewPurchase ? $maxSaleId + 1 : $request->input('existing_sale_id');


            // Determine new count ID for the sale

            $lastSaleEntry = SaleReturn::where('store_id', $store_id)

                ->where('sales_type', $sales_type)

                ->orderBy('id', 'desc')

                ->first();

            $newcount = $lastSaleEntry ? $lastSaleEntry->count_id + 1 : 1;


            // Create new Sale entry

            $sale = SaleReturn::create([
                'tot_discount_to_all_amt' => $tot_discount_to_all_amt,
                'sales_type' => $sales_type,
                'sale_prefix' => $sale_prefix,
                'total_qty' => $total_qty,
                'sale_id'=> $sale_id ,
                'prefix' => $prefix,
                'sales_code' => $return_sale_code,
                

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
                


                'other_charges_tax_id' => $other_charges_tax_id

            ]);


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

                    $ledger = new Ledger();

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

            return redirect()->route('invoice_sale.view', [
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







        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the sale return: ' . $e->getMessage()]);
        }
    }

    public function sale_return_update(Request $request)
    {
        // Log the request data for debugging
        // \Log::info($request->all());

        $input_id = $request->input('idss');

        if ($input_id) {
            // Fetch the sale record based on the provided ID
            $sales = Sale::where('id', $input_id)->first();

            // Check if a sale record was found
            if ($sales) {

                $sales->return_Sale_id = $request->input('returnsale_code');



                $sales_type = $sales->sales_type;



                $sale_ids = $sales->id;


                $sales->save();
            } else {

                return redirect()->back()->withErrors(['Sale not found.']);
            }
        } else {

            return redirect()->back()->withErrors(['Invalid sale ID.']);
        }


        return redirect()->route('invoice_sale.view', ['id' => $sale_ids, 'sale_type' => $sales_type]);
    }


 
}

// Fetch payment record





