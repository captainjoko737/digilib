<?php

namespace App\Http\Controllers\AboutUs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\TRACESTUDY_T_ABOUT;

class AboutUsController extends Controller
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
        $data['title'] = 'Tentang Kami';

        $data['result'] = TRACESTUDY_T_ABOUT::first();

        return view('about_us.index', $data);
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Visi dan Misi';

        $result = TRACESTUDY_T_ABOUT::where('C_ABOUT_ID', $id)->first();

        $data['result'] = $result;

        return view('about_us.edit', $data);
    }

    public function save(request $request) {

    	$json = request()->all();
    	
        unset($json['_token']);

        $save = TRACESTUDY_T_ABOUT::where('C_ABOUT_ID', $json['C_ABOUT_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Visi dan Misi');
            return redirect()->route('tentang_kami');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('tentang_kami');
        }
    }

}









