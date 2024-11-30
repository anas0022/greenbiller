<?php

namespace App\Http\Controllers\store\sale;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\salespayment;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;

class SaleEditController extends Controller
{
    public function saleitem_edit_store(Request $request, $id)
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

        return view('store.salepos.salebilledit', compact(
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


    public function sale_edit_store(Request $request)
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
            return redirect()->route('invoice_sale.main.store', ['id' => $sale->id, 'sale_type' => $request->input('sales_type')])
                ->with('success', 'Sale updated successfully');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the sale: ' . $e->getMessage()]);
        }
    }
}
