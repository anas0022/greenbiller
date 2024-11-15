<?php

namespace App\Exports;

use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\FromCollection;

class WarehouseExport implements FromCollection
{
    private $rowCount;

    public function __construct($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    public function collection()
    {
        // Fetch the warehouse data and return it as a collection
        return Warehouse::select( 'name', 'address', 'mobile', 'email', 'status')->limit($this->rowCount)->get();
    }
}