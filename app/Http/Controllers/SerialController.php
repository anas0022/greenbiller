<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Serial;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    public function serialpost(Request $request) {
        // Validate the incoming request
        $request->validate([
            'item_id' => 'required|integer',
            'slno' => 'required|array', 
            'slno.*' => 'string',
        ]);

      
        $maxToken = Serial::where('item_id', $request->input('item_id'))->max('token');

 
        $newToken = $maxToken ? $maxToken : 1;

        foreach ($request->input('slno') as $serialNumber) {
            $serial = new Serial;
            $serial->item_id = $request->input('item_id');
            $serial->slno = $serialNumber;
            $serial->token = $newToken;

            $serial->save(); 
        }

        $item = Item::find($request->input('item_id'));
        if ($item) {
            $item->slId = $newToken; 
            $item->save();
        }

  
    }


public function getSerialNumbers($id) {
    $serials = Serial::where('item_id', $id)->get(); // Assuming 'item_id' is the foreign key
    return response()->json($serials);
}
}
