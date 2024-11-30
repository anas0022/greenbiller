<?php

namespace App\Http\Controllers\store\purchase;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Purchaseitems;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;
use App\Models\PurchaseReturnPay;
use App\Models\second_store;
use App\Models\Second_wareitems;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Warehouseitem;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function purchase_return_store(Request $request, $id)
    {
        $purchase = Purchase::where('id', $id)->first();
        /* echo($purchase->item_id);
        die(); */
        $storeIds = $purchase::pluck('store_id')->first();



        if ($purchase) {

            $purchaseItems = Purchaseitems::where('purchase_id', $purchase->id)->get();

            $itemIds = $purchaseItems->pluck('item_id');

            $items = Item::whereIn('id', $itemIds)->get();
            $unitIds = $purchaseItems->pluck('unit_id');
            $units = Unit::whereIn('id', $unitIds)->first();

            $taxIds = $purchaseItems->pluck('tax_id');
            $tax = Tax::whereIn('id', $taxIds)->get();
        }
        /*        
           
               $item = Item::where('id',$itemIds)->first(); */

        $store = Store::where('id', $storeIds)->first();
        $supplierIds = $purchase::pluck('supplier_id')->first();
        $supplier = Supplier::where('id', $supplierIds)->first();
        $category = Category::all();
        $brands = Brand::all();
        $unit = Unit::all();
        $stores = Store::all();
        $taxes = Tax::all();
        $ware = Warehouse::all();
        $country = countrysettings::all();
        $suppliers = Supplier::all();
        $account = Account::all();
        $logo = Coresetting::all();
        return view('store.purchase.purchase_return', compact('taxes', 'purchaseItems', 'units', 'logo', 'account', 'purchase', 'supplier', 'suppliers', 'country', 'ware', 'tax', 'category', 'brands', 'unit', 'store', 'stores', 'items'));
    }

    public function purchase_return_post_store(Request $request)
    {



        $lastPurchase = PurchaseReturn::orderBy('id', 'desc')->first();


        $lastCode = $lastPurchase ? intval($lastPurchase->purchase_code) + 1 : 1;

        $purchaseCode = str_pad($lastCode, 6, '0', STR_PAD_LEFT);



        $storeIds = Store::where('id', $request->input('store_id'))->first();

        $off_Store = second_store::where('store_id', $request->input('store_id'))->first();

        $store_id = $request->input('store_id');
        $supplier_id = $request->input('supplier_id');
        $created_on = $request->input('purchase_date');
        $re_no = $request->input('re_no');
        $discount_to_all_input = $request->input('discount_to_all_input');
        $tot_discount_to_all_amt = $request->input('tot_discount_to_all_amt');
        $note = $request->input('purchase_note');
        $subtotal_amt = $request->input('subtotal');
        $other_charges_input = $request->input('other_charges_input');
        $round_off = $request->input('round_off');
        $grand_total = $request->input('grand_total');
        $payment_amount = $request->input('paid_amount');
        $payment_type = $request->input('payment_type');
        $account = $request->input('account');
        $payment_note = $request->input('payment_note');
        $other_charges_tax_id = $request->input('tax_id');
        $other_charges_amt = $request->input('other_charges_amt');
        $all_discount = $request->input('tot_discount_to_all_amt');
        $stocks = $request->input('stock');
        $maxPurchaseId = PurchaseReturn::max('count_id');
        $bill_number = $request->input('bill_no');

        $bill_no = $request->input('bill_no');
        $created_by = Auth()->id();
        $discount_to_all_type = $request->input('discount_to_all_type');

        $isNewPurchase = $request->input('is_new_purchase', true);



        $purchaseId = $request->input('existing_purchase_id');



        $purchase = PurchaseReturn::create([
            'purchase_code' => $purchaseCode,

            'off_store_id' => $off_Store->id,
            'bill_number' => $bill_no,
            'prefix' => 'PU',
            'discount_to_all_type' => $discount_to_all_type,
            'tot_discount_to_all_amt' => $all_discount,

            'created_by' => $created_by,
            'other_charges_amt' => $other_charges_amt,
            'store_id' => $store_id,
            'payment_type' => $payment_type,
            'purchase_date' => $created_on,
            'purchase_note' => $note,
            'other_charges_input' => $other_charges_input,
            'subtotal' => $subtotal_amt,
            'reference_no' => $re_no,
            'payment_note' => $payment_note,
            'paid_amount' => $payment_amount,
            'round_off' => $round_off,
            'discount_to_all_input' => $discount_to_all_input,
            'purchase_qty' => $stocks,
            'supplier_id' => $supplier_id,

            'grand_total' => $grand_total,
            'account' => $account,

            'count_id' => $purchaseId, // Assuming $purchaseId is set elsewhere

            'other_charges_tax_id' => $other_charges_tax_id
        ]);

        $storeIds = Store::where('id', $store_id);
        $purchase_payment_init = $storeIds->pluck('purchase_payment_init');
        $payment_code = $purchase_payment_init . '/' . sprintf("%04d", $purchase->id + 1);
        $purchaseId = $purchase->id;
        $item_ids = $request->input('item_id');
        $purchase_qtys = $request->input('purchase_qty');
        $purchase_prices = $request->input('purchase_price');
        $tax_id = $request->input('taxid');
        $tax_amount = $request->input('tax_amt');
        $discount_type = $request->input('discount_to_all_type');
        $discount_input = $request->input('discount_to_all_input');
        $total_amounts = $request->input('total_amount');
        $unit_total_cost = $request->input('purchase_price');

        $bach_nos = $request->input('bach_no');
        $hsn_code = $request->input('hsn_code');
        $expiry_dates = $request->input('expire_date');

        $discount_amt = $request->input('discount_amt');
        $description = $request->input('purchase_note');
        $stock = $request->input('stock');
        $tot_discount_to_all_amt = $request->input('tot_discount_to_all_amt');
        $purchase_price = $request->input('purchase_price');
        $tax_type = $request->input('tax_type');
        $unit_id = $request->input('unit_id');
        // Ensure all fields are arrays and have the same length
        if (
            is_array($item_ids) && count($item_ids) > 0 &&
            count($item_ids) === count($purchase_qtys) &&
            count($item_ids) === count($purchase_prices) &&
            count($item_ids) === count($total_amounts) &&
            count($item_ids) === count($hsn_code) &&
            count($item_ids) === count($tax_amount) &&
            count($item_ids) === count($unit_id) &&
            count($item_ids) === count($unit_total_cost)


        ) {

            for ($i = 0; $i < count($item_ids); $i++) {
                $purchaseItems = PurchaseReturnItem::create([
                    'item_id' => $item_ids[$i],
                    'price_per_unit' => $purchase_price[$i],
                    'purchase_qty' => $purchase_qtys[$i],
                    'total_cost' => $total_amounts[$i],
                    'hsn_code' => $hsn_code[$i],
                    'description' => $description,
                    'discount_input' => $discount_input,
                    'store_id' => $store_id,
                    'purchase_id' => $purchase->id,
                    'unit_id' => $unit_id[$i],
                    'tax_type' => $tax_type,
                    'discount_amt' => $tot_discount_to_all_amt,
                    'created_on' => $created_on,
                    'unit_total_cost' => $unit_total_cost[$i],

                    'tax_id' => $tax_id[$i],
                    'tax_amt' => $tax_amount[$i],
                    'discount_type' => $discount_type,
                ]);


                $paid_amount = $request->input('paid_amount');
                if ($paid_amount != "") {
                    $salespayment = new PurchaseReturnPay();
                    $salespayment->payment = $request->input('paid_amount');
                    $salespayment->count_id = $purchase->id;
                    $salespayment->payment_type = $request->input('paymenttypes');
                    $salespayment->account_id = $request->input('account_id');
                    $salespayment->payment_note = $request->input('payment_note');
                    $salespayment->payment_code = $payment_code;
                    $salespayment->store_id = $store_id;
                    $salespayment->purchase_id = $purchase->id;
                    $salespayment->payment_date = $created_on;
                    $salespayment->supplier_id = $supplier_id;
                    $salespayment->status = 'Recieved';
                    $salespayment->created_by = Auth()->id();
                    $salespayment->save();
                }

                $warehouse = Warehouse::where('store_id', $request->input('store_id'))
                    ->where('type', 'System')
                    ->first();


                $stockdetails = Warehouseitem::where('store_id', $request->input('store_id'))
                    ->where('warehouse_id', $warehouse->id)
                    ->where('item_id', $item_ids[$i])
                    ->first();

                $second_stockdetails = Second_wareitems::where('store_id', $request->input('store_id'))
                    ->where('warehouse_id', $warehouse->id)
                    ->where('item_id', $item_ids[$i])
                    ->first();

                //     print_r($stockdetails);
                //    die();

                if (!empty($stockdetails && $second_stockdetails) && $stockdetails->count() > 0 && $second_stockdetails->count() > 0) {

                    $new_qty = ($stockdetails->available_qty - $purchase_qtys[$i]);

                    Warehouseitem::where('id', $stockdetails->id)->update([
                        'available_qty' => $new_qty,
                    ]);
                    Second_wareitems::where('id', $stockdetails->id)->update([
                        'available_qty' => $new_qty,
                    ]);

                    $itamdeatils = Item::where('id', $item_ids[$i])->first();

                    $new_qty = ($itamdeatils->opening_stock - $purchase_qtys[$i]);

                    Item::where('id', $item_ids[$i])->update([
                        'opening_stock' => $new_qty,
                    ]);
                } else {

                    $itamdeatils = Item::where('id', $item_ids[$i])->first();
                    $new_qty = ($itamdeatils->opening_stock - $purchase_qtys[$i]);

                    Warehouseitem::create(
                        [
                            'store_id' => $request->input('store_id'),
                            'warehouse_id' => $warehouse->id,
                            'item_id' => $item_ids[$i],
                            'available_qty' => $new_qty,
                        ]

                    );
                    Second_wareitems::create(
                        [
                            'store_id' => $request->input('store_id'),
                            'warehouse_id' => $warehouse->id,
                            'item_id' => $item_ids[$i],
                            'available_qty' => $new_qty,
                        ]

                    );



                    if ($itamdeatils) {
                        $new_opening_stock = $itamdeatils->opening_stock - $purchase_qtys[$i];
                        $itamdeatils->update(['opening_stock' => $new_opening_stock]);
                    }
                }



            }
        } else {
            // Handle error if array lengths don't match
            return response()->json(['error' => 'Invalid input data'], 400);
        }

        $sales_itemdata = PurchaseReturnItem::where('purchase_id', $purchase->id)->get();
        $items = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get(); // Use whereIn to get all matching items
        $logo = Coresetting::all();




        return redirect()->route('invoice_purchase.return.store', ['purchase' => $purchase->id])
            ->with(compact('sales_itemdata', 'logo', 'items', 'purchaseItems'));


    }
}
