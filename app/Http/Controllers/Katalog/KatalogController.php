<?php

namespace App\Http\Controllers\Katalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\DIGILIB_T_BUKU;
use Storage;

class KatalogController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = 'Berita';

        $data['result'] = TRACESTUDY_T_NEWS::all();

        return view('news.index', $data);
    }

    public function add() {
        
        $data['title'] = 'Tambah Data Buku';
// return 'GOOOD';
        return view('katalog.add', $data);
    }

    public function create(request $request) {

        $this->validate($request, [
            'file' => 'required|file|max:1000', // max 1MB
        ]);

        $json = request()->all();

        $file = $request->file('file');

        $path = Storage::putFile(
            'public/img_book',
            $file
        );

        $json['C_BUKU_COVER'] = str_replace('public', 'storage', $path);

        unset($json['_token']);
        unset($json['file']);

        $save = DIGILIB_T_BUKU::insert($json);

        if ($save) {
            session()->flash('success', 'Anda Berhasil Menambahkan Daftar Buku');
            return redirect()->route('dashboard');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('dashboard');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Buku';

        $result = DIGILIB_T_BUKU::where('C_BUKU_ID', $id)->first();

        $data['result'] = $result;

        return view('katalog.edit', $data);
    }

    public function save(request $request) {

        $this->validate($request, [
            'file' => 'file|max:1000', // max 7MB
        ]);

        $json = request()->all();

        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = Storage::putFile(
                'public/img_book',
                $file
            );

            $json['C_BUKU_COVER'] = str_replace('public', 'storage', $path);
        }else{
            unset($json['C_BUKU_COVER']);
        }

        unset($json['_token']);
        unset($json['file']);

        $save = DIGILIB_T_BUKU::where('C_BUKU_ID', $json['C_BUKU_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Buku');
            return redirect()->route('dashboard');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('dashboard');
        }
    }

    public function drop(request $request) {

        $result = DIGILIB_T_BUKU::where('C_BUKU_ID', $request->C_BUKU_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data BUKU", 'tr'=>'tr_'.$request->C_BUKU_ID]);
  
    }

}









