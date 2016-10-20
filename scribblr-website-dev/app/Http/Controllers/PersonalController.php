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
        JavaScript::put([
            'isLoggedIn' => Auth::user(),
            'currentVersion' => 'personal'
        ]);
        return view('personal');
    }

    function getData () {
        $data = DataWebsite::where('name', 'Personal')->get();
        return json_encode($data);
    }

}
