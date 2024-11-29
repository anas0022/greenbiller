<?php

namespace App\Http\Controllers\store\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\CustomerLedger;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
class CustomerLedgerController extends Controller
{
    public function customer_ledger_import(Request $request)
    {
        \Log::info('Request received:', $request->all());

        if ($request->hasFile('excel_file')) {
            \Log::info('File uploaded:', [$request->file('excel_file')->getClientOriginalName()]);
    
            try {
                Excel::import(new CustomerLedger, $request->file('excel_file'));
                return back()->with('success', 'Items Imported Successfully');
            } catch (\Exception $e) {
                \Log::error('Error importing file: ' . $e->getMessage());
                return back()->with('error', 'Error importing file: ' . $e->getMessage());
            }
        }
    
        \Log::warning('No file uploaded');
        return back()->with('error', 'File not uploaded');
    }
}
