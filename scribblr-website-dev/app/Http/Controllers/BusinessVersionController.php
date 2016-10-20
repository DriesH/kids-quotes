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
            SendJavascript::sendJavascript('business');
            return view('business');
        }
        else{
            SendJavascript::sendJavascript('business');
            return view('business-dashboard');
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

        return view('businessDashboard', [
            "businessQuotes" => $businessQuotes,
            "themes" => $themes
        ]);

    }

}
