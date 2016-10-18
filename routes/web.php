<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('chat');
});

Route::post('/createMessage', 'MessageController@createMessage');
Route::get('/getNewMessage', 'MessageController@getChatNewMessage');
Route::get('/allMessages', 'MessageController@getAllMessages');

