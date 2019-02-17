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

// user
Route::resource('/admin','AdminController');
Route::resource('/staff','StaffController');
Route::resource('/trainee','TraineeController');

// Dayoff
Route::get('/allow','DayoffController@allow')->name('allow');
Route::get('/notallow','DayoffController@notallow')->name('notallow');
Route::resource('/dayoff','DayoffController');
Route::resource('/dayoff-type','DayoffTypeController');
Route::post('/dayoff-edit','DayoffTypeController@fix')->name('edit_leave');

// position
Route::resource('/position','PositionController');
Route::post('/position-edit','PositionController@fix')->name('edit_position');

// resson
Route::resource('/resson','RessonController');
Route::post('/resson-edit','RessonController@fix')->name('edit_resson');

Route::resource('/attendance','AttenController');
Route::resource('/work','WorkController');
Route::resource('/report-staff','ReportStaffController');
Route::resource('/report-attendance','ReportAttenController');
Route::resource('/report-dayoff','ReportDayoffController');
Route::resource('/report-work','ReportWorkController');
Route::get('/report_staffs','ReportStaffController@all_pdf');
Route::get('/report_staff','ReportStaffController@staff_pdf');
Route::get('/report_trainee','ReportStaffController@trainee_pdf');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
