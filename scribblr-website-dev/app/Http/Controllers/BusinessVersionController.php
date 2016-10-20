<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DataWebsite;

use Auth;

use JavaScript;

class BusinessVersionController extends Controller
{
    public function index () {
        JavaScript::put([
            'isLoggedIn' => Auth::user(),
            'currentVersion' => 'business'
        ]);
        return view('business');
    }

    public function getData () {
        $data = DataWebsite::where('name', 'Business')->get();
        return json_encode($data);
    }
}
