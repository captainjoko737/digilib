<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_DYNAMICFORM extends Model
{

    protected $table = 'TRACESTUDY_T_DYNAMICFORM';

    protected $fillable = [
        'C_DYNAMICFORM_ID',
        'C_DYNAMICFORM_URL',
        'C_DYNAMICFORM_TITLE',
        'C_DYNAMICFORM_TYPE',
		'C_DYNAMICFORM_QUESTION',
		'C_DYNAMICFORM_ANSWER',
		'C_DYNAMICFORM_ISACTIVE'
    ];

    // public $timestamps = false;

}


