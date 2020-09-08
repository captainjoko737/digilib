<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;
use App\Models\TRACESTUDY_T_NEWS;
use Storage;

class NewsController extends Controller
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
        $data['title'] = 'Berita';

        $data['result'] = TRACESTUDY_T_NEWS::all();

        return view('news.index', $data);
    }

    public function add() {
        
        $data['title'] = 'Tambah Data Berita';

        return view('news.add', $data);
    }

    public function create(request $request) {

        $this->validate($request, [
            'file' => 'required|file|max:1000', // max 1MB
        ]);

        $json = request()->all();

        $file = $request->file('file');

        $path = Storage::putFile(
            'public/img_news',
            $file
        );

        $json['C_NEWS_IMAGE'] = str_replace('public', 'storage', $path);

        unset($json['_token']);
        unset($json['file']);
        unset($json['_wysihtml5_mode']);

        $save = TRACESTUDY_T_NEWS::insert($json);

        if ($save) {
            return redirect()->route('berita');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('berita');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Berita';

        $result = TRACESTUDY_T_NEWS::where('C_NEWS_ID', $id)->first();

        $data['result'] = $result;

        return view('news.edit', $data);
    }

    public function save(request $request) {

        $this->validate($request, [
            'file' => 'file|max:1000', // max 7MB
        ]);

        $json = request()->all();

        if ($request->file('file') != null) {
            $file = $request->file('file');
            $path = Storage::putFile(
                'public/img_news',
                $file
            );

            $json['C_NEWS_IMAGE'] = str_replace('public', 'storage', $path);
        }else{
            unset($json['C_NEWS_IMAGE']);
        }

        unset($json['_token']);
        unset($json['file']);
        unset($json['_wysihtml5_mode']);

        $save = TRACESTUDY_T_NEWS::where('C_NEWS_ID', $json['C_NEWS_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Berita');
            return redirect()->route('berita');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('berita');
        }
    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_NEWS::where('C_NEWS_ID', $request->C_NEWS_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_NEWS_ID]);
  
    }

}









