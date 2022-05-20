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
    $user = App\User::first();
// $user->notify(new Newvisit("A new user has visited on your application."));
//    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Dashboard
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

// Client
Route::get('/clients', 'ClientController@allClient')->name('allClient');
Route::get('/addclient', 'ClientController@addClient')->name('addClient');
Route::post('/createclient', 'ClientController@createClient')->name('createClient');
Route::get('/editclient/{id}', 'ClientController@editClient')->name('editClient');
Route::post('/updateclient/{id}', 'ClientController@updateClient')->name('updateClient');
Route::get('/deleteclient/{id}', 'ClientController@deleteClient')->name('deleteClient');

// Project
Route::get('/projects', 'ProjectController@allProject')->name('allProject');
Route::get('/addproject', 'ProjectController@addProject')->name('addProject');
Route::post('/createproject', 'ProjectController@createProject')->name('createProject');
Route::get('/editproject/{id}', 'ProjectController@editProject')->name('editProject');
Route::post('/updateproject/{id}', 'ProjectController@updateProject')->name('updateProject');
Route::get('/deleteproject/{id}', 'ProjectController@deleteProject')->name('deleteProject');


Route::get('/checklist/{id}', 'ChecklistController@checklists')->name('project');
Route::post('/addchecklist', 'ChecklistController@createChecklist')->name('addChecklist');
Route::post('/addfile', 'ChecklistController@addFile')->name('addFile');

// Link
Route::post('/createlink', 'LinkController@createLink')->name('createLink');
Route::post('/cari', 'ProjectController@cari')->name('cari');

// Teams
Route::post('/createteam', 'TeamController@createTeam')->name('addTeam');
Route::get('/editteam/{id}', 'TeamController@editTeam')->name('editTeam');
Route::post('/updateteam/{id}', 'TeamController@updateTeam')->name('updateTeam');
Route::get('/deleteteam/{id}', 'TeamController@deleteTeam')->name('deleteTeam');

// File
Route::get('/addfile/{id}', 'FileController@addFile')->name('addFile');
Route::post('/uploadfile', 'FileController@uploadFile')->name('uploadFile');

// Komentar
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

//Account 
Route::get('/account', 'AccountController@allUser')->name('acc');

// Authentication
Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin')->name('login.post'); 
Route::get('registration', 'AuthController@registration')->name('register');
Route::post('post-registration', 'AuthController@postRegistration')->name('register.post'); 
// Route::get('dashboard', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')
    ->name('profile.update');
});   

Route::get('change-password', 'ChangePasswordController@index')->name('change.password');
Route::post('change-password', 'ChangePasswordController@store');

// Percobaan
Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Route::get('cbx', function() {
    return view('cbxcoba');
})->name('cbx');

Route::get('/add', function () {
    return view('addcoba');
})->name('add');

Route::get('/layout', function () {
    return view('coba');
})->name('layout');

Route::get('/alert', function () {
    return view('alert');
})->name('alert');
