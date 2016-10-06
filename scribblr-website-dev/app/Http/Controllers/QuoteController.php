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


    public function getOldQuotes($childId)
    {
        $oldQuotes = Child::find($childId)->quotes()->get();
        return json_encode($oldQuotes);
    }

    public function newQuote (Request $request) {
        $quote        = $request->json('quote');
        $child_id     = $request->json('child_id');

        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => 'test',
        ]);


        return $newQuote;
    }
}
