<?php

use Illuminate\Http\Request;

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

Route::get('/data/get', function(){
    return response()->json(['status' => 200, 'msg' => 'connect']);
});

Route::post('/data/post', function(Request $request){

    return response()->json(['status' => 200, 'msg' => 'connect', 'data' => $request->email]);
});