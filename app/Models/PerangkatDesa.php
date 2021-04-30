<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    protected $table='tbl_perangkat_desa';
    protected $primaryKey='id_perangkat_desa';
    protected $fillable =['id_desa','nama_perangkat_desa','nip_perangkat_desa','jabatan_perangkat_desa','no_hp_perangkat_desa','foto_perangkat_desa','password'];
}
