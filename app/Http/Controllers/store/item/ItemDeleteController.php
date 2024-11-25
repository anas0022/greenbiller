<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemDeleteController extends Controller
{
    public function deleteitem(Request $request)
    {
        try {
            $item = Item::where('id', $request->input('id'));
            
            if ($item->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item deleted successfully'
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete item'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the item'
            ]);
        }
    }
}
