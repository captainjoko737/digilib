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
use App\Models\TRACESTUDY_T_DYNAMICFORM;
use App\Models\TRACESTUDY_T_QUESTIONNAIRE;
use App\Models\TRACESTUDY_T_SETTING;

class DynamicFormController extends Controller
{

	public function __construct()
    {
    	$this->middleware('auth');
        $this->getToken = new TokenController();
    }

    public function index() {

    	$data['title'] = 'Dynamic Form | Question';
    	$ques = TRACESTUDY_T_DYNAMICFORM::all();

    	foreach ($ques as $key => $value) {
    		$question = explode ("|", $value->C_DYNAMICFORM_ANSWER);

    		foreach ($question as $keys => $values) {
    			if ($values != '') {
    				$question[$keys] = '- '.$values;
    			}
    		}
    		$ques[$key]['C_DYNAMICFORM_ANSWER'] = $question;
    	}

    	$data['result'] = $ques;
    	// return $ques;

        return view('dynamic_form.question.index')->with($data);

    }

    public function add() {
        
        $data['title'] = 'Add Data Dynamic Form';

        return view('dynamic_form.question.add', $data);
    }

    public function create(request $request) {

        $json = request()->all();

        $answer = null;

        if (request()->C_DYNAMICFORM_TYPE != 'TEXTFIELD') {

        	foreach (request()->answer as $key => $value) {
        		if ($answer != null) {
        			$answer = $answer.'|'.$value;
        		}else{
        			$answer = $value;
        		}	
        	}

        	$json['C_DYNAMICFORM_ANSWER'] = $answer;
        }else{
        	unset($json['C_DYNAMICFORM_ANSWER']);
        }

        unset($json['_token']);
        unset($json['answer']);
        
        $save = TRACESTUDY_T_DYNAMICFORM::insert($json);

        if ($save) {
            return redirect()->route('dynamic_form.question');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('dynamic_form.question');
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

        return view('dynamic_form.question.edit', $data);
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
            return redirect()->route('dynamic_form.question');
        }else{
            toastr()->error('Maaf, Terjadi Kesalahan');
            return redirect()->route('dynamic_form.question');
        }

    }

    public function drop(request $request) {

        $result = TRACESTUDY_T_QUESTIONS::where('C_QUESTIONS_ID', $request->C_QUESTIONS_ID);
        $result->delete();

        // session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->C_QUESTIONS_ID]);
  
    }

}









