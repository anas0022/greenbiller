<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
    use HasFactory;
    protected $table ='ledger';

    protected $fillable = ['exce_id','store_id','customer_id','customer_id','address','mobile'];
}
