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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Dashboard
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

// Client
Route::get('/clients', 'ClientController@allClient')->name('allClient');
Route::get('/client', 'ClientController@readClient')->name('readClient');
Route::get('/addclient', 'ClientController@addClient')->name('addClient');
Route::post('/createclient', 'ClientController@createClient')->name('createClient');
Route::get('/editclient/{id}', 'ClientController@editClient')->name('editClient');
Route::post('/updateclient/{id}', 'ClientController@updateClient')->name('updateClient');
Route::get('/deleteclient/{id}', 'ClientController@deleteClient')->name('deleteClient');

// Project
Route::get('/addproject', 'ProjectController@addProject')->name('addProject');


// Percobaan
Route::get('/navs', function () {
    return view('navs');
})->name('navs');

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin')->name('login.post'); 
Route::get('registration', 'AuthController@registration')->name('register');
Route::post('post-registration', 'AuthController@postRegistration')->name('register.post'); 
Route::get('dashboard', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')
    ->name('profile.update');
});   
