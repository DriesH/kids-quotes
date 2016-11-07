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

//business edition
Route::get('business', 'HomeController@businessIndex');
Route::get('business/buy', 'BusinessVersionController@buy');
Route::post('business/buy', 'BusinessVersionController@confirmPayment');
Route::get('business/pricing', 'BusinessVersionController@pricing');

//bussiness api
Route::get('api/business/data', 'HomeController@getBusinessData');
Route::get('api/business/randomquote', 'BusinessVersionController@getRandomQuote');
Route::get('api/business/themes', 'BusinessVersionController@getThemes');

//personal edition
Route::get('personal', 'HomeController@personalIndex');

//personal api
Route::get('api/personal/data', 'HomeController@getPersonalData');

Route::post('api/child', 'ChildController@newChild');
Route::get('api/child', 'ChildController@getChildren');
Route::post('api/child/{id}/edit', 'ChildController@update');
Route::get('api/child/delete/{id}', 'ChildController@delete');

Route::post('api/quote', 'QuoteController@newQuote');
Route::get('api/quote/{childId}', 'QuoteController@getOldQuotes');
Route::get('api/quote/delete/{quoteId}', 'QuoteController@deleteQuote');

Route::get('personal/photobook/buy', 'PersonalController@showBookBuilder');
Route::post('personal/photobook/buy', 'PersonalController@buyBook');

//share
Route::get('img/{imgName}', 'ShareController@getImage');
