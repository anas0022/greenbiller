<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use Illuminate\Http\Request;
use App\Models\Category;

class catController extends Controller
{
    public function category() {
        // Fetch categories ordered by updated_at in descending order (newest first)
        $category = Category::orderBy('updated_at', 'desc')->get();
        $logo = Coresetting::all();
        return view('admin.Items.category', compact('category','logo'));
    }
    
    public function categorypost(Request $request){

      
        $brand = new category();
        $brand->category_name = $request->input('name'); 
        $brand->parent = $request->input('parent'); 
        $brand->discription = $request->input('dis'); 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category', 'public'); // Store in 'public/brand' directory
            $brand->image = $imagePath; 
        }
        if($brand->save()){
            return back()->with('success', 'Category created successfully.');
        }
        return back()->withErrors('Category Not uploaded');
    }
    public function updateStatus_cat(Request $request){
        $brands = category::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return redirect()->route('category')->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function cat_update(Request $request) 
    {
        // Retrieve the brand by its ID
        $brand = category::find($request->input('id'));
    
        if ($brand) {
            // Update brand properties
            $brand->category_name = $request->input('name');
            $brand->discription = $request->input('dis');
            
            // Check if parent input is empty and set it to category_name if so
            $parent = $request->input('parent');
            if (empty($parent)) {
                $brand->parent = $brand->category_name; // Use current category_name if parent is empty
            } else {
                $brand->parent = $parent; // Otherwise, use the provided parent value
            }
    
            // Check if an image file is provided and store it
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('brand', 'public'); // Store in 'public/brand' directory
                $brand->image = $imagePath;
            }
    
            // Save changes
            if ($brand->save()) {
                return redirect()->route('category')->with('success', 'Category updated successfully');
            }
        }
    
        // Optionally handle the case where the brand was not found
        return redirect()->route('category')->with('error', 'Category not found');
    }
    
    
        
    
    
    public function cat_delte(Request $request){
        $brand  = category::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
    
}
