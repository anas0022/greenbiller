<?php

namespace App\Http\Controllers\store;
use App\Models\Account;
use App\Models\Brand;
use App\Models\category;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Purchaseitems;
use App\Models\Purchasepay;
use App\Models\Sale;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Models\Warehouseitem;
use Auth;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Item;
use App\Http\Controllers\Controller;


class Store_purchaseController extends Controller
{
    
    public function new_purchase()
    {

        $store = Store::where('id',Auth::user()->store_id)->get();

        $supplier = Supplier::whereIn('store_id',$store)->get();
        $ware = Warehouse::all();
        $account = Account::whereIn('store_id',$store)->get();
        $logo = Coresetting::all();
        $tax = Tax::all();
        $unit = Unit::all();
   
        $brands = Brand::all();
        $category = category::all();
      
        return view('store.purchase.addpurchase', compact('supplier', 'account','ware', 'tax', 'store', 'unit','logo','category','brands'));
    }
    public function purchase_list()
    {

        $logo = Coresetting::all();

        $purchase = Purchase::all();


        $supplierIds = $purchase->pluck('supplier_id');

        $suppliers = Supplier::whereIn('id', $supplierIds)->get();

        return view('store.purchase.purchase_list', compact('purchase', 'suppliers','logo'));
    }

    public function purchase_return()
    {    $logo = Coresetting::all();
        return view('admin.purchase.purchase_return',compact('logo'));
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


        $purchase_code = $request->input('purchase_code');
        $prefix = $request->input('prefix');

        $store_id = $request->input('store_id');
        $supplier_id = $request->input('supplier_id');
        $created_on = $request->input('purchase_date');
        $re_no = $request->input('re_no');
        $discount_to_all_input = $request->input('discount_to_all_input');
        $tot_discount_to_all_amt = $request->input('tot_discount_to_all_amt');
        $note = $request->input('purchase_note');
        $subtotal_amt = $request->input('subtotal');
        $other_charges = $request->input('other_charges_amt');
        $round_off = $request->input('round_off');
        $grand_total = $request->input('grand_total');
        $payment_amount = $request->input('paid_amount');
        $payment_type = $request->input('payment_type');
        $account = $request->input('account');
        $payment_note = $request->input('payment_note');
        $other_charges_tax_id = $request->input('tax_id');
        $other_charge = $request->input('other_charge');
        $all_discount = $request->input('all_discount');
        
        $maxPurchaseId = Purchase::max('count_id');
        $bill_number = $request->input('bill_no');
        
        $bill_no = $request->input('bill_no');
        $created_by = Auth()->id();
        $discount_to_all_type = $request->input('discount_to_all_type');

        $isNewPurchase = $request->input('is_new_purchase', true);

     

            $purchaseId = $request->input('existing_purchase_id');
        


        $purchase = Purchase::create([
            'purchase_code' => $purchase_code,
            
            'bill_number'=>$bill_no,
            'prefix' => $prefix,
            'discount_to_all_type' => $discount_to_all_type,
            'discount_to_all_input' => $all_discount,
            'created_by' => $created_by,
            'other_charges_amt' => $other_charge,
            'store_id' => $store_id,
            'payment_type' => $payment_type,
            'purchase_date'=>$created_on,
            'purchase_note' => $note,
            'other_charges_input' => $other_charges,
            'subtotal' => $subtotal_amt,
            'reference_no' => $re_no,
            'payment_note' => $payment_note,
            'paid_amount' => $payment_amount,
            'round_off' => $round_off,
            'discount_input' => $discount_to_all_input,
            'discount_amt' => $tot_discount_to_all_amt,
            'supplier_id' => $supplier_id,
            
            'grand_total' => $grand_total,
            'account' => $account,

            'count_id' => $purchaseId, // Assuming $purchaseId is set elsewhere

            'other_charges_tax_id' => $other_charges_tax_id
        ]);

        $storeIds = Store::where('id', $store_id);
        $purchase_payment_init = $storeIds->pluck('purchase_payment_init');
        $payment_code = $purchase_payment_init .'/'. sprintf("%04d", $purchase->id + 1);
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
        $stocks = $request->input('stock');
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
            count($item_ids)===count($tax_amount)&&
            count($item_ids)===count($unit_id)&&
            count($item_ids) === count($unit_total_cost)

            /*      count($item_ids) === count($bach_nos) && */
            /*  count($item_ids) === count($expiry_dates) */
        ) {

            for ($i = 0; $i < count($item_ids); $i++) {
                Purchaseitems::create([
                    'item_id' => $item_ids[$i],
                    'price_per_unit' => $purchase_price[$i],
                    'purchase_qty' => $purchase_qtys[$i],
                    'total_cost' => $total_amounts[$i],
                    'hsn_code' => $hsn_code[$i],
                    'description' => $description,
                    'discount_input' => $discount_input,
                    'store_id' => $store_id,
                    'purchase_id' => $purchase->id,
                    'unit_id'=>$unit_id[$i],
                    'tax_type' => $tax_type,

                    'created_on' => $created_on,
                    'stock' => $stock,
                    'unit_total_cost' => $unit_total_cost[$i],
                    'tax_id' => $tax_id,
                    'tax_amt' => $tax_amount[$i],
                    'discount_type' => $discount_type,
                    'paid_amount' => $payment_amount,
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
                $salespayment->supplier_id =$supplier_id;
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

                //     print_r($stockdetails);
                //    die();

                if (!empty($stockdetails) && $stockdetails->count()>0) {

                    $new_qty = ($stockdetails->available_qty + $purchase_qtys[$i]);

                    Warehouseitem::where('id', $stockdetails->id)->update([
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
        $items = Item::whereIn('id', $sales_itemdata->pluck('item_id'))->first(); 
       $logo = Coresetting::all();
    
        return view('store.instentprint.invoicepurchase', compact('sales_itemdata','logo','items','purchase'));

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
public function invoice_purchase(Request $request)
{
    $purchase = Purchase::where('count_id', $request->input('id'))->first();
    $logo = Coresetting::all();
    
    $purchaseitems = Purchaseitems::where('purchase_id', $request->input('id'))->get();
    $itemIds = $purchaseitems->pluck('item_id'); 
    $taxids = $purchaseitems->pluck('tax_id'); 
    $store_ids = $purchase->pluck('store_id'); 
    $store = store::whereIn('id',$store_ids)->first();
    $items = Item::whereIn('id', $itemIds)->get();
  
    $tax = Tax::whereIn('id', $taxids)->get();
    if ($purchase) {
    
        $supplierIds = collect([$purchase->supplier_id]);
        $suppliers = Supplier::whereIn('id', $supplierIds)->get();
        
        return view('store.invoice.invoice-purchase', compact('purchase', 'items', 'suppliers', 'purchaseitems','tax','store','logo'));
    }
    
    return redirect()->back()->with('error', 'Purchase not found.');
}
    
}
/* 'item_id' => $item_ids[$i],
                'purchase_qty' => $purchase_qtys[$i],
                'unit_total_cost' => $total_amount[$i],
                'bach_no' => $bach_no[$i],
                'expire_date' => $expire_date[$i],     // Ensure item_ids and other required arrays are properly aligned
    if (is_array($item_ids) && count($item_ids) > 0 &&
        count($item_ids) === count($purchase_qtys) &&
        count($item_ids) === count($purchase_price) &&
        count($item_ids) === count($total_amount) &&
        count($item_ids) === count($bach_no) &&
        count($item_ids) === count($expire_date)) {

        for ($i = 0; $i < count($item_ids); $i++) {
        
        
                'price_per_unit' => $purchase_price[$i],*/