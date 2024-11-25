<?php

namespace App\Http\Controllers\store\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareDeleteController extends Controller
{
    public function deleteware(Request $request) {
            
         
        $ware = Warehouse::find($request->input('id'));
    

        if ($ware) {
            $ware->delete();
            return redirect()->back()->with('success', 'Warehouse deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }
    }
}
