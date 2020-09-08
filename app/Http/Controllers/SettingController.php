<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TRACESTUDY_T_NEWS;
use App\Models\TRACESTUDY_T_DASHBOARD;
use App\Models\TRACESTUDY_T_SETTING;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
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
        $data['title'] = 'Pengaturan';

        $data['result'] = TRACESTUDY_T_SETTING::all();

        return view('pengaturan.index', $data);
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Pengaturan';

        $result = TRACESTUDY_T_SETTING::where('C_SETTING_ID', $id)->first();

        $data['result'] = $result;

        return view('pengaturan.edit', $data);
    }

    public function save(request $request) {

        $this->validate($request, [
            'file' => 'file|max:1000', // max 7MB
        ]);

        $json = request()->all();

        if ($request->file('file') != null) {
            $file = $request->file('file');

            $path = Storage::putFile(
                'public/img_setting',
                $file
            );

            $json['C_SETTING_IMAGE'] = str_replace('public', 'storage', $path);
        }else{
            unset($json['C_SETTING_IMAGE']);
        }

        unset($json['_token']);
        unset($json['file']);

        $save = TRACESTUDY_T_SETTING::where('C_SETTING_ID', $json['C_SETTING_ID'])->update($json);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Pengaturan');
            return redirect()->route('pengaturan');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('pengaturan');
        }
    }

}
