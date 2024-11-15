<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Coresetting;
use App\Models\Expense;
use App\Models\Expensecat;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){

        $expense = Expense::all();
        $logo = Coresetting::all();
        return view('admin\expences\listexpences' , compact('expense','logo'));
    }
    public function expense_category(){

        $expenses = Expensecat::all();
        $logo = Coresetting::all();
        return view('admin.expences.categorylist',compact('expenses','logo'));
    }
    public  function excategory_post(Request $request){
        $request ->validate([

            'name'=>'required',
            'dis'=>'required',
           
            
        ]);
        $excategory = new Expensecat();

        $excategory -> name = $request->input('name');
        $excategory -> dis = $request->input('dis');
       if($excategory ->save()){
        return back()->with('success','expense category added');
       }
       return back()->withErrors('item not added');
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
return view('admin\expences\addexpence',compact('expenses','account','logo'));
    }
    public  function addexpense(Request $request){
        $request ->validate([
            'date'=>'required',
            'cat'=>'required',


            'for'=>'required',
            'type'=>'required',
            'account'=>'required',
            'amount'=>'required',
            're'=>'required',
            'note'=>'required',
        ]);

        $expense = new Expense();
        $expense ->date = $request->input('date');
        $expense ->category = $request->input('cat');
        $expense ->expense_for = $request->input('for');
        $expense ->payment_type = $request->input('type');
        $expense ->account = $request->input('account');
        $expense ->account = $request->input('account');
        $expense ->amount = $request->input('amount');
        $expense ->reference_no = $request->input('re');
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