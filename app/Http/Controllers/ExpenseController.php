<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Expensecat;
use App\Models\Store;
use App\Models\UserList;
Use Auth;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){

        $expense = Expense::all();
        $logo = Coresetting::all();
        $categoryIds = $expense->pluck("category")->first();
        //$userIds = $expense->pluck("created_by")->first();
        $accountIds = $expense->pluck("account")->first();
        
        $expense_category = Expensecat::where('id' ,$categoryIds)->get();
        $account = Account::where('id',$accountIds)->first();
        //$user = UserList::where('id',$userIds)->first();
      
   
        return view('admin.expences.listexpences' , compact('account','expense','logo','expense_category'));
    }
    public function expense_category(){

        $expenses = Expensecat::all();
        $parent_cat = Expensecat::where('parent_id','0')->get();
        
       $stores = Store::all();
        $logo = Coresetting::all();
        return view('admin.expences.categorylist',compact('stores','expenses','logo','parent_cat'));
    }
    public function excategory_post(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:500',
         
        ]);
    
      
        $storeId = $request->input('store_id');
    
        // Fetch the last record and determine the next ID
        $latestCustomer = Expensecat::orderBy('id', 'desc')->first();
        $lastNumber = $latestCustomer ? (int) substr($latestCustomer->id, -4) : 0;
        $nextNumber = $lastNumber + 1;
    
        // Generate the next customer code
        $nextcategory_code = 'CT-' . ($storeId ?? '0000') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    
        // Fetch the latest `count_id` and increment it
        $lastCatEntry = Expensecat::orderBy('count_id', 'desc')->first();
        $newCount = $lastCatEntry ? ($lastCatEntry->count_id + 1) : 1;
    
        // Create a new Expense Category
        $excategory = new Expensecat();
        $excategory->category_code = $nextcategory_code; // Replace with the actual column name
        $excategory->count_id = $newCount;
        $excategory->parent_id = $request->input('parent_id');
        $excategory->category_name = $request->input('name');
        $excategory->description = $request->input('detail');
        $excategory->store_id = $storeId;
        
        $excategory->created_by = Auth::id();
    
        // Save the record and return a response
        if ($excategory->save()) {
            return back()->with('success', 'Expense category added successfully.');
        }
    
        return back()->withErrors('Item could not be added.');
    }
    
    public function excategory_edit(Request $request){
        $excategory = Expensecat::find($request->input('id'));

        if($excategory){
            $excategory -> name = $request->input('name');
            $excategory -> dis = $request->input('dis');
        }
        if ($excategory->save()) {
            return back()->with('success', 'Item updated successfully');
        }
        return back()->withErrors('items not fount');

    }
    public function updateStatus_excat(Request $request){
        $brands = Expensecat::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function excategory_delete(Request $request)
    {
        $brand  = Expensecat::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }

    public function expensepost(){
        $logo = Coresetting::all();
        $expenses = Expensecat::all();
        $account = Account::all();
        $user = UserList::all();
        $expense_category = Expensecat::all();
        $store = Store::all();
        
return view('admin.expences.addexpence',compact('expenses','account','logo','user','expense_category' ,'store'  ));
    }
    public  function addexpense(Request $request){
        $request ->validate([
            'expense_date'=>'required',
            'expense_category'=>'required',
            'expense_for'=>'required',
            'payment_type'=>'required',
            'account'=>'required',
            'expense_amt'=>'required',
            'reference_no'=>'required',
            'note'=>'required',
            'expense_by'=>'required'
           
        ]);
        $latestExpense = Expense::orderBy('id', 'desc')->first();
        $lastNumber = $latestExpense ? (int) substr($latestExpense->expence_code, -4) : 0;
        $nextNumber = $lastNumber + 1;
        $code = 'EXP-' . date('Y') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $expense = new Expense();
        $expense ->date = $request->input('expense_date');
        $expense ->expence_code =$code;
        $expense ->expence_by= $request->input('expense_by');
        $expense ->category = $request->input('expense_category');
        $expense ->expense_for = $request->input('expense_for');
        $expense ->payment_type = $request->input('payment_type');
        $expense ->account = $request->input('account');
        $expense->store_id = $request->input('store_id');
    
        $expense ->amount = $request->input('expense_amt');
        $expense ->reference_no = $request->input('reference_no');
        $expense ->note = $request->input('note');
        if($expense->save()){
            return back()->with('success', 'expense added successfully');
        }
        return back()->withErrors('expense note added');
        

    }
    public function expenseedit(Request $request){
        $expenses = Expensecat::all();
        $account = Account::all();

        $items = Expense::where('id', $request->input('id'))->first();
        return view('expenseedit',compact('items','expenses','account'));
    }
    public function expenseedit_post(Request $request){
        $expense = Expense::find($request->input('id'));
        if ($expense) {
            $expense ->date = $request->input('date');
        $expense ->category = $request->input('cat');
        $expense ->expense_for = $request->input('for');
        $expense ->payment_type = $request->input('type');
        $expense ->account = $request->input('account');
        $expense ->account = $request->input('account');
        $expense ->amount = $request->input('amount');
        $expense ->reference_no = $request->input('re');
        $expense ->note = $request->input('note');
            if ($expense->save()) {
                return redirect()->route('expense')->with('success', 'Item updated successfully');
            }
            return redirect()->route('expense')->with('error', 'Item not found');
    }
}
public function expensedelete(Request $request){
    $brand  = Expense::where('id',$request->input('id'));

    if($brand->delete()){
        return back()->with('success' ,'Deleted successfully');
    }
}
}