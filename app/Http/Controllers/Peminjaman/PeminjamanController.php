<?php

namespace App\Http\Controllers\Peminjaman;

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
use App\Models\DIGILIB_T_PEMINJAMAN;
use Storage;

class PeminjamanController extends Controller
{

    public function index() {
        
        $data['title'] = 'Info Peminjaman Buku';
// return 'GOOD';
        $data['list_pinjaman'] = DIGILIB_T_PEMINJAMAN::where('C_PEMINJAM_NOMOR_INDUK', Session::get('users')->C_PENGGUNA_NOMOR_INDUK)->get();
// return $data;
        return view('peminjaman_buku.index', $data);
    }

    public function add() {
        
        $data['title'] = 'Peminjaman Buku';

        $data['buku'] = DIGILIB_T_BUKU::where('C_BUKU_ID', request()->id)->first();

        return view('peminjaman_buku.add', $data);
    }

    public function create(request $request) {

        $json = request()->all();

        $json['C_PEMINJAM_TANGGAL_PENGEMBALIAN'] = Carbon::parse(request()->C_PEMINJAM_TANGGAL_PENGEMBALIAN)->addDays(request()->C_PEMINJAM_DURASI)->format('Y-m-d');
        unset($json['_token']);

        $save = DIGILIB_T_PEMINJAMAN::insert($json);

        if ($save) {
            session()->flash('success', 'Anda Behasil Meminjam Buku');
            return redirect()->route('dashboard');
        }else{
            session()->flash('error', 'Data Anda tidak ditemukan');
            return redirect()->route('dashboard');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Lowongan Kerja';

        $result = TRACESTUDY_T_VACANCY::where('C_VACANCY_ID', $id)->first();

        $data['result'] = $result;

        return view('vacancy.edit', $data);
    }

    public function save(request $request) {

        $this->validate($request, [
            'file' => 'file|max:1000', // max 7MB
        ]);

        $json = request()->all();

        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = Storage::putFile(
                'public/img_vacancy',
                $file
            );

            $json['C_VACANCY_IMAGE'] = str_replace('public', 'storage', $path);
        }else{
            unset($json['C_VACANCY_IMAGE']);
        }

        unset($json['_token']);
        unset($json['file']);
        unset($json['_wysihtml5_mode']);

        $save = TRACESTUDY_T_VACANCY::where('C_VACANCY_ID', $json['C_VACANCY_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Lowongan Kerja');
            return redirect()->route('lowongan_kerja');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('lowongan_kerja.edit');
        }
    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_VACANCY::where('C_VACANCY_ID', $request->C_VACANCY_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_VACANCY_ID]);
  
    }

}









