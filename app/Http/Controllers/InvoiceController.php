<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Offsaleitems;
use App\Models\Purchase;
use App\Models\Purchaseitems;
use App\Models\Sale;
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

        return view('admin.instentprint.invoicepurchase', compact('purchaseItems', 'items', 'tax', 'store', 'logo'));
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


}
