<?php

namespace App\Http\Controllers;

use App\Imports\CustomerLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CustomerLedgerUploadController extends Controller
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
