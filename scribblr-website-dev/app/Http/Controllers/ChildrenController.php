<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller
{

    function getChildren (Request $request)
    {
        $user = $request->user()->id;
        dd($user);
        if($user) {
            $children = User::find($user->id)->children;

            return json_decode($children);
        }
        else{
            return json_encode('error boiii');
        }
    }

    /*function getChildren ()
    {
        $children = User::find(1)->children;

        return json_decode($children);

    }*/
}
