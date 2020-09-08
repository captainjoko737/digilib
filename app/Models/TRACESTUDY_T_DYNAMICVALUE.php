<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_DYNAMICVALUE extends Model
{

    protected $table = 'TRACESTUDY_T_DYNAMICVALUE';

    protected $fillable = [
        'C_DYNAMICVALUE_ID',
        'C_DYNAMICVALUE_NIM',
        'C_DYNAMICVALUE_NAMALENGKAP',
        'C_DYNAMICVALUE_PROGRAMSTUDI',
        'C_DYNAMICVALUE_VALUE',
        'C_DYNAMICVALUE_DOCUMENT'
    ];

}


