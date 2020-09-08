<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DIGILIB_T_BUKU extends Model
{

    protected $table = 'DIGILIB_T_BUKU';

    protected $fillable = [
		'C_BUKU_ID',
		'C_BUKU_JUDUL',
		'C_BUKU_INFORMASI_UMUM',
		'C_BUKU_PENGARANG',
		'C_BUKU_TAHUN_TERBIT',
		'C_BUKU_LOKASI',
		'C_BUKU_COVER',
		'C_BUKU_STATUS_KETERSEDIAAN'
    ];

    // public $timestamps = false;

}


