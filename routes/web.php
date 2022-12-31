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
//Route::get('/', [App\Http\Controllers\TodoController::class, 'index'])->name('home');
    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('student', ['as' => 'student', 'uses' => 'App\Http\Controllers\StudentController@create']);
    Route::post('student', ['as' => 'student', 'uses' => 'App\Http\Controllers\StudentController@store']);
    Route::post('update-student/{id}', ['as' => 'update-student', 'uses' => 'App\Http\Controllers\StudentController@update']);
    Route::get('delete-student/{id}', ['as' => 'delete-student', 'uses' => 'App\Http\Controllers\StudentController@destroy']);
    Route::get('api-token', ['as' => 'api-token', 'uses' => 'App\Http\Controllers\ApiTokenController@update']);
});
