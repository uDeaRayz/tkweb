<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('/admin','AdminController');
Route::resource('/dayoff-type','DayoffTypeController');

Route::get('/allow','DayoffController@allow')->name('allow');
Route::get('/notallow','DayoffController@notallow')->name('notallow');

Route::resource('/staff','StaffController');





Route::resource('/trainee','TraineeController');
Route::resource('/position','PositionController');

Route::resource('/dayoff','DayoffController');
Route::resource('/resson','RessonController');
Route::resource('/attendance','AttenController');
Route::resource('/work','WorkController');
Route::resource('/report-staff','ReportStaffController');
Route::resource('/report-attendance','ReportAttenController');
Route::resource('/report-dayoff','ReportDayoffController');
Route::resource('/report-work','ReportWorkController');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
