<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_PMMB extends Model
{

    protected $table = 'TRACESTUDY_T_PMMB';

    protected $fillable = [
        'C_PMMB_ID',
        'C_PMMB_FULLNAME',
        'C_PMMB_NIM',
		'C_PMMB_SEMESTER',
		'C_PMMB_PROGRAMSTUDI',
		'C_PMMB_IPK',
		'C_PMMB_KEAHLIAN',
        'C_PMMB_NOHP',
		'C_PMMB_EMAIL',
		'C_PMMB_DOCUMENT'
    ];

    // public $timestamps = false;

}


