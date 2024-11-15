<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Coresetting;

class Store_brandController extends Controller
{
    
    public function brand(){
        $brands = Brand::all();
        $logo = Coresetting::all();
        return view('store.Items.brand',compact('brands','logo'));
    }
    public function brandpost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'dis' => 'required',
            'image' => 'required', 
        ]);
    

        $brand = new Brand();
        $brand->barndname = $request->input('name'); 
        $brand->discription = $request->input('dis'); 
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brand', 'public'); 
            $brand->image = $imagePath; 
        }
    
        if($brand->save()){
            return back()->with('success', 'Brand created successfully.');
        }
        return back()->withErrors('Brand Not uploaded');
    }
    public function updateStatus_brand(Request $request){
        $brands = Brand::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function deletebrand(Request $request){
        $brand  = Brand::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
    public function editbrand(Request $request)
    {
        $brand = Brand::where('id', $request->input('id'))->first();  // Use 'first()' instead of 'get()'
        
        if ($brand) {  // Checking if brand is found
            return view('brandedit', compact('brand'));
        } else {
            // Handle the case where the brand is not found
            return redirect()->back()->with('error', 'Brand not found');
        }
    }
    public function brand_update(Request $request) 
    {
        // Retrieve the brand by its ID
        $brand = Brand::find($request->input('id'));
    
        if ($brand) {
            // Update brand properties
            $brand->barndname = $request->input('name');
            $brand->discription = $request->input('dis');
    
            // Check if an image file is provided and store it
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('brand', 'public'); // Store in 'public/brand' directory
                $brand->image = $imagePath;
            }
    
            // Save changes
            if ($brand->save()) {
                return back()->with('success', 'Brand updated successfully');
            }
        }
    
        return back()->with('error', 'Brand not found');
    }
    
}
