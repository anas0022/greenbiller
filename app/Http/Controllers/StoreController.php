<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Currency;
use App\Models\Languages;
use App\Models\second_store;
use App\Models\Second_wareitems;
use App\Models\Store;
use App\Models\Timezone;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use Exception;
use Auth;
use Illuminate\Http\Request;

use app\Http\Controllers\WarehousrController;
use app\Http\Controllers\AccountController;
class StoreController extends Controller
{
    public function store()
    {

        $logo = Coresetting::all();
        return view('admin.store.addstore', compact('logo'));
    }
    public function store_list()
    {

        $store = Store::all();
        $logo = Coresetting::all();
        return view('admin.store.liststore', compact('store', 'logo'));
    }
    public function storeadd(Request $request)
    {
 
        $request->validate =( [
          'store_name' => 'required',
    'store_website' => 'required',
    'mobile' => 'required',
    'address' => 'required',
    'email' => 'required|email',
    'website' => 'required',
    'country' => 'required',
    'state' => 'required',
    'city' => 'required',
    'postcode' => 'required',
    'gst' => 'required',
    'app_price' => 'required'
      
        ]);  
        
        try {

            $lastSale = Store::orderBy('id', 'desc')->first();
    
            // Increment the sales code number based on the last sale code
            $lastCode = $lastSale ? intval(substr($lastSale, 7)) + 1 : 1;
            $newSalesCode = 'ST-' . str_pad($lastCode, 4, '0', STR_PAD_LEFT);
            $store_code = $newSalesCode;
    
            // Get request inputs
            $store_name = $request->input('store_name');
            $store_website = $request->input('store_website');
            $mobile = $request->input('mobile');
            $address = $request->input('address');
            $email = $request->input('email');
            $website = $request->input('website');
            $country = $request->input('country');
            $state = $request->input('state');
            $city = $request->input('city');
            $postcode = $request->input('postcode');
            $gst_no = $request->input('gst');
            $app_price = $request->input('app_price');
    
            // Create the store record
            $store = Store::create([
                'store_code' => $store_code,
                'store_name' => $store_name,
                'store_website' => $store_website,
                'mobile' => $mobile,
                'address' => $address,
                'email' => $email,
                'website' => $website,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'postcode' => $postcode,
                'gst_no' => $gst_no,
                'app_price' => $app_price
            ]);
    
            if ($store) {
                $storeIds = $store->id;
    
                // Create second_store record
                $second_store = second_store::create([
                    'store_code' => $store_code,
                    'store_name' => $store_name,
                    'store_website' => $store_website,
                    'mobile' => $mobile,
                    'address' => $address,
                    'email' => $email,
                    'website' => $website,
                    'country' => $country,
                    'state' => $state,
                    'city' => $city,
                    'postcode' => $postcode,
                    'gst_no' => $gst_no,
                    'app_price' => $app_price,
                    'store_id' => $storeIds
                ]);
    
                // Create account for the store
                $account = new Account();
                $account->parent_id = 0;
                $account->created_by = Auth()->id();
                $account->account_name = 'Main Account';
                $account->account_number = 'AC-' . $storeIds . '-0001';
                $account->opening_balance = 0.00;
                $account->type = 'system';
                $account->count_id = 1;
                $account->delete_bit = 0;
                $account->store_id = $storeIds;
                $account->note = 'Default note or description';
                $account->save();
    
                // Create the warehouse record
                $warehouse = new Warehouse();
                $warehouse->name = 'Main warehouse';
                $warehouse->store_id = $storeIds;
                $warehouse->type = 'system';
                $warehouse->address = 'address';
                $warehouse->created_by = Auth()->id();
                $warehouse->mobile = '000000000';
                $warehouse->delete_bit = 0;
                $warehouse->email = $email;
                $warehouse->save();
    
                if ($second_store) {
                    // Create second warehouse record
                    $second_warehouse = new Second_wareitems();
                    $second_warehouse->name = 'Main warehouse';
                    $second_warehouse->store_id = $second_store->id;
                    $second_warehouse->type = 'system';
                    $second_warehouse->address = 'address';
                    $second_warehouse->created_by = Auth()->id();
                    $second_warehouse->mobile = '000000000';
                    $second_warehouse->delete_bit = 0;
                    $second_warehouse->email = $email;
                    $second_warehouse->save();
    
                    // Link second store to the main store
                    $store = Store::where('id', $second_store->store_id)->first();
                    $store->second_store_id = $second_store->id;
                    $store->save();
                
    
                DB::commit();
              return back()->with('success','store added successfully');
                }
            }
        } catch (Exception $e) {
            // Handle errors and redirect back with a flash message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    


       


    

    public function storeedit(Request $request)
    {

        $store = Store::where('id', $request->input('id'))->first();
        $timezone = Timezone::all();
        $logo = Coresetting::all();
        $currency = Currency::all();
        $languages = Languages::all();
        $accounts = Account::where('status', 'active')->get();
        return view('admin.storesettings.storesettings', compact('store', 'timezone', 'currency', 'languages', 'accounts', 'logo'));

    }
    public function editstore(Request $request)
    {
        $store = Store::all();
        $store_edit = Store::find($request->input('id'));


        $store_edit->store_code = $request->input('store_code');
        $store_edit->store_name = $request->input('store_name');
        $store_edit->store_website = $request->input('store_website');
        $store_edit->mobile = $request->input('mobile');
        $store_edit->address = $request->input('address');
        $store_edit->email = $request->input('email');
        $store_edit->website = $request->input('website');
        $store_edit->country = $request->input('country');
        $store_edit->state = $request->input('state');
        $store_edit->city = $request->input('city');
        $store_edit->postcode = $request->input('postcode');
        $store_edit->gst_no = $request->input('gst');
        $store_edit->app_price = $request->input('app_price');
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('storelogo', 'public'); // Store in 'public/brand' directory
            $store_edit->logo = $imagePath;
        }
        if ($request->hasFile('signature')) {
            $imagePath = $request->file('signature')->store('signature', 'public'); // Store in 'public/brand' directory
            $store_edit->signature = $imagePath;
        }
        if ($store_edit->save()) {
            return redirect()->route('store_list')->with('success', 'store added successfully');
        }
        return redirect()->route('store_list')->with('error', 'store not found');
    }
    public function updateStatus_store(Request $request)
    {
        $brands = Store::find($request->input('id'));

        if ($brands) {
            // Toggle the status
            $brands->store_status = $brands->store_status == 'active' ? 'inactive' : 'active';
            $brands->save();

            return back()->with('success', 'Status updated successfully.');
        }

        return back()->withErrors('The status could not be updated.');
    }
    public function store_delete(Request $request)
    {
        $brand = store::where('id', $request->input('id'));

        if ($brand->delete()) {
            return back()->with('success', 'Deleted successfully');
        }
    }

}
