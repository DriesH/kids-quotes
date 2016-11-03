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
    public function index () {
        if( !Auth::user() ) {
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('homepage');
        }
        else if(Auth::user()->hasBusiness){
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('business.business-dashboard');
        }
        else{
            SendJavascript::sendJavascript('business'); //Controller sendjavascript -> static function
            return view('homepage');
        }
    }

    public function getData () {
        $data = DataWebsite::where('name', 'Business')->get();
        return json_encode($data);
    }

    // public function bussinesDashboard (Request $request) {
    //
    //     $businessQuotes = BusinessQuote::with('quote')
    //     ->with('theme')
    //     ->get();
    //
    //     $themes = Theme::all();
    //     $filter = $request->input('filter');
    //
    //     if ($filter) {
    //         if ($filter == "random") {
    //             $businessQuotes = array(BusinessQuote::with('quote')
    //             ->with('theme')
    //             ->inRandomOrder()
    //             ->first());
    //
    //         }
    //         elseif (is_numeric($filter)) {
    //             try {
    //                 $businessQuotes = BusinessQuote::where('theme_id', $filter)
    //                 ->with('quote')
    //                 ->with('theme')
    //                 ->get();
    //
    //             } catch (ModelNotFoundException $e) {
    //                 return view('business.businessDashboard')->with('message', 'Filter could not be applied, try again.');
    //             }
    //
    //         }
    //     }
    //
    //
    //     return view('business.business-dashboard', [
    //         "businessQuotes" => $businessQuotes,
    //         "themes" => $themes
    //     ]);
    //
    // }

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
