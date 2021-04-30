<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'tbl_warga_desa';
    protected $primaryKey = 'id_warga';
    protected $fillable = ['id_desa','nama_warga','no_hp_warga','tgl_lahir_warga','alamat_warga','foto_warga','password_warga'];
}
