<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DataWebsite;
use Auth;
use JavaScript;

class HomeController extends Controller
{
    function personalIndex () {
        if( !Auth::user() ) {
            SendJavascript::sendJavascript('personal'); //Controller sendjavascript -> static function
            return view('homepage');
        }
        else{
            SendJavascript::sendJavascript('personal'); //Controller sendjavascript -> static function
            return view('personal.personal-dashboard');
        }
    }

    function getPersonalData () {
        $data = DataWebsite::where('name', 'Personal')->get();
        return json_encode($data);
    }

    public function businessIndex () {
        if( !Auth::user() ) {
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('homepage');
        }
        else if(Auth::user()->hasBusiness){
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('business.business-dashboard');
        }
        else{
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('homepage');
        }
    }

    public function getBusinessData () {
        $data = DataWebsite::where('name', 'Business')->get();
        return json_encode($data);
    }
}
