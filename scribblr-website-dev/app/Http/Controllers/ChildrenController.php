<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use \Auth;

class ChildrenController extends Controller
{
    function getChildren ()
    {
        if(Auth::check()) {
            $userId = Auth::id();

            $children = User::find($userId)->children;

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
