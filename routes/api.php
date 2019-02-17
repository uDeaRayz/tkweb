<?php

use Illuminate\Http\Request;
use App\User;

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

Route::post('/login','ApiController@login');

Route::post('/amount','ApiController@amount');
Route::get('/province','ApiController@province');
Route::post('/district','ApiController@district');
Route::post('/subdist','ApiController@subdist');
Route::post('/showTime','ApiController@showTime');
Route::post('/showWork','ApiController@showWork');
Route::post('/showDayoff','ApiController@showDayoff');

Route::post('/upload_file', 'ApiController@uploadFile');


// อัพเดรตวันลาคเหลือ
Route::get('/date','ApiController@date');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

