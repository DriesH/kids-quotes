<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\DataWebsite;
use App\User;
use App\Theme;
use App\BusinessQuote;
use Auth;

use JavaScript;

class BusinessVersionController extends Controller
{

    function __construct () {
        $this->middleware('auth');
    }

    public function buy (Request $request) {
        $version          = $request->input('version'); //get payment plan/version
        $price            = "";
        $chosenVersion    = "";
        $paypalFeePercent = 0.039;

        switch ($version) {
            case 'monthly':
                $price = 49.99;
                $chosenVersion = 'monthly';
                break;
            case 'yearly':
                $price = 499.99;
                $chosenVersion = 'yearly';
                break;
            case 'permanent':
                $price = 4999.99;
                $chosenVersion = 'permanent';
                break;
            default:
                return redirect('/business/pricing');
                break;
        }

        $paypalFee = $price * $paypalFeePercent + 0.3;
        $roundedPaypalFee = round($paypalFee, 2);

        return view('business.pay-with-paypal', [
            "price" => $price,
            "paypalFee" => $roundedPaypalFee,
            "chosenVersion" => $chosenVersion
        ]);
    }

    public function confirmPayment(Request $request) {
        $paymentConfirmed = $request->payment_confirmed;

        $user = User::where('id', $request->user()->id)->first();

        if($paymentConfirmed) {
            $user->hasBusiness = 1;
        }
        else{
            $user->hasBusiness = 0;
        }

        $user->save();

        return redirect('/business');
    }

    public function pricing () {
        return view('business.choose-business-edition');
    }

    public function getRandomQuote () {
        try{
            $businessQuotes = BusinessQuote::with('quote')
            ->with('theme')
            ->get();
        }
        catch(\Exception $e) {
            return $e;
        }
        return $businessQuotes;
    }

    public function getThemes () {
        try{
            $themes = Theme::all();
        }
        catch(\Exception $e) {
            return 'Error';
        }
        return $themes;
    }
}
