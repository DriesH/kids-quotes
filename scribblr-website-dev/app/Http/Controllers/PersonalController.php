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
        $this->middleware('auth');
        $this->maxQuotesPerPrint = 10;
        $this->minQuotesPerPrint = 1;

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
        $defaultPrice = 8.99;
        $pricePerQuote = 0.2;
        $paypalFeePercent = 0.039;

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
            $quotesFee = $amountSelectedQuotes * $pricePerQuote; //fee charged for total amount of quotes
            $totalWithoutPaypalFee = $defaultPrice + $quotesFee; //total without paypal fee added
            $paypalFee = round($totalWithoutPaypalFee * $paypalFeePercent, 2); //paypal fee charged
            $endTotal = round($totalWithoutPaypalFee + $paypalFee, 2); //end total to pay

            return view('personal.photobook-payment', [
                'defaultPrice' => $defaultPrice,
                'amountSelectedQuotes' => $amountSelectedQuotes,
                'pricePerQuote' => $pricePerQuote,
                'quoteFee' => $quotesFee,
                'paypalFee' => $paypalFee,
                'endTotal' => $endTotal
            ]);
        }
    }

}
