<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Brand;
use App\Models\category;
use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Customer;
use App\Models\OffWarehouse;
use App\Models\Purchase;
use App\Models\Purchaseitems;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\second_store;
use App\Models\Second_wareitems;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Warehouseitem;
use Auth;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function new_purchase()
    {
        $ware = Warehouse::all();
        $supplier = Supplier::all();
        $logo = Coresetting::all();
        $tax = Tax::all();
        $unit = Unit::all();
        $store = Store::all();
        $brands = Brand::all();
        $category = category::all();
        $account = Account::all();
        $country = countrysettings::all();
        return view('admin.purchase.addpurchase', compact('supplier', 'account', 'ware', 'tax', 'store', 'unit', 'logo', 'category', 'brands', 'country'));
    }
    public function getSuppliers(Request $request)
    {
        // Directly retrieve the suppliers where store_id matches the provided store_id
        $suppliers = Supplier::where('store_id', $request->store_id)->get();

        return $suppliers;
    }

    public function purchase_list()
    {
        $logo = Coresetting::all();
        $purchase = Purchase::all();
    
        $purchaseIds = $purchase->pluck('id');
        $purchaseItems = Purchaseitems::whereIn('purchase_id', $purchaseIds)->get();
        $purchasePayments = Purchasepay::whereIn('purchase_id', $purchaseIds)->get();
    
        $payment_id = $purchasePayments->isNotEmpty() ? $purchasePayments->first()->id : 0;
        $account = Account::all();
    
        $supplierIds = $purchase->pluck('supplier_id');
        $suppliers = Supplier::whereIn('id', $supplierIds)->get();
    
        return view('admin.purchase.purchase_list', compact('purchase', 'suppliers', 'logo', 'account', 'purchaseItems', 'payment_id'));
    }
    
    
   
    public function searchItems(Request $request)
    {

        $searchQuery = $request->input('search');
        $store_id = $request->input('store_id');
        if ($searchQuery != '') {

            $items = Item::where('status', 'active')
                ->where('store_id', $store_id)

                ->where(function ($query) use ($searchQuery) {

                    $query->where('item_code', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('item_name', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('part_no', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('barcode', 'LIKE', "%{$searchQuery}%");
                })
                ->get();


            if ($items->isNotEmpty()) {



                return $items;

            } else {

                return 'No data fount';
            }
        }

    }



    public function addItem(Request $request)
    {
        $itemId = $request->input('item_id');
        $additems = Item::where('id', $itemId)
            ->get();

        // Return JSON response
        if ($additems->isNotEmpty()) {
            return $additems;
        } else {

            return 'No data fount';
        }
    }
    public function add_purchase(Request $request)
    {
        $lastPurchase = Purchase::orderBy('id', 'desc')->first();


        $lastCode = $lastPurchase ? intval($lastPurchase->purchase_code) + 1 : 1;

        $purchaseCode = str_pad($lastCode, 6, '0', STR_PAD_LEFT);

      
       
            $storeIds = Store::where('id', $request->input('store_id'))->first();

            $off_Store = second_store::where('store_id',$request->input('store_id'))->first();
    
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
            $maxPurchaseId = Purchase::max('count_id');
            $bill_number = $request->input('bill_no');
    
            $bill_no = $request->input('bill_no');
            $created_by = Auth()->id();
            $discount_to_all_type = $request->input('discount_to_all_type');
    
            $isNewPurchase = $request->input('is_new_purchase', true);
    
    
    
            $purchaseId = $request->input('existing_purchase_id');
    
    
    
            $purchase = Purchase::create([
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
                'purchase_qty'=>$stocks,
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
    
                /*      count($item_ids) === count($bach_nos) && */
                /*  count($item_ids) === count($expiry_dates) */
            ) {
    
                for ($i = 0; $i < count($item_ids); $i++) {
                    $purchaseItems = Purchaseitems::create([
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
                        'tax_id' => $tax_id,
                        'tax_amt' => $tax_amount[$i],
                        'discount_type' => $discount_type,
    
                    ]);
    
                    $paid_amount = $request->input('paid_amount');
                    if ($paid_amount != "") {
                        $salespayment = new Purchasepay();
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
    
                        $new_qty = ($stockdetails->available_qty + $purchase_qtys[$i]);
    
                        Warehouseitem::where('id', $stockdetails->id)->update([
                            'available_qty' => $new_qty,
                        ]);
                        Second_wareitems::where('id', $stockdetails->id)->update([
                            'available_qty' => $new_qty,
                        ]);
    
                        $itamdeatils = Item::where('id', $item_ids[$i])->first();
    
                        $new_qty = ($itamdeatils->opening_stock + $purchase_qtys[$i]);
    
                        Item::where('id', $item_ids[$i])->update([
                            'opening_stock' => $new_qty,
                        ]);
                    } else {
    
                        $itamdeatils = Item::where('id', $item_ids[$i])->first();
                        $new_qty = ($itamdeatils->opening_stock + $purchase_qtys[$i]);
    
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
                            $new_opening_stock = $itamdeatils->opening_stock + $purchase_qtys[$i];
                            $itamdeatils->update(['opening_stock' => $new_opening_stock]);
                        }
                    }
    
    
    
                }
            } else {
                // Handle error if array lengths don't match
                return response()->json(['error' => 'Invalid input data'], 400);
            }
    
            $sales_itemdata = Purchaseitems::where('purchase_id', $purchase->id)->get();
            $items = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get(); // Use whereIn to get all matching items
            $logo = Coresetting::all();
    
            return redirect()->route('invoice_purchase.view', ['purchase' => $purchase->id])
                ->with(compact('sales_itemdata', 'logo', 'items', 'purchaseItems'));
    
        }
           
    
    public function salescode(Request $request)
    {

        $store = Store::where('id', $request->input('store_id'))->first();

        $prifix = $store->sales_init;

        $lastsaleEntry = Sale::where('store_id', $request->input('store_id')) // Replace 'store_id' and $storeId with your actual column and variable
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
    public function billno_exist(Request $request)
    {
        $exists = Purchase::where('bill_number', $request->input('bill_no'))->exists();

        return response()->json(['exists' => $exists]);
    }
    public function purchasecode(Request $request)
    {
        $store = Store::where('id', $request->input('store_id'))->first();

        $prifix = $store->purchase_init;

        $lastsaleEntry = Purchase::where('store_id', $request->input('store_id')) // Replace 'store_id' and $storeId with your actual column and variable
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

    public function purchase_edit(Request $request, $id)
    {

        $purchase = Purchase::where('id', $id)
        ->where('purchase_return_status','0')
        ->first();

        $storeIds = $purchase::pluck('store_id')->first();



        if ($purchase) {

            $purchaseItems = Purchaseitems::where('purchase_id', $purchase->id)
      
            ->get();

            $itemIds = $purchaseItems->pluck('item_id');

            $items = Item::whereIn('id', $itemIds)->get();
            $unitIds = $purchaseItems->pluck('unit_id');
            $units = Unit::whereIn('id', $unitIds)->get();
            $taxIds = $purchaseItems->pluck('tax_id');
            $tax = Tax::whereIn('id', $taxIds)->get();
        }
        /*        
           
               $item = Item::where('id',$itemIds)->first(); */

        $store = Store::where('id', $storeIds)->first();
        $supplierIds = $purchase::pluck('supplier_id')->first();
        $supplier = Supplier::where('id', $supplierIds)->first();
        $category = category::all();
        $brands = Brand::all();
        $unit = Unit::all();
        $stores = Store::all();
        $taxes = Tax::all();

        $ware = Warehouse::all();
        $country = countrysettings::all();
        $suppliers = Supplier::all();
        $account = Account::all();
        $logo = Coresetting::all();
        return view('admin.purchase.purchaseedit', compact('taxes', 'purchaseItems', 'units', 'logo', 'account', 'purchase', 'supplier', 'suppliers', 'country', 'ware', 'tax', 'category', 'brands', 'unit', 'store', 'stores', 'items'));

    }
    public function edit_purchase(Request $request)
    {
    
        $off_Store = second_store::where('store_id',$request->input('store_id'))->first();
       

        $store_id = $request->input('store_id');
        $supplier_id = $request->input('supplier_id');
        $created_on = $request->input('purchase_date');
        $re_no = $request->input('re_no');
        $discount_to_all_input = $request->input('discount_to_all_input');
        $tot_discount_to_all_amt = $request->input('tot_discount_to_all_amt');
        $note = $request->input('purchase_note');
        $subtotal_amt = $request->input('subtotal');
        $other_charges = $request->input('other_charges_input');
        $round_off = $request->input('round_off');
        $grand_total = $request->input('grand_total');
        $payment_amount = $request->input('paid_amount');
        $payment_type = $request->input('payment_type');
        $account = $request->input('account');
        $payment_note = $request->input('payment_note');
        $other_charges_tax_id = $request->input('tax_id');
        $other_charge = $request->input('other_charges_amt');
        $all_discount = $request->input('all_discount');
        $stocks = $request->input('stock');
        $maxPurchaseId = Purchase::max('count_id');
        $bill_number = $request->input('bill_no');

        $bill_no = $request->input('bill_no');
        $created_by = Auth()->id();
        $discount_to_all_type = $request->input('discount_to_all_type');

        $isNewPurchase = $request->input('is_new_purchase', true);



        $purchaseId = $request->input('existing_purchase_id');
        $purchase_id = $request->input('id');

        $purchase = Purchase::where('id', $purchase_id)->first();

        $purchase->update([

            'bill_number' => $bill_no,
            'purchase_id'=>$stocks,
            'prefix' => 'PU',
            'discount_to_all_type' => $discount_to_all_type,
            'discount_to_all_input' => $all_discount,
            'created_by' => $created_by,
            'other_charges_amt' => $other_charge,
            'store_id' => $store_id,
            'off_store_id'=>$off_Store->id,
            'purchase_date' => $created_on,

            'other_charges_input' => $other_charges,
            'subtotal' => $subtotal_amt,
            'reference_no' => $re_no,

            'paid_amount' => $payment_amount,
            'round_off' => $round_off,

            'tot_discount_to_all_amt' => $tot_discount_to_all_amt,
            'supplier_id' => $supplier_id,

            'grand_total' => $grand_total,


            'count_id' => $purchaseId, 


            'other_charges_tax_id' => $other_charges_tax_id
        ]);

        $storeIds = Store::where('id', $store_id);
         //$purchase_payment_init = $storeIds->pluck('purchase_payment_init');
        // $payment_code = $purchase_payment_init .'/'. sprintf("%04d", $purchase_id + 1);
         $purchase_id = $request->input('id');
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
        $purchase_ids = $request->input('id');
        $discount_amt = $request->input('discount_amt');
        $description = $request->input('purchase_note');
        $stock = $request->input('stock');
        $tot_discount_to_all_amt = $request->input('tot_discount_to_all_amt');
        $purchase_price = $request->input('purchase_price');
        $tax_type = $request->input('tax_type');
        $unit_id = $request->input('unit_id');
        // Ensure all fields are arrays and have the same length
        $purchase_id = $request->input('id');
        if (
            is_array($item_ids) && count($item_ids) > 0 &&
            count($item_ids) === count($purchase_qtys) &&
            count($item_ids) === count($purchase_prices) &&
            count($item_ids) === count($total_amounts) &&
            count($item_ids) === count($tax_amount) &&
            count($item_ids)===count($hsn_code)&&
            //count($item_ids)===count($tax_id)&&
            count($item_ids) === count($unit_id) &&
            count($item_ids) === count($unit_total_cost)
        ) {

            for ($i = 0; $i < count($item_ids); $i++) {
                // Prepare the data for the purchase item
                $purchaseItems = [
                    'item_id' => $item_ids[$i], 
                    'price_per_unit' => $purchase_prices[$i],
                    'purchase_qty' => $purchase_qtys[$i],
                    'total_cost' => $total_amounts[$i],
                    'description' => $description,
                    'discount_input' => $discount_input,
                    'store_id' => $store_id,
                    'tax_type' => $tax_type,
                    'created_on' => $created_on,
                    'stock' => $stock,
                    'hsn_code'=>$hsn_code[$i],
                    'unit_total_cost' => $unit_total_cost[$i],
                    'tax_id' => $tax_id,
                    'tax_amt' => $tax_amount[$i],
                    'discount_type' => $discount_type,
                    'unit_id' => $unit_id[$i],
                    'purchase_id' => intval($purchase_id), 
                ];
            

                Purchaseitems::updateOrCreate(
                    [
                        'purchase_id' => $purchase_id,
                        'item_id' => $item_ids[$i]
                    ],
                    $purchaseItems
                );
            
      
        

                $paid_amount = $request->input('paid_amount');
             
                if ($paid_amount != "") {

                    $salespayment = Purchasepay::where('purchase_id', $request->input('id'))->first();
                   
                 
                        $salespayment->payment = $request->input('paid_amount');
                    $salespayment->count_id = $purchase->id;
                    $salespayment->payment_type = $request->input('paymenttypes');
                    $salespayment->account_id = $request->input('account_id');
                    $salespayment->payment_note = $request->input('payment_note');
                    //$salespayment->payment_code = $payment_code;
                    $salespayment->store_id = $store_id;
                    $salespayment->purchase_id = $purchase->id;
                    $salespayment->payment_date = $created_on;
                    $salespayment->supplier_id = $supplier_id;
                    $salespayment->status = 'Recieved';
                    $salespayment->created_by = Auth()->id();
                    $salespayment->save();
                    }
                    /* $salespayment = new Purchasepay(); */
               
                    
                

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

                    $new_qty = ($stockdetails->available_qty + $purchase_qtys[$i]);

                    Warehouseitem::where('id', $stockdetails->id)->update([
                        'available_qty' => $new_qty,
                    ]);
                    Second_wareitems::where('id', $stockdetails->id)->update([
                        'available_qty' => $new_qty,
                    ]);

                    $itamdeatils = Item::where('id', $item_ids[$i])->first();

                    $new_qty = ($itamdeatils->opening_stock + $purchase_qtys[$i]);

                    Item::where('id', $item_ids[$i])->update([
                        'opening_stock' => $new_qty,
                    ]);
                } else {

                    $itamdeatils = Item::where('id', $request->input('item_id'))->first();

                    $new_qty = ($itamdeatils->opening_stock + $purchase_qtys[$i]);

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
                        $new_opening_stock = $itamdeatils->opening_stock + $purchase_qtys[$i];
                        $itamdeatils->update(['opening_stock' => $new_opening_stock]);
                    }
                }



            }
        } else {
            // Handle error if array lengths don't match
            return response()->json(['error' => 'Invalid input data'], 400);
        }
        DB::commit();

        $sales_itemdata = Purchaseitems::where('purchase_id', $purchase->id)->get();
        $items = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->get(); // Use whereIn to get all matching items
        $logo = Coresetting::all();

        return redirect()->route('invoice_purchase.view', ['purchase' => $purchase->id])
            ->with(compact('sales_itemdata', 'logo', 'items', 'purchaseItems'));
  
    }

    public function payment_view_purchase(Request $request , $id){ 
        $payment_details = Purchasepay::where('id',$id)->first();
      
        $supplierIds = $payment_details->supplier_id;
      
        $supplier = Supplier::where('id',$supplierIds)->first();
       $logo     = Coresetting::all();
        return view('admin.purchase.payview',compact('payment_details','logo','supplier'));
    }


    public function purchase_return(Request $request ,$id)
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
        $category = category::all();
        $brands = Brand::all();
        $unit = Unit::all();
        $stores = Store::all();
        $taxes = Tax::all();
        $ware = Warehouse::all();
        $country = countrysettings::all();
        $suppliers = Supplier::all();
        $account = Account::all();
        $logo = Coresetting::all();
        return view('admin.purchase.purchase_return', compact('taxes', 'purchaseItems', 'units', 'logo', 'account', 'purchase', 'supplier', 'suppliers', 'country', 'ware', 'tax', 'category', 'brands', 'unit', 'store', 'stores', 'items'));
    }
   public function purchase_return_post(Request $request ){

    
     
        $purchaseItem = Purchaseitems::where('id', $request->input('id'))->first();
       

      
        if ($purchaseItem) {
            $item_id = $purchaseItem->item_id;
            $purchase_id = $purchaseItem->purchase_id;
            $store_id = $purchaseItem->store_id;
    
        }  
        
    
        $purchase = Purchase::where('id', $purchase_id)->first();
        if (!$purchase) {
            return response()->json([
                'message' => 'Sale record not found for the given item ID.',
            ], 404);
        }
    
        $total_to_deduct = ($purchaseItem)->total_cost;
    
 
         $purchase->round_off -= $total_to_deduct;
        $purchase->grand_total -= $total_to_deduct;
        $purchase->subtotal -= $total_to_deduct;
        $purchase->purchase_return_status = '1';
        $purchase->purchase_qty -= 1;
        $purchase->return_bit += 1;
        $purchase->save();
    
        // Update return item status
        if ($purchaseItem) {
            $purchaseItem->purchase_status = 'Returned';
            $purchaseItem->status = '1';
            $purchaseItem->save();
     
        } 
        $warehouse = Warehouse::where('store_id', $store_id)
        ->where('type', 'System')
        ->first();


    $stockdetails = Warehouseitem::where('store_id', $store_id)
        ->where('warehouse_id', $warehouse->id)
        ->where('item_id', $item_id)
        ->first();

    $second_stockdetails = Second_wareitems::where('store_id', $store_id)
        ->where('warehouse_id', $warehouse->id)
        ->where('item_id', $item_id)
        ->first();

    //     print_r($stockdetails);
    //    die();

    if (!empty($stockdetails && $second_stockdetails) && $stockdetails->count() > 0 && $second_stockdetails->count() > 0) {

        $new_qty = ($stockdetails->available_qty - $purchase->purchase_qty);

        Warehouseitem::where('id', $stockdetails->id)->update([
            'available_qty' => $new_qty,
        ]);
        Second_wareitems::where('id', $stockdetails->id)->update([
            'available_qty' => $new_qty,
        ]);

        $itamdeatils = Item::where('id', $item_id)->first();

        $new_qty = ($itamdeatils->opening_stock  - $purchase->purchase_qty);

        Item::where('id', $item_id)->update([
            'opening_stock' => $new_qty,
        ]);
    } else {

        $itamdeatils = Item::where('id', $item_id)->first();
        $new_qty = ($itamdeatils->opening_stock - $purchase->purchase_qty);

        Warehouseitem::create(
            [
                'store_id' => $request->input('store_id'),
                'warehouse_id' => $warehouse->id,
                'item_id' => $item_id,
                'available_qty' => $new_qty,
            ]

        );
        Second_wareitems::create(
            [
                'store_id' => $request->input('store_id'),
                'warehouse_id' => $warehouse->id,
                'item_id' => $item_id,
                'available_qty' => $new_qty,
            ]

        );



        if ($itamdeatils) {
            $new_opening_stock = $itamdeatils->opening_stock - $purchase->purchase_qty;
            $itamdeatils->update(['opening_stock' => $new_opening_stock]);
        }
    }

    return response()->json([
        'message' => 'Item has been returned successfully!',
        'remaining_payment' => $payed_amt->payment ?? 'No payment record found',
        'new_return_bit' => $purchase->return_bit,
        'updated_grand_total' => $purchase->grand_total,
    ]);

           
   }

   public function purchase_return_update(Request $request)
   {
     
       $return_update = Purchase::where('id',$request->input('id'))->first();
        $purchase_id = $return_update->id;
   
 
   
       return redirect()->route('invoice_purchase.view', ['purchase'=>$purchase_id] );
   }

   public function delete_purchase_row(Request $request, $id)
   {
       // Find the purchase item by ID
       $purchaseItem = Purchaseitems::find($id);
       
       if (!$purchaseItem) {
           return back()->with('error', 'Purchase item not found.');
       }
   
      
       $purchase = Purchase::find($purchaseItem->purchase_id); // Assuming `purchase_id` links Purchaseitems to Purchase
   
       if ($purchase) {
           // Update the subtotal and grand total
           $purchase->subtotal -= $purchaseItem->total_cost;
           $purchase->grand_total -= $purchaseItem->total_cost;
           

           $purchase->save();
       }
   
       // Delete the purchase item
       $purchaseItem->delete();
   
       return back()->with('success', 'Item deleted successfully.');
   }
   
   
   }

