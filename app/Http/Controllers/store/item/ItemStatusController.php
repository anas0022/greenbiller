<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemStatusController extends Controller
{
    public function itemstatus(Request $request){
        $item = Item::find($request->input('id'));
    
        if ($item) {
            // Toggle the status
            $item->status = $item->status == 'active' ? 'inactive' : 'active';
            $item->save();
    
            return response()->json([
                'status' => 200,
                'message' => 'Status updated successfully'
            ]);
        }
    
        return response()->json([
            'status' => 400,
            'message' => 'Status update failed'
        ], 400);
    }
}
