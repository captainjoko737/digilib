<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\TRACESTUDY_T_AGENDA;

class AgendaController extends Controller
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
        $data['title'] = 'Agenda';

        $data['result'] = TRACESTUDY_T_AGENDA::all();

        return view('agenda.index', $data);
    }

    public function add() {
        
        $data['title'] = 'Tambah Data Agenda';

        return view('agenda.add', $data);
    }

    public function create(request $request) {

        $json = request()->all();

        unset($json['_token']);
        unset($json['_wysihtml5_mode']);

        $save = TRACESTUDY_T_AGENDA::insert($json);

        if ($save) {
            return redirect()->route('agenda');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('agenda.add');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Agenda';

        $result = TRACESTUDY_T_AGENDA::where('C_AGENDA_ID', $id)->first();

        $data['result'] = $result;

        return view('agenda.edit', $data);
    }

    public function save(request $request) {

        $json = request()->all();

        unset($json['_token']);
        unset($json['_wysihtml5_mode']);

        $save = TRACESTUDY_T_AGENDA::where('C_AGENDA_ID', $json['C_AGENDA_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Agenda');
            return redirect()->route('agenda');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('agenda');
        }
    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_AGENDA::where('C_AGENDA_ID', $request->C_AGENDA_ID);
        $result->delete();

        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_AGENDA_ID]);
  
    }

}









