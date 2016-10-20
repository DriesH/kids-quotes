<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DataWebsite;

use Auth;

use JavaScript;

class PersonalController extends Controller
{
    function index () {
        if( !Auth::user() ) {
            SendJavascript::sendJavascript('personal');
            return view('personal');
        }
        else{
            SendJavascript::sendJavascript('personal');
            return view('personal-dashboard');
        }
    }

    function getData () {
        $data = DataWebsite::where('name', 'Personal')->get();
        return json_encode($data);
    }

}
