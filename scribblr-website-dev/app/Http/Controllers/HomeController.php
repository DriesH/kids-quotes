<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Child;

use App\User;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function childrenDashboard()
    {
        $userId     = Auth::user()->id;
        $children   = User::findOrFail($userId)->Children()->get();

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
}
