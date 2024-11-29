<?php

namespace App\Http\Controllers\store\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandPostController extends Controller
{
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
}
