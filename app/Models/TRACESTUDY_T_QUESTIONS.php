<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_QUESTIONS extends Model
{

    protected $table = 'TRACESTUDY_T_QUESTIONS';

    protected $fillable = [
        'C_QUESTIONS_ID',
        'C_QUESTIONS_TITLE',
        'C_QUESTIONS_TYPE',
		'C_QUESTIONS_QUESTION',
		'C_QUESTIONS_ANSWER',
		'C_QUESTIONS_ISACTIVE'
    ];

    // public $timestamps = false;

}


