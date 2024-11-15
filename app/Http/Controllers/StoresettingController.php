<?php
namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Currency;
use App\Models\Languages;
use App\Models\Store;
use App\Models\Timezone;
use Illuminate\Http\Request;

class StoresettingController extends Controller
{
    public function store_settings(Request $request)
    {   $logo = Coresetting::all();
        $store = Store::where('id', $request->input('id'))->first();
        $timezoneids = Store::pluck('timezone');
        $timezone = Timezone::whereIn('id', $timezoneids)->get();
        $currencyids = Store::pluck('currency_id');
        $currency = Currency::whereIn('id', $currencyids)->get(); // Ensure 'Currency' is used instead of 'Timezone'
        $languageids = Store::pluck('language_id');
        $languages = Languages::whereIn('id', $languageids)->get();
        $accountids = Store::pluck('default_account_id');
        $accounts = Account::whereIn('id', $accountids)->get(); // Use $languages instead of $language
        return view('store.storesettings.storesettings', compact('store', 'timezone', 'currency', 'languages','accounts','logo'));
    }
    

    public function getStoreName($id)
    {
        $store = Store::find($id);
        
        if ($store) {
            return response()->json(['store_name' => $store->store_name]); // Adjust if your column name is different
        } else {
            return response()->json(['store_name' => null]); // Store not found
        }
    }


    public function storepost(Request $request){
        $store = Store::find($request->input('id'));
        if($store){
            $store->store_code = $request->input('store_code');
            $store->store_name = $request->input('store_name');
            $store->google_pay_no = $request->input('google_pay');
            $store->mobile = $request->input('mobile');
            $store->email = $request->input('email');
            $store->phone = $request->input('phone');
            $store->gst_no = $request->input('gst_no');
            $store->vat_no = $request->input('vat_no');
            $store->pan_no = $request->input('pan_no');
            $store->website = $request->input('website');
            $store->bank_details = $request->input('bank_details');
            $store->address = $request->input('address');
            $store->city = $request->input('city');
            $store->state = $request->input('state');
            $store->country = $request->input('country');
            if ($request->hasFile('signature')) {
                $imagePath = $request->file('signature')->store('signature', 'public'); // Store in 'public/brand' directory
                $store->signature = $imagePath; 
            }
            if ($request->hasFile('logo')) {
                $imagePath = $request->file('logo')->store('storelogo', 'public'); // Store in 'public/brand' directory
                $store->logo = $imagePath; 
            }
            $store->show_signature = $request->input('show_signature');
            $store->timezone = $request->input('timezone');
            $store->currency_id = $request->input('currency_id');
            $store->decimals = $request->input('decimals');
            $store->qty_decimals = $request->input('qty_decimals');
            $store->language_id = $request->input('language_id');

            $store->round_off = $request->input('round_off');
            $store->default_account_id = $request->input('default_account_id');
            $store->default_sales_discount = $request->input('default_sales_discount');
            $store->sales_invoice_format_id = $request->input('sales_invoice_format_id');
            $store->pos_invoice_format_id = $request->input('pos_invoice_format_id');
            $store->mrp_column = $request->input('mrp_column');


            
            $store->change_return = $request->input('change_return');
            $store->previous_balance_bit = $request->input('previous_balance_bit');
            $store->number_to_words = $request->input('number_to_words');
            $store->sales_invoice_footer_text = $request->input('sales_invoice_footer_text');
            $store->t_and_c_status = $request->input('t_and_c_status');
            $store->invoice_terms = $request->input('invoice_terms');
            $store->category_init = $request->input('category_init');

            $store->item_init = $request->input('item_init');
            $store->supplier_init = $request->input('supplier_init');
            $store->purchase_init = $request->input('purchase_init');
            $store->purchase_return_init = $request->input('purchase_return_init');
            $store->customer_init = $request->input('customer_init');
            $store->sales_init = $request->input('sales_init');
            $store->sales_return_init = $request->input('sales_return_init');

            $store->expense_init = $request->input('expense_init');
            $store->accounts_init = $request->input('accounts_init');
            $store->money_transfer_init = $request->input('money_transfer_init');
            $store->sales_payment_init = $request->input('sales_payment_init');
            $store->sales_return_payment_init = $request->input('sales_return_payment_init');
            $store->purchase_payment_init = $request->input('purchase_payment_init');
            $store->purchase_return_payment_init = $request->input('purchase_return_payment_init');


            $store->expense_payment_init = $request->input('expense_payment_init');
            $store->cust_advance_init = $request->input('cust_advance_init');
            $store->if_customerapp = $request->input('if_customerapp');
            $store->if_deliveryapp = $request->input('if_deliveryapp');
            $store->if_fixeddelivery = $request->input('if_fixeddelivery');
            $store->delivery_charge = $request->input('delivery_charge');
            $store->if_handlingcharge = $request->input('if_handlingcharge');

            $store->handling_charge = $request->input('handling_charge');
            $store->if_onesignal = $request->input('if_onesignal');
            $store->onesignal_id = $request->input('onesignal_id');
            $store->onesignal_key = $request->input('onesignal_key');
            $store->if_otp = $request->input('if_otp');
            $store->sms_dltid = $request->input('sms_dltid');
            $store->sms_msg = $request->input('sms_msg');

            $store->sms_senderid =$request->input('sms_senderid');
            $store->if_msg91 = $request->input('if_msg91');
            $store->msg91_apikey = $request->input('msg91_apikey');
            $store->if_cod = $request->input('if_cod');
            $store->if_pickupatstore = $request->input('if_pickupatstore');
            $store->if_model_no = $request->input('if_model_no');
            $store->if_serialno = $request->input('if_serialno');
            if($store->save()){
                return redirect()-> route('store_list')->with('success','store added successfully');
            }
            return redirect()-> route('store_list')->with('success','store added successfully');
        }
    }
}