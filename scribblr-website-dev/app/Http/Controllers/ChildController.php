<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\User;

use Auth;

class ChildController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function childrenDashboard()
    {
        $userId   = Auth::user()->id;
        $children = User::findOrFail($userId)->Children()->get();

        if ( $children->count() == 0 ) {
            return view('children-dashboard', [
              'children' => 'empty'
            ]);
        }
        else {
            return view('children-dashboard', [
              'children' => $children
            ]);
        }

    }

    public function newChild (Request $request) {
        $childName    = $request->json('childName');
        $gender       = $request->json('gender');
        $_dateOfBirth = $request->json('dateOfBirth');
        $dateOfBirth  = date_create_from_format('Y/M/d', $_dateOfBirth);
        $userId       = Auth::user()->id;

        $this->validate($request, [
        'childName' => 'required',
        'gender' => 'required',
        'dateOfBirth' => 'required|date|date_format:d-m-Y|before:today',
        ]);

        $newChild = Child::create([
            'name' => $childName,
            'dateOfBirth' => $dateOfBirth,
            'gender' => $gender,
            'user_id' => $userId
        ]);

        return $newChild;
    }

    public function getChildren () {
        $userId = Auth::user()->id;

        $userChildren = User::find($userId)->children()->get();

        return json_encode($userChildren);
    }
}
