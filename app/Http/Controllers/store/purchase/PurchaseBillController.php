<?php

namespace App\Http\Controllers\store\purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseBillController extends Controller
{
    public function billno_exist(Request $request)
    {
        $exists = Purchase::where('bill_number', $request->input('bill_no'))->exists();

        return response()->json(['exists' => $exists]);
    }
}
