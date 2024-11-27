<?php

namespace App\Http\Controllers\store\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function categorypost(Request $request){

      
        $brand = new Category();
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
    
}
