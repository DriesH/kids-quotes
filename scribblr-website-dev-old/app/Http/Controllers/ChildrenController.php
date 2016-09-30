<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller
{

    function getChildren ()
    {
        $user = Auth::user();
        dd($user);
        if($user) {
            $children = User::find($user->id)->children;

            return json_decode($children);
        }
        else{
            return 'error boiii';
        }
    }

    /*function getChildren ()
    {
        $children = User::find(1)->children;

        return json_decode($children);

    }*/
}
