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

Route::get('/', 'info@html');
Route::get('/index', 'info@html');
Route::get('/form/', function() {
    return View::make('olol');
});
Route::post('/save', function() {
    $data = new App\Olol;
    $data->name = Input::get("name");
    $data->email = Input::get("email");
    $data->password = Hash::make(Input::get("psw"));
    $data->save();
});

Route::get('/allusers', 'test@test');
Route::get('/delete/{id}', function($id) {
    $data = App\Olol::find($id);
    if ($data) {
        $data->delete();
        return "deleted";
    } else {
        return "cant find";
    }
});
