<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

class ChildController extends Controller
{
    public function newChild (Request $request) {

        $data = $request->json();
        dd($data);
    }

    public function getChildren () {

    }
}
