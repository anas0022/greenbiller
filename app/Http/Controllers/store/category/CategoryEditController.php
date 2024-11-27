<?php

namespace App\Http\Controllers\store\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryEditController extends Controller
{
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
}
