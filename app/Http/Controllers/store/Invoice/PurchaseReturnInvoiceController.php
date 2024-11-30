<?php

namespace App\Http\Controllers\store\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Item;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\UserList;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class PurchaseReturnInvoiceController extends Controller
{
    public function invoice_purchase_return_store(Request $request, $purchase)
    {
     
        $logo = Coresetting::all();
        $sale = PurchaseReturn::find($purchase);
     
           
       
             
                $purchase_itemdata = PurchaseReturnItem::where('purchase_id', $purchase)
           
                ->get();
                        $hsn_codes = $purchase_itemdata->pluck('hsn_code')
                
                ->unique(); // Get unique HSN codes
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $purchase_items = PurchaseReturnItem::where('hsn_code', $hsn_code)->where('purchase_id', $purchase)
                     
                        ->get();
                        
                       
                        $taxable_amount = $purchase_items->pluck('rate_inclusive_tax')->sum();
                        $tax_amt = $purchase_items->pluck('tax_amt')->sum();
                        $price_per_unit = $purchase_items->pluck('price_per_unit')->sum();
                        $purchase_qty = $purchase_items->pluck('purchase_qty')->sum();
                        $tax_ids = $purchase_items->pluck('tax_id');
                
                      
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
                            'tax_amt' => $tax_amt,
                            'price_per_unit' => $price_per_unit,
                            'purchase_qty' => $purchase_qty,
                        ];
                    }
                }
                
         
         
                if ($purchase_itemdata->isEmpty()) {
                    return back()->with('error','No sale Item Found');
                }
    
                $itemIds = $purchase_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $purchase_itemdata->pluck('unit_id'))->get();
                $store_ids = $purchase_itemdata->pluck('store_id');
                $store_view = $purchase_itemdata->pluck('store_id')->first();
       
                $sale = PurchaseReturn::where('id', $purchase_itemdata->pluck('purchase_id'))->first();
    
                if (!$sale) {
                    return back()->with('error','Every Item In This Sale Has Been Returned.');
                    
                }
    
                $items = Item::whereIn('id', $itemIds)->get();
    
                $amount_pay = $purchase_itemdata->first();
    
                if (!$amount_pay) {
                    return response()->json(['message' => 'No amount payment found.'], 404);
                }
    
                $amount = $amount_pay->grand_total;
                $store = Store::whereIn('id', $store_ids)->first();
    
                if (!$store) {
                    return response()->json(['message' => 'Store not found.'], 404);
                }
    
                $item_alqty = Item::whereIn('id', $purchase_itemdata->pluck('item_id'))->get();
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
                    $customerIds = collect([$sale->supplier_id]);
                    $customer = Supplier::whereIn('id', $customerIds)->get();
                  
                }
            return view('store.invoice.invoicepurchase_return', compact('unit_id','userids','response_data','tax_records','hsn_code', 'purchase_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
        }
}
