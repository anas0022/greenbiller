<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;

    protected $table ='users';
    protected $fillable =['user_id','name','mobile','role','password','warehouse','store_id','created_by'];
}
