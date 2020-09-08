<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_SETTING extends Model
{

    protected $table = 'TRACESTUDY_T_SETTING';

    protected $fillable = [
        'C_SETTING_ID',
        'C_SETTING_KEY',
        'C_SETTING_VALUE',
        'C_SETTING_IMAGE'
    ];

    // public $timestamps = false;

}


