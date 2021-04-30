<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    protected $table="tbl_super_admin";
    protected $fillable = ['username','password'];
}
