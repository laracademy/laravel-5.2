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
    return view('welcome', [
        'messages' => \App\Message::where('id', 1)->orderBy('created_at')->get()
    ]);
});

Route::get('/messages/all', 'MessageController@all')->name('messages.all');
Route::get('/messages/from/{id}', 'MessageController@from')->name('messages.latest');
