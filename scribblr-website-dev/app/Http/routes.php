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
    return view('welcome');
});

Route::auth();

//handles homepage loading + all child loading to homepage
Route::get('children-dashboard', 'ChildController@childrenDashboard');

//API routes
Route::post('api/child', 'ChildController@newChild');
Route::get('api/child', 'ChildController@getChildren');

Route::post('api/quote', 'QuoteController@newQuote');
Route::get('api/quote/{childId}', 'QuoteController@getOldQuotes');
