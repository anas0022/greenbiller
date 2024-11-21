<?php

namespace App\Http\Controllers\store;
use App\Models\category;
use App\Models\Coresetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Store_categoryController extends Controller
{
    public function category() {
        // Fetch categories ordered by updated_at in descending order (newest first)
        $category = Category::orderBy('updated_at', 'desc')->get();
        $logo = Coresetting::all();
        return view('store.Items.category', compact('category','logo'));
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
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function cat_update(Request $request) 
    {
        $category = Category::find($request->input('id'));
    
        if ($category) {
            $category->category_name = $request->input('name');
            $category->discription = $request->input('dis');
    
            $parent = $request->input('parent');
            $category->parent = empty($parent) ? $category->category_name : $parent;
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('brand', 'public');
                $category->image = $imagePath;
            }
    
            if ($category->save()) {
                return back()->with('success', 'Category updated successfully');
            } else {
                return back()->with('error', 'Failed to update the category');
            }
        }
    
        return back()->with('error', 'Category not found');
    }
    
    
    
        
    
    
    public function cat_delte(Request $request){
        $brand  = category::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
}
