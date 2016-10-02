<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;
use App\User;
use App\Quote;
use File;

use Auth;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function quotesDashboard()
    {
        $userId     = Auth::user()->id;
        //$quotes   = User::findOrFail($userId)->Children()->Quotes()->get();
        $children   = User::findOrFail($userId)->Children()->get();
        /*if ( $children->count() == 0 ) {
            return view('quotes-dashboard');
        }*/

        return view('quotes-dashboard',  [
          'children' => $children
        ]);
    }

    public function newQuote (Request $request) {
        $quote        = $request->json('quote');
        $child_id     = $request->json('child_id_radio');
        $backgr_img   = "";


        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => $backgr_img,
        ]);

        return $newQuote;
    }
}
