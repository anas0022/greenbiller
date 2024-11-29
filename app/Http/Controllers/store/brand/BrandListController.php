<?php

namespace App\Http\Controllers\store\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coresetting;
use Illuminate\Http\Request;

class BrandListController extends Controller
{
    
    public function brand(){
        $brands = Brand::all();
        $logo = Coresetting::all();
        return view('store.Items.brand',compact('brands','logo'));
    }
}
