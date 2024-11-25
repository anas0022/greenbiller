<?php

namespace App\Http\Controllers\store\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WarePostController extends Controller
{
    public function warepost(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);


        $warehouse = new Warehouse();
        $warehouse->name = $request->input('name');
        $warehouse->store_id = Auth::user()->store_id;
        $warehouse->address = $request->input('address');
        $warehouse->created_by = Auth::user()->id;
        $warehouse->mobile = $request->input('mobile');
        $warehouse->email = $request->input('email');

      
        if ($warehouse->save()) {
            return back()->with('success', 'Warehouse added successfully');
        }

        return back()->withErrors('Failed to add the warehouse');
    }
}
