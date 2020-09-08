<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_VACANCY extends Model
{

    protected $table = 'TRACESTUDY_T_VACANCY';

    protected $fillable = [
        'C_VACANCY_ID',
        'C_VACANCY_TITLE',
        'C_VACANCY_SUBTITLE',
        'C_VACANCY_IMAGE',
        'C_VACANCY_DESCRIPTION',
        'C_VACANCY_ISACTIVE'
    ];

    // public $timestamps = false;

}


