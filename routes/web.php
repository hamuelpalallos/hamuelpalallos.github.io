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

Route::get('/', 'CounterController@index')->name('counter');
Route::get('/counter', 'CounterController@index')->name('counter');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/student', 'StudentController@index')->name('student');
Route::post('/studentSubmit', 'StudentController@submit')->name('studentSubmit');
Route::post('/counterCount', 'CounterController@submit')->name('counterSubmit');

Route::get('/maintenance', 'MaintenanceController@index')->name('maintenance');
Route::post('/addTeacher', 'MaintenanceController@insert')->name('addTeacher');
Route::post('/deleteTeacher', 'MaintenanceController@delete')->name('deleteTeacher');
Route::post('/updateTeacher', 'MaintenanceController@update')->name('updateTeacher');

Route::get('/dailystat', 'StatisticController@daily')->name('dailystat');

Route::get('/weeklystat', 'StatisticController@weekly')->name('weeklystat');

Route::get('/monthlystat', 'StatisticController@monthly')->name('monthlystat');

Route::get('/yearlystat', 'StatisticController@yearly')->name('yearlystat');

Route::get('/customstat', 'StatisticController@custom')->name('customstat');
