<?php

namespace App\Http\Controllers\DynamicForm;

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
use App\Models\TRACESTUDY_T_DYNAMICFORM;
use App\Models\TRACESTUDY_T_DYNAMICVALUE;

class DynamicFormResultController extends Controller
{

	public function __construct()
    {
    	$this->middleware('auth');
        $this->getToken = new TokenController();
    }

    public function index() {

    	$data['title'] = 'Hasil FORM';
    	$ques = TRACESTUDY_T_DYNAMICFORM::select('C_DYNAMICFORM_TITLE')->where('C_DYNAMICFORM_ISACTIVE', true)->get();

        $questionnaire = TRACESTUDY_T_DYNAMICVALUE::all();

        foreach ($questionnaire as $key => $value) {
            $result = json_decode($value['C_DYNAMICVALUE_VALUE'], true);
            $answers = [];

            foreach ($ques as $keys => $values) {
                $answer = [
                    'key' => $values['C_DYNAMICFORM_TITLE'],
                    'value' => $result[$values['C_DYNAMICFORM_TITLE']]
                ];
                array_push($answers, $answer);
            }

            unset($questionnaire[$key]['C_DYNAMICVALUE_VALUE']);
            unset($questionnaire[$key]['CREATED_AT']);
            unset($questionnaire[$key]['UPDATED_AT']);

            $questionnaire[$key]['answers'] = $answers;
        }

        $data['result'] = $questionnaire;
// return $data;
        return view('dynamic_form.hasil.index')->with($data);

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









