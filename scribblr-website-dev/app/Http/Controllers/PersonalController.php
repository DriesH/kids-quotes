<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DataWebsite;
use App\User;

use Auth;

use JavaScript;

class PersonalController extends Controller
{
    function index () {
        if( !Auth::user() ) {
            SendJavascript::sendJavascript('personal'); //Controller sendjavascript -> static function
            return view('homepage');
        }
        else{
            SendJavascript::sendJavascript('personal'); //Controller sendjavascript -> static function
            return view('personal.personal-dashboard');
        }
    }

    function getData () {
        $data = DataWebsite::where('name', 'Personal')->get();
        return json_encode($data);
    }

    function showBookBuilder(Request $request) {
        $allQuotes = array();

        $query = User::where( 'id', $request->user()->id )->with([ 'children', 'children.quotes' ])->get();

        foreach( $query[0]->children as $child ) {
            foreach($child->quotes as $quote) {
                array_push($allQuotes, $quote);
            }
        }

        SendJavascript::sendJavascript('personal');
        return view('personal.photobook', [
            'allQuotes' => $allQuotes
        ]);
    }

    function buyBook() {

    }

}
