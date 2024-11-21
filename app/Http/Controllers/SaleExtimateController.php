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
use App\Models\saleExtimate;
use App\Models\saleExtimateItems;
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
use App\Models\Ledger;
use Illuminate\Http\Request;


class SaleExtimateController extends Controller
{
    public function salextimate()
    {


        $sales = saleExtimate::all();








        $logo = Coresetting::all();
        $supplierIds = $sales->pluck('customer_id');

        $userIds = $sales->pluck('created_by');
        $user = UserList::whereIn('id', $userIds)->first();
        $suppliers = Customer::whereIn('id', $supplierIds)->get();
        $account = Account::all();
       

    
    return view('admin.saleextimate.extimatelist', compact('sales', 'suppliers', 'user', 'logo', 'account'));

    }
    public function add_extimate(Request $request)
    {
        $ware = Warehouse::all();

        $store = Store::all();

        $unit = Unit::all();
        $customers = Customer::all();

        $category = category::all();

        $country = countrysettings::all();
        $brands = Brand::where('status', 'active')->get();
        $category = category::where('status', 'active')->get();
        $logo = Coresetting::all();
        $ware = Warehouse::where('status', 'active')->get();
        $unit = Unit::where('status', 'active')->get();
        $tax = Tax::where('status', 'active')->get();
        $stores = Store::where('store_status', 'active')->get();

        $tax = Tax::all();
        $items = Item::where('id', $request->input('id'))->first();

        $account = Account::all();
        return view('admin\saleextimate\addextimate', compact('customers', 'stores', 'ware', 'tax', 'store', 'unit', 'account', 'brands', 'category', 'items', 'country'));

    }


    public function extimate_create(Request $request)
    {
        // Start DB transaction at the beginning
        DB::beginTransaction();
        
        try {
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

            $totalbilledamt = saleExtimate::where('customer_id', $customer_id)->sum('grand_total');

            $totalpayedamt = saleExtimate::where('customer_id', $customer_id)->sum('paid_amount');

            $sales_type = $request->input('sales_type');


            // Determine new or existing sale ID

            $maxSaleId = Sale::max('count_id');

            $saleId = $isNewPurchase ? $maxSaleId + 1 : $request->input('existing_sale_id');


            // Determine new count ID for the sale

            $lastSaleEntry = saleExtimate::where('store_id', $store_id)

                ->where('sales_type', $sales_type)

                ->orderBy('id', 'desc')

                ->first();

            $newcount = $lastSaleEntry ? $lastSaleEntry->count_id + 1 : 1;


            // Create new Sale entry

            $sale = saleExtimate::create([
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
                
                        $normalsale = saleExtimateItems::create([

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

                

            


          


            DB::commit();







            $logo = Coresetting::all();
            $sales_itemdata = saleExtimateItems::where('sales_id', $sale->id)->get();
            $store = Store::where('id', $sale->store_id)->first();
            $customer = Customer::where('id', $sale->customer_id)->first();
            $tax = Tax::whereIn('id', $sales_itemdata->pluck('tax_id'))->get();
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $item_alqty = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get();
            $part_no = Item::whereIn('id', $sales_itemdata->pluck('part_no'))->first();
          
            $storeurl = route('store_itemsscan', ['id' => $sale->store_id]); // Generate the URL for the specific route
      

            return redirect()->route('invoice.sale.extimate', ['id' => $sale->id, 'sale_type' => $sales_type])

                ->with(compact('sale', 'logo', 'tax', 'unit_id', 'sales_itemdata', 'store', 'customer',   'item_alqty', 'part_no'));

                }


        } catch (Exception $e) {
          
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing the sale: ' . $e->getMessage()]);
        }

    }

    public function extimate_sale_add(Request $request , $id){
        $logo = Coresetting::all();
        $sale = saleExtimate::find($id); 


        $sales_itemdata = saleExtimateItems::where('sales_id', $id)->where('status', '0')->get();


        // Initialize variables
        $items = collect();
        $unit_id = collect();
        $subtotal = $sale->subtotal;
        $qty = $sale->total_qty;
        $other_charge = $sale->other_charges_amt;
        $tot_discount_to_all_amt = $sale->tot_discount_to_all_amt;
        $grand_total = $sale->grand_total;

    
        if (!$sales_itemdata->isEmpty()) {
            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $items = Item::whereIn('id', $itemIds)->get();
        }

    

        // Common data retrieval

        $customerIds = $sale->customer_id;
        $customer_detail = Customer::where('id', $customerIds)->first();


        $taxIds =$sales_itemdata->pluck('tax_id')->first() ;
        $tax = Tax::where('id', $taxIds)->first();
        $store = Store::where('id', $sale->store_id)->first();
        $customer = Customer::all();
        $cu_store = Store::all();
        $country = countrysettings::all();
        $unit = Unit::all();
        $account = Account::all();
        $taxes = Tax::all();

        return view('admin\saleextimate\addto_sale', compact(
            'cu_store',
            'sale',
            'qty',
            'other_charge',
            
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
}
