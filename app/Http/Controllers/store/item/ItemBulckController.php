<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;

class ItemBulckController extends Controller
{
    public function item_bulkpost(Request $request)
    {
        \Log::info('Request received:', $request->all());
    
        if ($request->hasFile('excel_file')) {
            \Log::info('File uploaded:', [$request->file('excel_file')->getClientOriginalName()]);
    
            try {
                Excel::import(new ItemsImport, $request->file('excel_file'));
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
