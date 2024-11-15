<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Brand;
use App\Models\category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Sale;
use App\Models\Saleitems;
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

        $tax = Tax::all();
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

            return redirect()->route('invoice_sale.view', ['id' => $sale->id, 'sale_type' => $sales_type])

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

        foreach ($sales as $sale) {
            // Get the first SalesPayment record for the current Sale
            $sales_pay = SalesPayment::where('sales_id', $sale->id)->first();
            
            // Check if a payment exists
            if ($sales_pay) {
                $sale_pays = $sales_pay->id;
            } 
            else{
                $sale_pays = 0;
            }
           
            $logo = Coresetting::all();
            $supplierIds = $sales->pluck('customer_id');
           
            $userIds = $sales->pluck('created_by');
            $user = UserList::whereIn('id', $userIds)->first();
            $suppliers = Customer::whereIn('id', $supplierIds)->get();
            $account = Account::all();
            return view('admin.sales.saleslist', compact('sales', 'suppliers', 'user', 'logo', 'account', 'sale_pays'));
          
        
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
    $sale = Sale::findOrFail($id); // Use findOrFail to get the sale or throw a 404

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
    $customerIds = $sale->Customer_id; // Directly accessing the property
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
        'cu_store', 'sale', 'qty', 'other_charge', 'sales_itemdata_off', 'country', 'unit_id', 'store', 
        'subtotal', 'taxes', 'sales_itemdata', 'customer', 'items', 'logo', 'tax', 'account', 'unit', 
        'tot_discount_to_all_amt', 'grand_total'
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

    public function invoice_sale_view($id, $sale_type)
    {
        $logo = Coresetting::all();
        $sale = Sale::find($id); // Use find for better readability
    
        if (!$sale) {
            return response()->json(['message' => 'Sale not found.'], 404);
        }
    
        $return_id = Sale::where('return_Sale_id', $sale->return_Sale_id)->get();
        
       /* Returned Item  */
        if ($sale->return_Sale_id != null) {
            if ($sale_type == "2") {
                $sales_itemdata = Offsaleitems::where('sales_id', $id)
                ->where('status','0')
           
                ->get();
              
                $hsn_codes = $sales_itemdata->pluck('hsn_code')->unique();
            
       
                $response_data = []; 
                
                if ($hsn_codes) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Offsaleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status', '0')
                        ->get();
                        
                       
                        $taxable_amount = $sales_items->pluck('rate_inclusive_tax')->sum();
            
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
                            'taxable_amount' => $taxable_amount,
                            'total_tax_percentage' => $total_tax_percentage,
                        ];
                    }
                }
                
                if ($sales_itemdata->isEmpty()) {
                    return back()->with('error', 'no item available in this bill');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
                $taxids = $sales_itemdata->pluck('tax_id');
                $return_sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$return_sale) {
                    return response()->json(['message' => 'Return sale not found.'], 404);
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
                $tax = Tax::whereIn('id', $taxids)->get();
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
                $url = route('qrview', ['id' => $return_sale->id]);
                $qrCode = QrCode::size(100)->generate($url);
                $upiID = $store->upi_code;
                $payeeName = $store->store_name;
                $currency = 'INR';
                $upiUrl = "upi://pay?pa={$upiID}&am={$amount}&pn={$payeeName}&cu={$currency}";
                $pay = QrCode::size(100)->generate($upiUrl);
                $storeurl = route('store_itemsscan', ['id' => $store_view]);
                $storeurlstore = QrCode::size(100)->generate($storeurl);
    
                $user = null;
                $customer = null;
    
                if ($return_sale) {
                    $userids = collect([$sale->created_by]);
                    $user = UserList::whereIn('id', $userids)->get();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            } else {
                
                $sales_itemdata = Saleitems::where('sales_id', $id)
                ->where('status','0')
                ->get();

            
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique();
            
       
                $response_data = []; 
                
                if ($hsn_codes) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Saleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status', '0')
                        ->get();
                      
                        
                       
                        $taxable_amount = $sales_items->pluck('rate_inclusive_tax')->sum();
            
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
                            'taxable_amount' => $taxable_amount,
                            'total_tax_percentage' => $total_tax_percentage,
                        ];
                    }
                }
                
             
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
                $taxids = $sales_itemdata->pluck('tax_id');
                $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
    
                $items = Item::whereIn('id', $itemIds)->get();
                $tax = Tax::whereIn('id', $taxids)->get();
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
                    $userids = collect([$sale->created_by]);
                    $user = UserList::whereIn('id', $userids)->get();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            }
        
            /* Not Returned Item */
        } else {
            if ($sale_type == "2") {
                $sales_itemdata = Offsaleitems::where('sales_id', $id)
                ->where('status','1')
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')->unique();
            
       
                $response_data = []; 
                
                if ($hsn_codes) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Offsaleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status', '1')
                        ->get();
                        
                       
                        $taxable_amount = $sales_items->pluck('rate_inclusive_tax')->sum();
            
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
                            'taxable_amount' => $taxable_amount,
                            'total_tax_percentage' => $total_tax_percentage,
                        ];
                    }
                }
                
                if ($sales_itemdata->isEmpty()) {
                    return response()->json(['message' => 'No off sale items found.'], 404);
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
                $taxids = $sales_itemdata->pluck('tax_id');
                $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$sale) {
                    return response()->json(['message' => 'Sale not found.'], 404);
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
                $tax = Tax::whereIn('id', $taxids)->get();
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
                $upiUrl = "upi://pay?pa={$upiID}&am={$amount}&pn={$payeeName}&cu={$currency}";
                $pay = QrCode::size(100)->generate($upiUrl);
                $storeurl = route('store_itemsscan', ['id' => $store_view]);
                $storeurlstore = QrCode::size(100)->generate($storeurl);
    
                if ($sale) {
                    $userids = collect([$sale->created_by]);
                    $user = UserList::whereIn('id', $userids)->get();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            } else {
                $sales_itemdata = Saleitems::where('sales_id', $id)
                ->where('status','1')
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique(); // Get unique HSN codes
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Saleitems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status','1')
                        ->get();
                        
                       
                        $taxable_amount = $sales_items->pluck('rate_inclusive_tax')->sum();
            
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
                            'taxable_amount' => $taxable_amount,
                            'total_tax_percentage' => $total_tax_percentage,
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
                    return response()->json(['message' => 'No sale items found.'], 404);
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
       
                $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
                if (!$sale) {
                    return response()->json(['message' => 'Sale not found.'], 404);
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
                    $userids = collect([$sale->created_by]);
                    $user = UserList::whereIn('id', $userids)->get();
                    $customerIds = collect([$sale->customer_id]);
                    $customer = Customer::whereIn('id', $customerIds)->get();
                }
            }
        
        }
    
        return view('admin/invoice/invoice-sale', compact('unit_id','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
    }

    public function sale_edit(Request $request)
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
    
        $paid_amount = $request->input('paid_amount');
        if (!empty($paid_amount)) {
            $rules['paymenttypes'] = 'required';
            $rules['payment_note_1'] = 'required';
        }
    
        $request->validate($rules, [
            'sales_date.required' => 'The sales date is required.',
            'purchase_price.*.required' => 'Each purchase price is required.',
            'tax_type.required' => 'The tax type is required.',
            'tax_amt.*.required' => 'Each tax amount is required.',
            'rate_inc_tax.*.required' => 'Each rate including tax is required.',
            'subtotal.required' => 'The subtotal is required.',
            'unit_id.*.required' => 'Each unit ID is required.',
            'discount_amt.*.required' => 'Each discount amount is required.',
            'total_amount.*.required' => 'Each total amount is required.',
            'paymenttypes.required' => 'Payment type is required.',
            'payment_note_1.required' => 'Payment note is required.',
        ]);
    
        try {
            $sale = Sale::find($request->input('id'));
            if (!$sale) {
                return response()->json(['error' => 'Sale not found'], 404);
            }
    
            $sale->update([
                'sales_type' => $request->input('sales_type'),
                'total_qty' => $request->input('total_qty'),
                'prefix' => $request->input('prefix'),
                'sales_code' => $request->input('sale_code'),
                'tax_report' => $request->input('tax_report'),
                'discount_to_all_type' => $request->input('discount_to_all_type'),
                'discount_to_all_input' => $request->input('discount_to_all_input'),
                'created_by' => auth()->id(),
                'order_id' => $request->input('order_id'),
                'warehouse_id' => $request->input('ware_id'),
                'other_charges_amt' => $request->input('other_charge'),
                'store_id' => $request->input('store_id'),
                'payment_type' => $request->input('paymenttypes'),
                'purchase_note' => $request->input('purchase_note'),
                'subtotal' => $request->input('subtotal'),
                'reference_no' => $request->input('re_no'),
                'payment_note' => $request->input('payment_note'),
                'paid_amount' => $paid_amount,
                'round_off' => $request->input('round_off'),
                'customer_id' => $request->input('customer_id'),
                'created_on' => $request->input('sales_date'),
                'grand_total' => $request->input('grand_total'),
                'invoice_terms' => $request->input('invoice_terms'),
                'account' => $request->input('account'),
                'sales_note' => $request->input('purchase_note'),
                'sales_date' => $request->input('sales_date'),
                'due_date' => $request->input('due_date'),
                'other_charges_tax_id' => $request->input('othercharges_tax_id'),
            ]);
    
            $item_ids = $request->input('item_id');
            $sales_qtys = $request->input('sales_qty');
            $purchase_prices = $request->input('purchase_price');
            $tax_ids = $request->input('tax_id');
            $tax_amounts = $request->input('tax_amt');
            $discount_amounts = $request->input('discount_amt');
            $total_amounts = $request->input('total_amount');
            $mrps = $request->input('mrp');
            $unit_ids = $request->input('unit_id');
            $tax_types = $request->input('tax_type');
            $hsn_codes = $request->input('hsn_code');
             $show_part = $request->input('show_part');
    
            foreach ($item_ids as $index => $item_id) {
                $item_data = [
                    'item_id' => $item_id,
                    'sales_id' => $sale->id,
                    'store_id'=>$request->input('store_id'),
                    'part_no' => $request->input('part_no')[$index],
                    'mrp' => $mrps[$index],
                    'unit_id' => $unit_ids[$index],
                    'rate_inclusive_tax' => $request->input('rate_inc_tax')[$index],
                    'item_name' => $request->input('item_name')[$index],
                    'price_per_unit' => $purchase_prices[$index],
                    'discount_amt' => $discount_amounts[$index],
                    'total_cost' => $total_amounts[$index],
                    'description' => $request->input('purchase_note'),
                    'customer_id'=>$request->input('customer_id'),
                    'show_part' => $show_part,
                    'discount_input' => $request->input('discount_to_all_input'),
                    'sales_qty' => $sales_qtys[$index],
                    'tax_type' => $tax_types[$index],
                    'hsn_code' => $hsn_codes[$index],
                    'tax_id' => $tax_ids[$index],
                    'grand_total'=> $request->input('grand_total'),
                    'tax_amt' => $tax_amounts[$index],
                    'discount_type' => $request->input('discount_to_all_type'),
                ];
                $sales_type = $request->input('sales_type');
    
                if ($sales_type == "2") {
                    Offsaleitems::updateOrCreate(
                        ['sales_id' => $sale->id, 'item_id' => $item_id],
                        $item_data
                    );
                } else {
                    Saleitems::updateOrCreate(
                        ['sales_id' => $sale->id, 'item_id' => $item_id],
                        $item_data
                    );
                }
            }
    
            $ledger = new Ledger();
            $ledger->customer_id = $request->input('customer_id');
            $ledger->date = $request->input('sales_date');
            $ledger->type = $request->input('sales_type') == 0 ? "Sales B2B" : ($request->input('sales_type') == 1 ? "Sales B2C" : "Sales");
            $ledger->invoice_purchase_no = $sale->prefix . '/' . $sale->sales_code;
            $ledger->title = 'SALES';
            $ledger->debit = $request->input('grand_total');
            $ledger->save();
    
            if (!empty($paid_amount)) {
                salespayment::updateOrCreate(
                    ['sales_id' => $sale->id],
                    [
                        'payment' => $paid_amount,
                        'count_id' => $sale->count_id,
                        'payment_type' => $request->input('paymenttypes'),
                        'account_id' => $request->input('account_id'),
                        'payment_note' => $request->input('payment_note_1'),
                        'payment_code' => $request->input('payment_code'),
                        'store_id' => $request->input('store_id'),
                        'payment_date' => $request->input('sales_date'),
                        'customer_id' => $request->input('customer_id'),
                        'status' => 'Received',
                        'created_by' => auth()->id(),
                    ]
                );
            }   DB::commit();





            $grand_total = $request->input('grand_total');

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
    return redirect()->route('invoice_sale.view', ['id' => $sale->id, 'sale_type' => $sales_type])

                ->with(compact('sale', 'logo', 'tax', 'unit_id', 'sales_itemdata', 'store', 'customer', 'qrCode', 'pay', 'storeurlstore', 'item_alqty', 'part_no'));




        } catch (Exception $e) {
            // Handle errors and redirect back with a flash message
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the sale: ' . $e->getMessage()]);
        }
    }
    
    public function item_delete_salebill(Request $request)
    {
        $saleitems  = Saleitems::find($request->input('id'));
       

    
       
        $sale = Sale::find($saleitems->sales_id);
       if($sale){

      
$subtotal = $sale->subtotal;
$total_cost = $saleitems->total_cost;
$grand_total = $sale->grand_total;

$sale->subtotal = $subtotal-$total_cost;
$sale->grand_total = $grand_total-$total_cost ;
$sale->save();
}
        $saleitems->delete();
    
        return back()->with('success', 'Item deleted successfully.');
    }



    public function payment_view(Request $request, $id){

        $payment_details = salespayment::where('id',$id)->first();
        
        $customerIds = $payment_details->customer_id;
       
        $customer = Customer::where('id',$customerIds)->get();
       $logo     = Coresetting::all();
        return view('admin.salepos.payview',compact('payment_details','logo','customer'));
    }
    public function sale_return(Request $request, $id) {
        $logo = Coresetting::all();
        $sale = Sale::where('id', $id)->first();
        
        $saleCode = $sale ? str_pad($sale->return_bill_init + 1, 4, '0', STR_PAD_LEFT) : '0001';
    
        // Initialize variables to avoid undefined errors
        $unit_id = collect();
        $sales_itemdata = collect();
        $items = collect(); // Initialize $items as an empty collection
        $total_qty = $subtotal = $othercharge = $tot_discount_to_all_amt = $grand_total = $store_ids = $customerIds = null;
        $sale_status = null;
    
        if ($sale) {
            $total_qty = $sale->total_qty;
            $subtotal = $sale->subtotal;
            $othercharge = $sale->other_charges_amt;
            $tot_discount_to_all_amt = $sale->tot_discount_to_all_amt;
            $grand_total = $sale->grand_total;
            $store_ids = $sale->store_id;
            $customerIds = $sale->customer_id;
            $prefix = $sale->prefix;
            $code = $sale->sales_code;
            $saleType = $sale->sales_type;
        }
    
        // Retrieve sale items and off-sale items data
        $saleitems = Saleitems::where('sales_id', $id)->get();
        $offsaleitems = Offsaleitems::where('sales_id', $id)->get();
 
       
    
        if ($saleitems->isNotEmpty()) {
            $sales_itemdata = Saleitems::where('sales_id', $id)->get();
            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->first();
            $taxids = Tax::whereIn('id', $sales_itemdata->pluck('tax_id'))->first();
           
            $items = Item::whereIn('id', $itemIds)->get(); // Ensure $items is populated as a collection
            $sale_status = $sales_itemdata->first()->status ?? '00';
     
        }
    
        if ($offsaleitems->isNotEmpty()) {
            $sales_itemdata = Offsaleitems::where('sales_id', $id)->get();
            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->first();
            $taxids = Tax::whereIn('id', $sales_itemdata->pluck('tax_id'))->first();
            $items = Item::whereIn('id', $itemIds)->get(); // Populate $items with the items from offsale items
            $sale_status = $sales_itemdata->first()->status ?? '00';
           
        }
    
        // Fetch related data
        $account = Account::all();
    
        $taxes = Tax::all();
       
        $store = Store::where('id', $store_ids)->first();
        $customer = Customer::where('id', $customerIds)->first();
        $cu_store = Store::all();
        $country = countrysettings::all();
        $unit = Unit::all();
        return view('admin.salepos.salesreturn', compact(
            'cu_store', 'sale', 'country', 'unit_id', 'store', 'taxes', 'sales_itemdata', 
            'customer', 'items', 'logo', 'taxids', 'account', 'unit', 'total_qty', 'subtotal',
            'othercharge', 'tot_discount_to_all_amt', 'grand_total', 'saleCode', 'sale_status','saleitems','offsaleitems','prefix','code','saleType'
        ));
    }
    public function return_post(Request $request)
    {
        $return_item = Saleitems::where('id', $request->input('id'))->first();
        $off_return_item = Offsaleitems::where('id', $request->input('id'))->first();

      
        if ($return_item) {
            $item_id = $return_item->item_id;
            $sales_id = $return_item->sales_id;
            $store_id = $return_item->store_id;
            $is_off_sale = false; // Flag for off sale
        } elseif ($off_return_item) {
            $item_id = $off_return_item->item_id;
            $sales_id = $off_return_item->sales_id;
            $store_id = $off_return_item->store_id;
            $is_off_sale = true; // Flag for off sale
        } else {
            return response()->json([
                'message' => 'SaleItem or OffsaleItem not found for the given ID.',
            ], 404);
        }
    
        $sale = Sale::where('id', $sales_id)->first();
        if (!$sale) {
            return response()->json([
                'message' => 'Sale record not found for the given item ID.',
            ], 404);
        }
    
        $total_to_deduct = ($is_off_sale ? $off_return_item : $return_item)->total_cost;
    
        // Update sale totals
        $sale->grand_total -= $total_to_deduct;
        $sale->subtotal -= $total_to_deduct;
        $sale->return_Sale_id = $request->input('returnsale_code');
        $sale->total_qty -= 1;
        $sale->return_bit += 1;
        $sale->save();
    
        // Update return item status
        if ($off_return_item) {
            $off_return_item->sales_status = 'Returned';
            $off_return_item->status = '1';
  
            $off_return_item->save();
     
        } else {
            $return_item->sales_status = 'Returned';
            $return_item->status = '1';
            $return_item->save();
           
        }
    
        // Locate Warehouse and Stock Details
        $warehouse = Warehouse::where('store_id', $store_id)
            ->where('type', 'System')
            ->first();
    
        if ($warehouse) {
            $stockdetails = Warehouseitem::where('store_id', $store_id)
                ->where('warehouse_id', $warehouse->id)
                ->where('item_id', $item_id)
                ->first();
    
            $secondware = Second_wareitems::where('store_id', $store_id)
                ->where('warehouse_id', $warehouse->id)
                ->where('item_id', $item_id)
                ->first();
    
            if ($stockdetails) {
                $new_qty = $stockdetails->available_qty + ($is_off_sale ? $off_return_item->sales_qty : $return_item->sales_qty);
    
                Warehouseitem::where('id', $stockdetails->id)->update(['available_qty' => $new_qty]);
                Second_wareitems::where('id', $secondware->id)->update(['available_qty' => $new_qty]);
    
                $item_details = Item::where('id', $item_id)->first();
                $new_opening_stock = $item_details->opening_stock - ($is_off_sale ? $off_return_item->sales_qty : $return_item->sales_qty);
                Item::where('id', $item_id)->update(['opening_stock' => $new_opening_stock]);
            } else {
                // Handle the case where stock details do not exist
                $item_details = Item::where('id', $item_id)->first();
                $new_qty = ($item_details->opening_stock + ($is_off_sale ? $off_return_item->sales_qty : $return_item->sales_qty));
    
                Warehouseitem::create([
                    'store_id' => $store_id,
                    'warehouse_id' => $warehouse->id,
                    'item_id' => $item_id,
                    'available_qty' => $new_qty,
                ]);
                Second_wareitems::create([
                    'store_id' => $store_id,
                    'warehouse_id' => $warehouse->id,
                    'item_id' => $item_id,
                    'available_qty' => $new_qty,
                ]);
    
                if ($item_details) {
                    $new_opening_stock = $item_details->opening_stock + ($is_off_sale ? $off_return_item->sales_qty : $return_item->sales_qty);
                    $item_details->update(['opening_stock' => $new_opening_stock]);
                }
            }
        }
    
        $payed_amt = salespayment::where('sales_id', $sales_id)->first();
    
        return response()->json([
            'message' => 'Item has been returned successfully!',
            'remaining_payment' => $payed_amt->payment ?? 'No payment record found',
            'new_return_bit' => $sale->return_bit,
            'updated_grand_total' => $sale->grand_total,
        ]);
    }


    public function sale_return_update(Request $request)
    {

        $return_update_sale = Sale::where('id',$request->input('id'))->first();
        $return_update_offsale = Offsaleitems::where('id',$request->input('id'))->first();
        if($return_update_sale){
        $sales_type = $return_update_sale->sales_type;
         $sale_ids = $return_update_sale->id;

        if ($return_update_sale) {
            $return_update_sale->return_sale_id = $request->input('returnsale_code');
            $return_update_sale->save();
    
           return redirect()->route('invoice_sale.view',['id'=>$sale_ids , 'sale_type'=>$sales_type]);
        } else {
            return response()->json(['message' => 'Sale record not found.'], 404);
        }}
        elseif($return_update_offsale){
            $sales_type = $return_update_offsale->sales_type;
             $sale_ids = $return_update_offsale->id;
    
            if ($return_update_offsale) {
                $return_update_offsale->return_sale_id = $request->input('returnsale_code');
                $return_update_offsale->save();
        
               return redirect()->route('invoice_sale.view',['id'=>$sale_ids , 'sale_type'=>$sales_type]);
            } else {
                return response()->json(['message' => 'Sale record not found.'], 404);
            }}
    }
    
            
        }
    
        // Fetch payment record
      
    
    
    
