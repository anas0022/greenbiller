<?php

namespace App\Http\Controllers\store\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandEditController extends Controller
{
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
