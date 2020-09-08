<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\TRACESTUDY_T_NEWS;
use App\Models\TRACESTUDY_T_DASHBOARD;
use App\Models\TRACESTUDY_T_AGENDA;

class Home extends Controller
{

    public function index() {

    	$data['title'] = 'Beranda';

    	$data['news'] = TRACESTUDY_T_NEWS::where('C_NEWS_ISACTIVE', true)->limit(3)->get();
    	$data['slider'] = TRACESTUDY_T_DASHBOARD::where('C_DASHBOARD_ISACTIVE', true)->get();
    	$data['agenda'] = TRACESTUDY_T_AGENDA::where('C_AGENDA_ISACTIVE', true)->get();
// return $data;
        return view('index', $data);
    }

}









