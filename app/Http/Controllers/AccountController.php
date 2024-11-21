<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function account(){
     
        return view('admin.account.accountadd');
    }
    public function account_post(Request $request){
        $account = new Account();

        $account -> parent_id = $request->input('parent');
        $account->created_by = Auth()->id();
        
        $account -> account_name = $request->input('name');
        $account -> account_number = $request->input('number');
        $account -> opening_balance = $request->input('balance');

        $account -> note = $request->input('note');
        if($account->save()){
            return back()->with('success'  , 'Account added successfully');
        }
        return back()->with('error','account not added');
    }
    public function account_list(Request $request) {
        // Get all accounts
        $account = Account::all();
    
        // Get the specific account based on the supplier's id from the request
        $supplier = Account::where('id', $request->input('id'))->first();
    
        // Check if supplier exists and then get the user who created it based on 'created_by'
        $user_select = null;
        if ($supplier) {
            $user_select = UserList::firstWhere('id', $supplier->created_by);
        }
    
        // Return the view with the account and user information
        return view('admin.account.accountlist', compact('account', 'user_select'));
    }
    
    public function account_status(Request $request){  $brands = Account::find($request->input('id'));
    
    if ($brands) {
        // Toggle the status
        $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
        $brands->save();

        return redirect()->route('account_list')->with('success', 'Status updated successfully.');
    }

    return back()->withErrors('The status could not be updated.');}


    public function edit_account(Request $request){
        $customer = Account::where('id', $request->input('id'))->first();
        return view('admin.account.accountedit',compact('customer'));
    }
    public function acount_edit(Request $request){
        
    $account = Account::find($request->input('id'));

    
    if ($account) {
       
        $account -> parent_accont = $request->input('parent');
        $account -> account_name = $request->input('name');
        $account -> account_number = $request->input('number');
        $account -> opening_balance = $request->input('balance');

        $account -> note = $request->input('note');

        // Save the updated customer details
        if ($account->save()) {
            return redirect()->route('account_list')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('account_list')->with('error', 'Failed to update customer');
        }
    } else {
        return redirect()->route('account_list')->with('error', 'Customer not found');
    }
    }
    public function account_delete(Request $request){
        $brand  = Account::where('id',$request->input('id'));
    
        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }}
       
}
