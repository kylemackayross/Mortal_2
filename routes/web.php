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
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dash-view');
    })->name('dashboard');

    Route::get('/typeform', function () {
        return view('typeform.index');
    })->name('Typeform');

    // USERS
    Route::get('/users', 'App\Http\Controllers\UserController@index')->middleware('auth')->name('users');

    Route::get('/user/create', 'App\Http\Controllers\UserController@create')->middleware('auth');
    Route::post('/user/create', 'App\Http\Controllers\UserController@store')->middleware('auth');
    Route::post('/user/edit/{id}', 'App\Http\Controllers\UserController@update')->middleware('auth');
    Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy')->middleware('auth');

    Route::get('/attach/{user_id}/{client_id}', 'App\Http\Controllers\UserController@attach_client');
    Route::post('/attach', 'App\Http\Controllers\UserController@attach_client');
    Route::post('/detach/{user_id}/{client_id}', 'App\Http\Controllers\UserController@detach_client');

    // CLIENTS
    Route::get('/clients', 'App\Http\Controllers\ClientController@index')->middleware('auth')->name('clients');
    Route::get('/client/create', 'App\Http\Controllers\ClientController@create')->middleware('auth');
    Route::post('/client/store', 'App\Http\Controllers\ClientController@store')->middleware('auth');
    Route::post('/client/edit/{id}', 'App\Http\Controllers\ClientController@update')->middleware('auth');
    Route::delete('/client/delete/{id}', 'App\Http\Controllers\ClientController@destroy')->middleware('auth');

    //PASSWORDS
    Route::get('/passwords', 'App\Http\Controllers\PasswordController@index')->middleware('auth')->name('passwords');
    Route::post('/password/create', 'App\Http\Controllers\PasswordController@store')->middleware('auth');
    Route::delete('/password/delete/{id}', 'App\Http\Controllers\PasswordController@destroy')->middleware('auth');
    Route::post('/password/edit/{id}', 'App\Http\Controllers\PasswordController@update')->middleware('auth');
    Route::post('/password/archive/{id}', 'App\Http\Controllers\PasswordController@archive')->middleware('auth');
    Route::post('/password/unarchive/{id}', 'App\Http\Controllers\PasswordController@unarchive')->middleware('auth');
    // Route::get('/passwords/get/all', 'App\Http\Controllers\PasswordController@getall');

    Route::get('/filemanager', 'App\Http\Controllers\FileManagerController@index')->middleware('auth');

    // QUICKLINKS
    Route::get('/quicklinks', 'App\Http\Controllers\QuickLinkController@index')->middleware('auth');
    Route::post('/quicklink/create', 'App\Http\Controllers\QuickLinkController@store')->middleware('auth');
    Route::delete('/quicklink/delete/{id}', 'App\Http\Controllers\QuickLinkController@destroy')->middleware('auth');
    Route::post('/quicklink/edit/{id}', 'App\Http\Controllers\QuickLinkController@update')->middleware('auth');

    // FEEDBACK
    Route::post('/report/create', 'App\Http\Controllers\FeedbackController@store')->middleware('auth');

    Route::post('/winner', 'App\Http\Controllers\FeedbackController@winner');

    Route::get('/website-calculator', function ()
    {
        return view('website-calculator.index');
    })->middleware('auth');

    Route::get('/processes', function ()
    {
        return view('processes.index');
    })->middleware('auth');
    Route::post('/processes');
});

