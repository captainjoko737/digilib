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

class LanguageChooser extends Controller
{

    public function index() {

        $lang = request()->lang;

        app()->setLocale($lang);
        Session::put('locale', $lang);
        Session::save();
        
        return redirect()->route('home');
    }

}









