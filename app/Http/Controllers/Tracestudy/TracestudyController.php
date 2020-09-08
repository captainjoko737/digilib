<?php

namespace App\Http\Controllers\Tracestudy;

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
use App\Models\TRACESTUDY_T_QUESTIONNAIRE;
use App\Models\TRACESTUDY_T_SETTING;

class TracestudyController extends Controller
{

	public function __construct()
    {
    	$this->middleware('auth');
        $this->getToken = new TokenController();
    }

    public function index() {

    	$data['title'] = 'Tracer Study | Kuesionare';
    	$ques = TRACESTUDY_T_QUESTIONS::all();

    	foreach ($ques as $key => $value) {
    		$question = explode ("|", $value->C_QUESTIONS_ANSWER);

    		foreach ($question as $keys => $values) {
    			if ($values != '') {
    				$question[$keys] = '- '.$values;
    			}
    		}
    		$ques[$key]['C_QUESTIONS_ANSWER'] = $question;
    	}

    	$data['result'] = $ques;
    	// return $ques;

        return view('tracerstudy.kuesionare.index')->with($data);

    }

    public function add() {
        
        $data['title'] = 'Tambah Data Kuesionare';

        return view('tracerstudy.kuesionare.add', $data);
    }

    public function create(request $request) {

        $json = request()->all();

        $answer = null;

        if (request()->C_QUESTIONS_TYPE != 'TEXTFIELD') {

        	foreach (request()->answer as $key => $value) {
        		if ($answer != null) {
        			$answer = $answer.'|'.$value;
        		}else{
        			$answer = $value;
        		}	
        	}

        	$json['C_QUESTIONS_ANSWER'] = $answer;
        }else{
        	unset($json['C_QUESTIONS_ANSWER']);
        }

        unset($json['_token']);
        unset($json['answer']);
        
        $save = TRACESTUDY_T_QUESTIONS::insert($json);

        if ($save) {
            return redirect()->route('tracerstudy.kuesionare');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('tracerstudy.kuesionare');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Kuesionare';

        $result = TRACESTUDY_T_QUESTIONS::where('C_QUESTIONS_ID', $id)->first();

        $question = explode ("|", $result['C_QUESTIONS_ANSWER']);
        foreach ($question as $keys => $values) {
			if ($values != '') {
				$question[$keys] = $values;
			}
		}
		$result['C_QUESTIONS_ANSWER'] = $question;

        $data['result'] = $result;

        return view('tracerstudy.kuesionare.edit', $data);
    }

    public function save(request $request) {

    	$json = request()->all();

        $answer = null;

        if (request()->C_QUESTIONNAIRE_TYPE != 'TEXTFIELD') {
        	
        	foreach (request()->answer as $key => $value) {
        		if ($answer != null) {
        			$answer = $answer.'|'.$value;
        		}else{
        			$answer = $value;
        		}	
        	}
        }

        unset($json['_token']);
        unset($json['file']);
        unset($json['answer']);

        $json['C_QUESTIONS_ANSWER'] = $answer;

        $save = TRACESTUDY_T_QUESTIONS::where('C_QUESTIONS_ID', $json['C_QUESTIONS_ID'])->update($json);

        if ($save) {
            return redirect()->route('tracerstudy.kuesionare');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('tracerstudy.kuesionare');
        }

    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_QUESTIONS::where('C_QUESTIONS_ID', $request->C_QUESTIONS_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_QUESTIONS_ID]);
  
    }

}









