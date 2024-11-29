<?php

namespace App\Http\Controllers\store\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandDeleteController extends Controller
{
    public function deletebrand(Request $request){
        $brand  = Brand::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
}
