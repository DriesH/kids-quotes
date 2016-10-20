<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/personal');
});

Route::auth();
//fb login
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//handles homepage loading + all child loading to homepage
Route::get('dashboard', 'ChildController@childrenDashboard');

//API routes
Route::post('api/child', 'ChildController@newChild');
Route::get('api/child', 'ChildController@getChildren');

Route::post('api/quote', 'QuoteController@newQuote');
Route::get('api/quote/{childId}', 'QuoteController@getOldQuotes');





//business edition
Route::get('business', 'BusinessVersionController@index');
Route::get('business/theme/{theme_name}', 'BusinessVersionController@getQuotesByTheme');
Route::get('business/random', 'BusinessVersionController@getRandomQuote');
Route::get('api/business/data', 'BusinessVersionController@getData');

//personal edition
Route::get('personal', 'PersonalController@index');

Route::get('api/personal/data', 'PersonalController@getData');
