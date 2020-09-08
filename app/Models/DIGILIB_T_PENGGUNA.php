<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DIGILIB_T_PENGGUNA extends Model
{

    protected $table = 'DIGILIB_T_PENGGUNA';

    protected $fillable = [
		'C_PENGGUNA_ID',
		'C_PENGGUNA_NOMOR_INDUK',
		'C_PENGGUNA_NAMA',
		'C_PENGGUNA_FAKULTAS',
		'C_PENGGUNA_JURUSAN',
		'C_PENGGUNA_PASSWORD',
		'C_PENGGUNA_STATUS'
    ];

    // public $timestamps = false;

}


