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

/* index paragraph selection starts */

Route::get('/', 'paragraphController@index');
Route::get('/index', 'paragraphController@index');
Route::post('/save_paragraph', 'paragraphController@store');
Route::post('/delete_paragraph', 'paragraphController@destroy');

/* index paragraph selection ends */



/* login selection starts */
Route::get('lg', function() {
    return view('login');
});
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('/lt', function() {
    Auth::logout();
});
/* login selection ends */


/* question selection  starts */

Route::get('/questions', 'questionsController@index');
Route::get('/question/{title}/{id}', ['uses' => 'questionsController@show']);
Route::get('/question/new', 'questionsController@create');
Route::post('/question/store', 'questionsController@store'); //new
Route::post('/question/update', 'questionsController@update'); //update
Route::get('/questions/admin', 'questionsController@admin');

Route::post('/answer/store', 'answersController@store'); //new
Route::post('/question/tags', 'answersController@getTags'); //find tag by name || AUTOCOMPLITE ||
Route::post('/answer/delete', 'answersController@destroy'); //new
/* question selection ends */

/* legal services */

Route::get('/legal/', 'legalController@index');

/* legal services ends */


