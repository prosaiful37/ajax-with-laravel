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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('student', 'App\Http\Controllers\StudentController');
Route::post('student-create', 'App\Http\Controllers\StudentController@store') -> name('student.create');
Route::get('student-all', 'App\Http\Controllers\StudentController@allStudent');
Route::get('student-edit/{id}', 'App\Http\Controllers\StudentController@edit');
