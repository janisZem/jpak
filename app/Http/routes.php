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

/* learning selection starts fix:delete this */

Route::post('save', 'test@save');
Route::get('/allusers', 'test@test');
/* Route::post('/save', function() {
  $data = new App\Olol;
  $data->name = Input::get("name");
  $data->email = Input::get("email");
  $data->password = Hash::make(Input::get("psw"));
  $data->save();
  }); */
Route::get('/delete/{id}', function($id) {
    $data = App\Olol::find($id);
    if ($data) {
        $data->delete();
        return "deleted";
    } else {
        return "cant find";
    }
});
Route::get('/form/', function() {
    return View::make('olol');
});
/* learning selection ends */


/* question selection  starts */

Route::get('/questions', 'questionsController@index');
Route::get('/question/{title}/{id}', ['uses' => 'questionsController@show']);
Route::get('/question/new', 'questionsController@create');
Route::post('/question/store', 'questionsController@store'); //new
Route::post('/question/update', 'questionsController@update'); //update
Route::get('/questions/admin', 'questionsController@admin');

/* question selection ends */



