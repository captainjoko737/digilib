<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showJSON($body) {
        $json = json_decode($body, true);
        if ($json != null) {
            return $json;
        } else {
            $hasil = preg_replace("/\":\s*([a-zA-Z0-9_]+)/", "\":\"$1\"", $body);
            $json = json_decode($hasil, true);
            return $json;
        }
    }
}
