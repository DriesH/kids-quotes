<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\User;

use Auth;

use DateTime;

class ChildController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function childrenDashboard() {
        $userId   = Auth::user()->id;
        $children = User::findOrFail($userId)->Children()->get();

        if ( $children->count() == 0 ) {
            return view('dashboard', [
              'children' => 'empty'
            ]);
        }
        else {
            return view('dashboard', [
              'children' => $children
            ]);
        }

    }

    public function newChild (Request $request) {
        $this->validate($request, [
            'childName' => 'required|max:35',
            'gender' => 'required',
        ]);

        $childName    = $request->json('childName');
        $gender       = $request->json('gender');
        $userId       = Auth::user()->id;

        $newChild = Child::create([
            'childName' => $childName,
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

    public function update ($id, Request $request) {
        $this->validate($request, [
            'childName' => 'required',
            'gender' => 'required',
        ]);

        $childNameUpdate    = $request->json('childName');
        $genderUpdate       = $request->json('gender');

        $selectedChild = Child::where('id', $id)->update([
            'childName' => $childNameUpdate,
            'gender' => $genderUpdate
        ]);

        return $selectedChild;
    }
}
