<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Expense;
use Auth;
use App\Models\Expensecat;
class Store_expenseController extends Controller
{
    public function expense(){

        $expense = Expense::all();
        $logo = Coresetting::all();
        return view('store\expences\listexpences' , compact('expense','logo'));
    }
    public function expense_category(){

        $expenses = Expensecat::where('store_id',Auth::user()->store_id)->get();
        
        $logo = Coresetting::all();
        $parent_cat = category::all();
        return view('store.expences.categorylist',compact('expenses','logo','parent_cat'));
    }
    public  function excategory_post(Request $request){


        $lastExpense = Expensecat::where('store_id', Auth::user()->store_id)
        ->orderBy('id', 'desc')
        ->first();


    if ($lastExpense) {
        // Extract the last 4 digits from the previous expense code
        preg_match('/(\d{4})$/', $lastExpense->category_code, $matches);
        $incrementValue = $matches ? (intval($matches[0]) + 1) : 1;
    } else {
   
        $incrementValue = 1;
    }


    $expenseCode = 'CT-' . Auth::user()->store_id . '-' . str_pad($incrementValue, 4, '0', STR_PAD_LEFT);


    
        $excategory = new Expensecat();
        $excategory->store_id = Auth::user()->store_id;
        $excategory->category_code =$expenseCode;
        $excategory->count_id = Auth::user()->id;
        $excategory ->created_by   = Auth::user()->id;
        $excategory -> category_name = $request->input('name');
        $excategory -> description = $request->input('detail');
       if($excategory ->save()){
        return back()->with('success','expense category added');
       }
       return back()->withErrors('item not added');
    }
    public function excategory_edit(Request $request){
        $excategory = Expensecat::find($request->input('id'));

        if($excategory){
          
       
       
    
            $excategory -> category_name = $request->input('name');
            $excategory -> description = $request->input('dis');
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
        $category = category::all();
        $account = Account::where('store_id',Auth::user()->store_id)->get();
        
return view('store\expences\addexpence',compact('expenses','account','logo','category'));
    }
    public function addexpense(Request $request)
{
  
    $lastExpense = Expense::where('store_id', Auth::user()->store_id)
                          ->orderBy('id', 'desc')
                          ->first();


    if ($lastExpense) {
 
        preg_match('/(\d+)$/', $lastExpense->expence_code, $matches);
        $incrementValue = $matches ? (intval($matches[0]) + 1) : 1;
    } else {
        $incrementValue = 1;
    }

    $expenseCode = 'EXP-' . Auth::user()->store_id ."-" . str_pad($incrementValue, 4, '0', STR_PAD_LEFT);

    $expense = new Expense();
    $expense->date = $request->input('expense_date');
    $expense->store_id = Auth::user()->store_id;
    $expense->category = $request->input('category_id');
    $expense->expense_for = $request->input('expense_for');
    $expense->payment_type = $request->input('payment_type');
    $expense->account = $request->input('account_id');
    $expense->expence_code = $expenseCode;
    $expense->amount = $request->input('expense_amt');
    $expense->reference_no = $request->input('reference_no');
    $expense->note = $request->input('note');



    if ($expense->save()) {
        return back()->with('success', 'Expense added successfully');
    }

    return back()->withErrors('Expense not added');
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
