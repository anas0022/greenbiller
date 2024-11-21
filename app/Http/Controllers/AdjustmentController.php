<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Warehouse;
use App\Models\Adjust;
use Log;
class AdjustmentController extends Controller
{
    public function adjest() {
        // Fetch items and order them by created_at in descending order
        $items = Adjust::orderBy('created_at', 'desc')->get();
        return view('admin.stock.adjustmentlist', compact('items'));
    }
    
    public function addajustment(){
        $ware = Warehouse::all();
        $items = Item::all();
        return view('admin.stock.addajustment',compact('ware','items'));
    }
    public function searchItems(Request $request)
    {
        $searchQuery = $request->input('query');
    
        // Fetch item based on item code or item name (modify according to your database structure)
        $items = Item::where('status', 'active') // filter out inactive items
                     ->where(function ($query) use ($searchQuery) {
                         $query->where('item_code', $searchQuery)
                               ->orWhere('item_name', 'LIKE', "%{$searchQuery}%")
                               ->orWhere('barcode', 'LIKE', "%{$searchQuery}%");
                     })
                     ->get();
    
        // Return JSON response
        if ($items->isNotEmpty()) {
            return response()->json($items);
        } else {
            return response()->json(['message' => 'Item not found']);
        }
    }
    public function adjustmentview(Request $request) {
        $ware = $request->input('ware');
        $date = $request->input('date');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $re = $request->input('re');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $note = $request->input('note');
        $total = $request->input('total');
    
  
    
        return view('adjustmentview', compact('ware', 'date', 're', 'name', 'quantity', 'note', 'total', 'email', 'mobile'));
    }
public function adjust_post(Request $request)
{
    // Create a new Adjust instance
    $adjust = new Adjust();
    
    // Assign values to the model
    $adjust->warehouse = $request->input('ware');
    $adjust->email = $request->input('email');
    $adjust->mobile = $request->input('mobile');
    $adjust->date = $request->input('date');
    $adjust->reference_no = $request->input('re');
    $adjust->name = json_encode($request->input('name')); // Store names as a JSON array
    $adjust->quantity = json_encode($request->input('quantity')); // Store quantities as a JSON array
    $adjust->note = $request->input('note');
    $adjust->total = $request->input('total');

    // Gather variables
    $ware = $request->input('ware');
    $date = $request->input('date');
    $email = $request->input('email');
    $mobile = $request->input('mobile');
    $re = $request->input('re');
    $name = $request->input('name'); // Directly get the input array
    $quantity = $request->input('quantity'); // Directly get the input array
    $note = $request->input('note');
    $total = $request->input('total');
    
    // Save the adjustment
    if ($adjust->save()) {
        // Redirect to the adjustment view and pass the saved data
        return view('adjustmentview', compact('ware', 'date', 're', 'name', 'quantity', 'note', 'total','email','mobile'))
        ->with('success', 'Stock adjustment saved successfully.');
    
    }

    // If save fails, ensure variables are defined before returning
    return back()->withInput()->with('error', 'Not added')->with(compact('ware', 'date', 're', 'name', 'quantity', 'note', 'total'));
}

    public function delete_adjustment(Request $request){
        $adjust = Adjust::where('id', $request->input('id'))->first();
        if($adjust->delete()){
return back()->with('success','Deleted Successfully');
        }
        
    }
    public function transferlist(){
        $adjust = Adjust::all();
        return view('admin.stock.transferlist' ,compact('adjust'));
    }
    public function addtransfer(){
        $ware = Warehouse::all();

        return view('admin.stock.addtransfer',compact('ware'));
    }
    public function searchAdjest(Request $request)
    {
        $warehouseName = $request->input('warehouse');
        $items = Adjust::where('warehouse', 'LIKE', "%{$warehouseName}%")->get();
        return response()->json($items);
    }
    
    
}
