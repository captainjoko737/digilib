<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DIGILIB_T_PEMINJAMAN extends Model
{

    protected $table = 'DIGILIB_T_PEMINJAMAN';

    protected $fillable = [
		'C_PEMINJAMAN_ID',
		'C_PEMINJAM_NAMA',
		'C_PEMINJAM_NOMOR_INDUK',
		'C_PEMINJAM_FAKULTAS',
		'C_PEMINJAM_JURUSAN',
		'C_PEMINJAM_ID_BUKU',
		'C_PEMINJAM_JUDUL_BUKU',
		'C_PEMINJAM_TANGGAL_PEMINJAMAN',
		'C_PEMINJAM_DURASI',
		'C_PEMINJAM_TANGGAL_PENGEMBALIAN',
		'C_PEMINJAM_STATUS'
    ];

    // public $timestamps = false;



}


