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
        if (Auth::user()) {
            return redirect('business/pricing');
        }
        else {
            SendJavascript::sendJavascript('business');
            return view('business');
        }
    }

    public function getData () {
        $data = DataWebsite::where('name', 'Business')->get();
        return json_encode($data);
    }

    public function bussinesDashboard (Request $request) {

        $businessQuotes = BusinessQuote::with('quote')
                                ->with('theme')
                                ->get();

        $themes = Theme::all();
        $filter = $request->input('filter');

        if ($filter) {
            if ($filter == "random") {
                $businessQuotes = array(BusinessQuote::with('quote')
                                        ->with('theme')
                                        ->inRandomOrder()
                                        ->first());

            }
            elseif (is_numeric($filter)) {
                try {
                    $businessQuotes = BusinessQuote::where('theme_id', $filter)
                                            ->with('quote')
                                            ->with('theme')
                                            ->get();

                } catch (ModelNotFoundException $e) {
                    return view('businessDashboard')->with('message', 'Filter could not be applied, try again.');
                }

            }
        }

        SendJavascript::sendJavascript('business');
        return view('business-dashboard', [
            "businessQuotes" => $businessQuotes,
            "themes" => $themes
        ]);

    }

    public function buy (Request $request) {
        $version = $request->input('version');
        $price = "";
        $chosenVersion = "";
        $paypalFeePercent = 0.039;

        if($version == "monthly"){
            $price = 49.99;
            $chosenVersion = "monthly";
        }
        else if ($version == "yearly") {
            $price = 499.99;
            $chosenVersion = "yearly";
        }
        else if ($version == "permanent") {
            $price = 4999.99;
            $chosenVersion = "lifetime";
        }
        else {
            return redirect('/business/pricing');
        }

        $paypalFee = $price * $paypalFeePercent + 0.3;
        $roundedPaypalFee = round($paypalFee, 2);

        return view('pay-with-paypal', [
            "price" => $price,
            "paypalFee" => $roundedPaypalFee,
            "chosenVersion" => $chosenVersion
        ]);
    }


    public function pricing () {
        return view('choose-business-edition');
    }

}
