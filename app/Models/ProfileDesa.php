<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDesa extends Model
{
    protected $table = 'tbl_profile_desa';
    protected $primaryKey = 'id_profile_desa';
    protected $fillable = ['id_desa','sambutan_kepala_desa','jumlah_penduduk'];
}
