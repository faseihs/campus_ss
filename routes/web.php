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



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::group(["middleware"=>"auth"],function(){
    Route::resource('/student','StudentController');
    Route::post('/student-list','StudentController@ajaxData')->name('student-list-ajax');

    Route::resource('/department','DepartmentController');
    Route::post('/department-list','DepartmentController@ajaxData')->name('department-list-ajax');

    Route::resource('/program','ProgramController');
    Route::post('/program-list','ProgramController@ajaxData')->name('program-list-ajax');


    Route::resource('/session','SessionTypeController');
    Route::post('/session-list','SessionTypeController@ajaxData')->name('session-list-ajax');

    Route::get('/profile', 'UserController@getProfile')->name('user-profile');
    Route::post('/profile', 'UserController@postProfile')->name('user-profile-update');
});


