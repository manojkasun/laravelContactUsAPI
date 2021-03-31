<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Get all messages
Route::get('messages', 'MessageController@getMessages');

// Get Messages to email

Route:: get('message/{email}', 'MessageController@getMessagesToEmail');

//add new message

Route::post('addMessage', 'MessageController@addMessage');


//update messages

Route::put('updateMessage/{id}', 'MessageController@updateMessage');
