<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'App\Http\Controllers\GeneralController@index');
Route::get('/register', 'App\Http\Controllers\GeneralController@index');
Route::get('/en', 'App\Http\Controllers\GeneralController@setEN');
Route::get('/bi', 'App\Http\Controllers\GeneralController@setBI');
Route::get('/about-us', 'App\Http\Controllers\GeneralController@aboutUs');
Route::get('/arah-app', 'App\Http\Controllers\GeneralController@arahApp');
Route::get('/arah-coin', 'App\Http\Controllers\GeneralController@arahCoin');
Route::get('/newsroom', 'App\Http\Controllers\GeneralController@newsroom');
Route::post('/', 'App\Http\Controllers\GeneralController@subscribe');

/** ArahTest **/
Route::get('/test123', 'App\Http\Controllers\TestController@index');

Route::get('/get-number', 'App\Http\Controllers\GeneralController@getNumber');
/** coin admin **/
Route::get('/dashboard','App\Http\Controllers\CoinAdminController@dashboard')->middleware(['verified'])->name('dashboard');
Route::get('/get-certificate/{serial_number}', 'App\Http\Controllers\CertificateController@index')->middleware(['verified'])->name('getCert');


Route::post('/dashboard','App\Http\Controllers\CoinAdminController@createNewSugarDaddy')->middleware(['verified'])->name('createNewSugarDaddy');


require __DIR__.'/auth.php';
