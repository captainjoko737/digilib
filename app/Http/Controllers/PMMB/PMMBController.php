<?php

namespace App\Http\Controllers\PMMB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\TRACESTUDY_T_QUESTIONS;
use App\Models\TRACESTUDY_T_PMMB;
use App\Models\TRACESTUDY_T_SETTING;
use Illuminate\Support\Facades\Storage;

class PMMBController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = 'Program Mahasiswa Magang Bersertifikat';

        $data['result'] = TRACESTUDY_T_PMMB::all();

        return view('pmmb.index', $data);
    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_PMMB::where('C_PMMB_ID', $request->C_PMMB_ID);
        $result->delete();

        return response()->json(['success'=>"Berhasil Menghapus Data PMMB", 'tr'=>'tr_'.$request->C_PMMB_ID]);
  
    }

}









