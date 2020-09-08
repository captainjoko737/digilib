<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TRACESTUDY_T_NEWS;
use App\Models\TRACESTUDY_T_DASHBOARD;
use App\Models\TRACESTUDY_T_AGENDA;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
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
        $data['title'] = 'Beranda';

        $data['result'] = TRACESTUDY_T_DASHBOARD::all();

        return view('beranda.index', $data);
    }

    public function add() {
        
        $data['title'] = 'Tambah Data Slider';

        return view('beranda.add', $data);
    }

    public function create(request $request) {

        $this->validate($request, [
            'file' => 'required|file|max:1000', // max 1MB
        ]);

        $json = request()->all();

        $file = $request->file('file');

        $path = Storage::putFile(
            'public/img_slider',
            $file
        );

        $json['C_DASHBOARD_IMAGE'] = str_replace('public', 'storage', $path);

        unset($json['_token']);
        unset($json['file']);

        $save = TRACESTUDY_T_DASHBOARD::insert($json);

        if ($save) {
            toastr()->success('Terima Kasih, anda berhasil mendaftarkan diri');
            return redirect()->route('beranda');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('beranda');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Slider';

        $result = TRACESTUDY_T_DASHBOARD::where('C_DASHBOARD_ID', $id)->first();

        $data['result'] = $result;

        return view('beranda.edit', $data);
    }

    public function save(request $request) {

        $this->validate($request, [
            'file' => 'file|max:1000', // max 7MB
        ]);

        $json = request()->all();

        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = Storage::putFile(
                'public/img_slider',
                $file
            );

            $json['C_DASHBOARD_IMAGE'] = str_replace('public', 'storage', $path);
        }else{
            unset($json['C_DASHBOARD_IMAGE']);
        }

        unset($json['_token']);
        unset($json['file']);

        $save = TRACESTUDY_T_DASHBOARD::where('C_DASHBOARD_ID', $json['C_DASHBOARD_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Dosen');
            return redirect()->route('beranda');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('beranda');
        }
    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_DASHBOARD::where('C_DASHBOARD_ID', $request->C_DASHBOARD_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_DASHBOARD_ID]);
  
    }

}
