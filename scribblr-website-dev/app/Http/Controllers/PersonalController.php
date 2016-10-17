<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DataWebsite;

class PersonalController extends Controller
{
    function index () {
        return view('personal');
    }

    function getData () {
        $data = DataWebsite::where('name', 'Personal')->get();
        return json_encode($data);
    }

}
