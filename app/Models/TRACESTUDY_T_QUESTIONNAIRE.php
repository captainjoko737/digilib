<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRACESTUDY_T_QUESTIONNAIRE extends Model
{

    protected $table = 'TRACESTUDY_T_QUESTIONNAIRE';

    protected $fillable = [
        'C_QUESTIONNAIRE_ID',
        'C_QUESTIONNAIRE_KDPTIMSMH',
        'C_QUESTIONNAIRE_KDPSTMSMH',
		'C_QUESTIONNAIRE_NIMHSMSMH',
		'C_QUESTIONNAIRE_NMMHSMSMH',
		'C_QUESTIONNAIRE_TELPOMSMH',
		'C_QUESTIONNAIRE_EMAILMSMH',
		'C_QUESTIONNAIRE_TAHUN_LULUS',
		'C_QUESTIONNAIRE_VALUE'
    ];

    // public $timestamps = false;

}


