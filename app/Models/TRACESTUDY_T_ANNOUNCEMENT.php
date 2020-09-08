<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_ANNOUNCEMENT extends Model
{

    protected $table = 'TRACESTUDY_T_ANNOUNCEMENT';

    protected $fillable = [
        'C_NEWS_ID',
        'C_NEWS_TITLE',
        'C_NEWS_SUBTITLE',
        'C_NEWS_IMAGE',
        'C_NEWS_DESCRIPTION',
        'C_NEWS_ISACTIVE'
    ];

    // public $timestamps = false;

}


