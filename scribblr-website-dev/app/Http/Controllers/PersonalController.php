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

    function __construct () {
        $this->maxQuotesPerPrint = 10;
        $this->minQuotesPerPrint = 1;

    }

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
            'allQuotes' => $allQuotes,
            'maxQuotesPerPrint' => $this->maxQuotesPerPrint,
            'minQuotesPerPrint' => $this->minQuotesPerPrint
        ]);
    }

    function buyBook(Request $request) {
        $amountSelectedQuotes = 0;
        $requestVars = $request->all();
        $pricePerQuote = 0.1;

        foreach ($requestVars as $inputVar) {
            if($inputVar == "on"){
                $amountSelectedQuotes++;
            }
        }

        if($amountSelectedQuotes > $this->maxQuotesPerPrint){
            return redirect("/personal/photobook/buy")->with("message", "You can only print a maximum of ". $this->maxQuotesPerPrint ." quotes per photobook. Please try again.");

        }
        elseif ($amountSelectedQuotes < $this->minQuotesPerPrint) {
            return redirect("/personal/photobook/buy")->with("message", "Please select at least " . $this->minQuotesPerPrint . " quote beforing printing your photobook.");
        }
        else {
            $fee = $amountSelectedQuotes * $pricePerQuote;
            return view('personal.photobook-payment', [
                'fee' => $fee
            ]);
        }
    }

}
