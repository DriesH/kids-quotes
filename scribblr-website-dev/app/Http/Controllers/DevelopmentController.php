<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DevelopmentController extends Controller
{
    function index () {
        return view('development');
    }

}
