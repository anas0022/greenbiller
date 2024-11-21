<?php
namespace App\Http\Controllers;

use App\Models\Coresetting;
use Illuminate\Http\Request;

class CoresettingsController extends Controller
{
    public function coresetting()
    {
   
        $logo = Coresetting::all();
        return view('admin.coresettings.coresetting', compact('logo'));
    }

    public function corepost(Request $request)
    {
        // Fetch the existing Coresetting record or create a new instance if it doesn’t exist
        $coreset = Coresetting::first() ?? new Coresetting();

        // Assign form data to model fields
        $coreset->site_title = $request->input('site_title');
        $coreset->version = $request->input('version');
        $coreset->site_description = $request->input('site_description');
        $coreset->siteurl = $request->input('siteurl');
        $coreset->whatsapp_no = $request->input('whatsapp_no');
        $coreset->address = $request->input('address');
        $coreset->meta_keyword = $request->input('meta_keyword');
        $coreset->meta_details = $request->input('meta_details');

        // Handle file uploads
        if ($request->hasFile('min_logo')) {
            $coreset->min_logo = $request->file('min_logo')->store('min_logo', 'public');
        }
        if ($request->hasFile('fav_icon')) {
            $coreset->fav_icon = $request->file('fav_icon')->store('fav_icon', 'public');
        }
        if ($request->hasFile('logo')) {
            $coreset->logo = $request->file('logo')->store('logo', 'public');
        }
        if ($request->hasFile('web_logo')) {
            $coreset->web_logo = $request->file('web_logo')->store('web_logo', 'public');
        }
        if ($request->hasFile('app_logo')) {
            $coreset->app_logo = $request->file('app_logo')->store('app_logo', 'public');
        }

        // Continue updating the rest of the fields
        $coreset->googlemap_API = $request->input('googlemap_API');
        $coreset->smtp_host = $request->input('smtp_host');
        $coreset->smtp_port = $request->input('smtp_port');
        $coreset->smtp_username = $request->input('smtp_username');
        $coreset->smtp_password = $request->input('smtp_password');
        $coreset->sendgrid_API = $request->input('sendgrid_API');
        $coreset->if_msg91 = $request->input('if_msg91');
        $coreset->msg91_apikey = $request->input('msg91_apikey');
        $coreset->if_textlocal = $request->input('if_textlocal');
        $coreset->textlocal_apikey = $request->input('textlocal_apikey');
        $coreset->if_greensms = $request->input('if_greensms');

        $coreset->greensms_apikey = $request->input('greensms_apikey');
        $coreset->sms_senderid = $request->input('sms_senderid');
        $coreset->sms_dltid = $request->input('sms_dltid');
        $coreset->cod_status = $request->input('cod_status');
        $coreset->bank_transfer_status = $request->input('bank_transfer_status');
        $coreset->razorpay_status = $request->input('razorpay_status');
        $coreset->razo_key_id = $request->input('razo_key_id');
        $coreset->sms_msg = $request->input('sms_msg');
        $coreset->razo_key_secret = $request->input('razo_key_secret');
        $coreset->if_googlemap = $request->input('if_googlemap');
        $coreset->site_email = $request->input('site_email');
        $coreset->ccavenue_status = $request->input('ccavenue_status');
        $coreset->ccavenue_testmode = $request->input('ccavenue_testmode');
        $coreset->ccavenue_merchant_id = $request->input('ccavenue_merchant_id');
        $coreset->ccavenue_access_code = $request->input('ccavenue_access_code');
        $coreset->ccavenue_working_key = $request->input('ccavenue_working_key');
        $coreset->if_fixeddelivery = $request->input('if_fixeddelivery');
        $coreset->delivery_charge = $request->input('delivery_charge');
        $coreset->if_handlingcharge = $request->input('if_handlingcharge');
        $coreset->handling_charge = $request->input('handling_charge');
        $coreset->if_firebase = $request->input('if_firebase');
        $coreset->firebase_API = $request->input('firebase_API');
        $coreset->firebase_config = $request->input('firebase_config');
        $coreset->if_onesignal = $request->input('if_onesignal');
        $coreset->onesignal_id = $request->input('onesignal_id');
        $coreset->onesignal_key = $request->input('onesignal_key');

        // Save the record
        if ($coreset->save()) {
            return back()->with('success', 'Core settings saved successfully');
        }
        return back()->with('error', 'Core settings not saved');
    }
}
