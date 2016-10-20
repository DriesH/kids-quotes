<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use JavaScript;

class SendJavascript extends Controller
{
    static function sendJavascript ($currentVersion) {
        $isLoggedIn = false;
        $userName   = '';

        if(Auth::user()) {
            $isLoggedIn = true;
            $userName = Auth::user()->name;
        }
        else {
            $isLoggedIn = false;
            $userName = '';
        }

        JavaScript::put([
            'isLoggedIn' => $isLoggedIn,
            'userName' => $userName,
            'currentVersion' => $currentVersion,
        ]);
    }
}
