<?php

namespace App\Http\Controllers\store\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareStatusController extends Controller
{
    public function updateStatus(Request $request) {
        $ware = Warehouse::find($request->input('id'));
    
        if ($ware) {
            // Toggle the status
            $ware->status = $ware->status == 'active' ? 'inactive' : 'active';
            $ware->save();
    
            return redirect()->route('store_warelist')->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
}
