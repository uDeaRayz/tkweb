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
Route::get('/data/get', function(){
    return response()->json(['status' => 200, 'msg' => 'connect']);
});
Route::post('/login','ApiController@login');
Route::post('/amount','ApiController@amount');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

