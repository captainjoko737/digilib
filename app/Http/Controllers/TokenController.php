<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\User;
use Auth;
use Carbon\Carbon;
use Log;
use Session;
use Redirect;

class TokenController extends Controller
{

    public function index() {

    	$url = config('feeder.FEEDER_URL');
		$data = array(
			"act" => "GetToken",
			"username" => config('feeder.FEEDER_USERNAME'),
			"password" => config('feeder.FEEDER_PASSWORD')
		);

		$postdata = json_encode($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$output = curl_exec($ch);
		curl_close($ch);

		$result = $this->showJSON($output);

		if ($result['error_code'] == "0") {
			return $result['data']['token'];
		}else{
			return redirect()->route('tracerstudy.index', ['error' => 'Something Went Wrong']);
		}
    }

}









