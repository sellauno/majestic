<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::get('/client', function () {
    return view('client');
})->name('client');

Route::get('/form', function () {
    return view('formclient');
})->name('formclient');

Route::get('/navs', function () {
    return view('navs');
})->name('navs');

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});