<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDesa extends Model
{
    protected $table = 'tbl_admin_desa';
    protected $primaryKey = 'id_desa';
    protected $fillable =['username','password','nama_desa','kode_desa','nama_kecamatan','kode_kecamatan','nama_kabupaten','kode_kabupaten','nama_provinsi','kode_provinsi','alamat_desa','email_desa','no_hp_deas'];
}
