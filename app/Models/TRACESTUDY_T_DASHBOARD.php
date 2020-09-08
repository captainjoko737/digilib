<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_DASHBOARD extends Model
{

    protected $table = 'TRACESTUDY_T_DASHBOARD';

    protected $fillable = [
        'C_DASHBOARD_ID',
        'C_DASHBOARD_TITLE',
        'C_DASHBOARD_SUBTITLE',
        'C_DASHBOARD_IMAGE',
        'C_DASHBOARD_ISACTIVE'
    ];

    // public $timestamps = false;

}


