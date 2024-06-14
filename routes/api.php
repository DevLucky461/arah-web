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

//getUser
Route::post('/check-token', 'App\Http\Controllers\Mobile\AuthenticationController@checkToken');

//register
Route::post('/register', 'App\Http\Controllers\Mobile\AuthenticationController@register');
Route::post('/get-phone', 'App\Http\Controllers\Mobile\AuthenticationController@getPhone');
Route::post('/get-phone-name-image', 'App\Http\Controllers\Mobile\AuthenticationController@getPhoneNameImage');
//room
Route::post('/view-room', 'App\Http\Controllers\Mobile\RoomController@view_room');
Route::post('/create-room-for-two', 'App\Http\Controllers\Mobile\RoomController@create_room_for_two');
Route::post('/delete-room', 'App\Http\Controllers\Mobile\RoomController@delete_room');

//group, community
Route::post('/view-group-details', 'App\Http\Controllers\Mobile\RoomController@view_group_details');
Route::post('/create-group-room', 'App\Http\Controllers\Mobile\RoomController@create_group_room');
Route::post('/delete-group-room', 'App\Http\Controllers\Mobile\RoomController@delete_group_room');
Route::post('/room-change-notification', 'App\Http\Controllers\Mobile\RoomController@room_change_notification');
Route::post('/invite-people-room', 'App\Http\Controllers\Mobile\RoomController@invite_people_room');

//group edit
Route::post('/edit-group-name', 'App\Http\Controllers\Mobile\RoomController@edit_group_name');
Route::post('/edit-group-description', 'App\Http\Controllers\Mobile\RoomController@edit_group_description');
Route::post('/edit-group-photo', 'App\Http\Controllers\Mobile\RoomController@edit_group_photo');

//user
Route::post('/view-people', 'App\Http\Controllers\Mobile\RoomController@view_people');
Route::post('/add-contact', 'App\Http\Controllers\Mobile\AuthenticationController@addContact');

//edit user profile
Route::post('/edit-profile-photo', 'App\Http\Controllers\Mobile\AuthenticationController@edit_profile_photo');
Route::post('/edit-profile-name', 'App\Http\Controllers\Mobile\AuthenticationController@edit_profile_name');
Route::post('/edit-profile-phone', 'App\Http\Controllers\Mobile\AuthenticationController@edit_profile_phone');

//message
Route::post('/view-message', 'App\Http\Controllers\Mobile\MessageController@viewMessage');
Route::post('/send-message', 'App\Http\Controllers\Mobile\MessageController@getMessage');
Route::post('/change-message-status', 'App\Http\Controllers\Mobile\MessageController@changeMessageStatus');
Route::post('/schedule-message', 'App\Http\Controllers\Mobile\MessageController@schedule_message');
Route::post('/delete-message', 'App\Http\Controllers\Mobile\MessageController@deleteMessage');
//transaction
Route::post('/view-transactions', 'App\Http\Controllers\Mobile\TransactionController@view_transactions');

//mosque
Route::post('/view-mosque', 'App\Http\Controllers\Mobile\MosqueController@view_mosque');
//debug
Route::get('/debug', 'App\Http\Controllers\DebugController@viewPage');

Route::post('/set-address-public-key', 'App\Http\Controllers\Mobile\TransactionController@get_address_public_key');

//total-bot
