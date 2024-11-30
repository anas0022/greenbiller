<?php

namespace App\Http\Controllers\store\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Sale;
use App\Models\Saleitems;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\UserList;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class TaxInvoiceController extends Controller
{
    public function invoice_sale_main_store(Request $request , $id , $sale_type){


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
            return view('store.invoice.invoice-sale-main', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
        
        }
}
