<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Purchase;
use App\Models\Purchase_order;
use App\Models\purchase_order_sale;
use App\Models\purchase_order_sales_items;
use App\Models\Purchaseitems;
use App\Models\Purchaseitems_order;
use App\Models\Sale;
use App\Models\saleExtimate;
use App\Models\saleExtimateItems;
use App\Models\Saleitems;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class InvoiceController extends Controller
{


    public function invoice_purchase(Request $request, $purchase)
    {
     
        $logo = Coresetting::all();
        $sale = Purchase::find($purchase);
     
           
       
             
                $sales_itemdata = Purchaseitems::where('purchase_id', $purchase)
           
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique(); // Get unique HSN codes
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = Purchaseitems::where('hsn_code', $hsn_code)->where('purchase_id', $purchase)
                     
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
                    return back()->with('error','No sale Item Found');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
       
                $sale = Purchase::where('id', $sales_itemdata->pluck('purchase_id'))->first();
    
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
                    $customerIds = collect([$sale->supplier_id]);
                    $customer = Supplier::whereIn('id', $customerIds)->get();
                  
                }

        return view('admin.instentprint.invoicepurchase', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
    }
    
        public function invoice_sale(Request $request)
    {


        $logo = Coresetting::all();
        $sales_itemdata = Saleitems::where('sales_id', $request->input('id'))->get();
        $itemIds = $sales_itemdata->pluck('item_id');
        $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
        $store_ids = $sales_itemdata->pluck('store_id');
        $store_view = $sales_itemdata->pluck('store_id')->first();

        $taxids = $sales_itemdata->pluck('tax_id');
        $sale = Sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
        $items = Item::whereIn('id', $itemIds)->get();
        $tax = Tax::whereIn('id', $taxids)->get();
        $amount_pay = Saleitems::whereIn('id', $sales_itemdata)->first();
        $store = Store::whereIn('id', $store_ids)->first();
        $url = route('qrview', ['id' => $sale->id]); // Generate the URL for the specific route
        $amount_payoff = Offsaleitems::whereIn('id',$sales_itemdata)->first();
        if($amount_pay){
            $amount = $amount_pay->grand_total;
        }
        else{
            $amount = $amount_payoff->grand_total;
        }
        $qrCode = QrCode::size(100)->generate($url);
        $upiID = $store->upi_code;
        $payeeName = $store->store_name;
        
        $currency = 'INR';

        $upiUrl = "upi://pay?pa={$upiID}&pn={$payeeName}&am={$amount}&cu={$currency}";
        $pay = QrCode::size(100)->generate($upiUrl);
        $storeurl = route('store_itemsscan', ['id' => $store_view]); // Generate the URL for the specific route
        $storeurlstore = QrCode::size(100)->generate($storeurl);
        if ($sale) {
            $userids = collect([$sale->created_by]);
            $user = UserList::whereIn('id', $userids)->get();
            $customerIds = collect([$sale->customer_id]);
            $customer = Customer::whereIn('id', $customerIds)->get();

            return view('admin.invoice.invoice-sale', compact('unit_id', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'customer', 'tax', 'user', 'store', 'logo'));
        }

        return redirect()->back()->with('error', 'Purchase not found.');
    }
    public function invoice_customer(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'id' => 'required|exists:customers,id',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string',
            'address' => 'nullable|string',
            'gst_number' => 'nullable|string',
        ]);

        // Find the customer by ID
        $invoice_customer = Customer::find($request->input('id'));

        if ($invoice_customer) {
            // Update the customer's information
            $invoice_customer->email = $request->input('email');
            $invoice_customer->mobile = $request->input('mobile');
            $invoice_customer->address = $request->input('address');
            $invoice_customer->gst_number = $request->input('gst_number');

            // Save the changes
            $invoice_customer->save();


        }
    }
    public function invoice_purchase_return(Request $request, $purchase)
    {
     
        $purchaseids = Purchase::where('id', $purchase)->first();
    
       
        if (!$purchaseids) {
            return redirect()->back()->with('error', 'Purchase not found.');
        }
    

        $logo = Coresetting::all();
    

        $purchaseItems = collect();
        $items = collect();
        $tax = collect();
        $store = collect();
    
    
        if ($purchaseids->purchase_return_status == '1') {
       
            $purchaseItems = Purchaseitems::where('purchase_id', $purchaseids->id)
                ->where('status', '1')
                ->get();
        } else {
        
            $purchaseItems = Purchaseitems::where('purchase_id', $purchaseids->id)->get();
        }
    
     
        $itemIds = $purchaseItems->pluck('item_id');
    
      
        $items = Item::whereIn('id', $itemIds)->get();
    
  
        $taxIds = $purchaseItems->pluck('tax_id');
        $storeIds = $purchaseItems->pluck('store_id');
    
      
        $store = Store::whereIn('id', $storeIds)->get();
        $tax = Tax::whereIn('id', $taxIds)->get();

        return view('admin.instentprint.invoicepurchase_return', compact('purchaseItems', 'items', 'tax', 'store', 'logo'));
    }
    public function invoice_sale_extimate($id, $sale_type)
    {
        $logo = Coresetting::all();
        $sale = Sale::find($id);
     
           
       
             
                $sales_itemdata = saleExtimateItems::where('sales_id', $id)
                ->where('status','0')
                ->get();
                $hsn_codes = $sales_itemdata->pluck('hsn_code')
                
                ->unique(); // Get unique HSN codes
                
                $response_data = []; 
                
                if ($hsn_codes->isNotEmpty()) {
                    foreach ($hsn_codes as $hsn_code) {
                    
                        $sales_items = saleExtimateItems::where('hsn_code', $hsn_code)->where('sales_id', $id)
                        ->where('status','0')
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
                    return back()->with('error','No sale Item Found');
                }
    
                $itemIds = $sales_itemdata->pluck('item_id');
                $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
                $store_ids = $sales_itemdata->pluck('store_id');
                $store_view = $sales_itemdata->pluck('store_id')->first();
       
                $sale = saleExtimate::where('id', $sales_itemdata->pluck('sales_id'))->first();
    
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
                return view('admin/invoice/extimate-invoice', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
            }
public function invoice_purchase_order(Request $request ,$id){

    $logo = Coresetting::all();
    $sale = Purchase::find($id);
 
       
   
         
            $sales_itemdata = Purchaseitems_order::where('purchase_id', $id)
       
            ->get();
            $hsn_codes = $sales_itemdata->pluck('hsn_code')
            
            ->unique(); // Get unique HSN codes
            
            $response_data = []; 
            
            if ($hsn_codes->isNotEmpty()) {
                foreach ($hsn_codes as $hsn_code) {
                
                    $sales_items = Purchaseitems_order::where('hsn_code', $hsn_code)->where('purchase_id', $id)
                 
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
                return back()->with('error','No sale Item Found');
            }

            $itemIds = $sales_itemdata->pluck('item_id');
            $unit_id = Unit::whereIn('id', $sales_itemdata->pluck('unit_id'))->get();
            $store_ids = $sales_itemdata->pluck('store_id');
            $store_view = $sales_itemdata->pluck('store_id')->first();
   
            $sale = Purchase_order::where('id', $sales_itemdata->pluck('purchase_id'))->first();

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
                $customerIds = collect([$sale->supplier_id]);
                $customer = Supplier::whereIn('id', $customerIds)->get();
              
            }

        return view('admin.invoice.purchase-order-invoice', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
}
public function invoice_purchase_sale($id){
    $logo = Coresetting::all();
    $sale = purchase_order_sale::find($id);

  
         
            $sales_itemdata = purchase_order_sales_items::where('sales_id', $id)
       
            ->get();
         
           
            $hsn_codes = $sales_itemdata->pluck('hsn_code')
            
            ->unique(); 
          
            $response_data = []; 
           
            if ($hsn_codes->isNotEmpty()) {
                foreach ($hsn_codes as $hsn_code) {
                
                    $sales_items = purchase_order_sales_items::where('hsn_code', $hsn_code)->where('sales_id', $id)
               
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
   
            $sale = purchase_order_sale::where('id', $sales_itemdata->pluck('sales_id'))->first();
       

            $items = Item::whereIn('id', $itemIds)->get();
          
            $amount_pay = $sales_itemdata->first();
          
          

            $amount = $amount_pay->grand_total;
            $store = Store::whereIn('id', $store_ids)->first();
          
          

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
            return view('admin/invoice/purchase_sale', compact('unit_id','userids','response_data','tax_records','hsn_code', 'sales_itemdata', 'storeurlstore', 'qrCode', 'sale', 'pay', 'items', 'item_alqty', 'customer', 'tax', 'user', 'store', 'logo'));
}
}

