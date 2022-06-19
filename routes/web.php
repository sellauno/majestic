<?php

use App\Http\Controllers\ChecklistController;
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
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/dashboarduser', 'DashboardController@dashboardUser')->name('dashboarduser')->middleware('auth');

// Client
Route::get('/clients', 'ClientController@allClient')->name('allClient')->middleware('auth');
Route::get('/addclient', 'ClientController@addClient')->name('addClient')->middleware('auth');
Route::post('/createclient', 'ClientController@createClient')->name('createClient')->middleware('auth');
Route::get('/editclient/{id}', 'ClientController@editClient')->name('editClient')->middleware('auth');
Route::post('/updateclient/{id}', 'ClientController@updateClient')->name('updateClient')->middleware('auth');
Route::get('/deleteclient/{id}', 'ClientController@deleteClient')->name('deleteClient')->middleware('auth');

// Project
Route::get('/projects', 'ProjectController@allProject')->name('allProject')->middleware('auth');
Route::get('/project/{id}', 'ProjectController@project')->name('project')->middleware('auth');
Route::get('/detailproject/{id}', 'ProjectController@detailProject')->name('detailProject')->middleware('auth');
Route::get('/addproject', 'ProjectController@addProject')->name('addProject')->middleware('auth');
Route::post('/createproject', 'ProjectController@createProject')->name('createProject');
Route::get('/editproject/{id}', 'ProjectController@editProject')->name('editProject')->middleware('auth');
Route::post('/updateproject/{id}', 'ProjectController@updateProject')->name('updateProject')->middleware('auth');
Route::get('/deleteproject/{id}', 'ProjectController@deleteProject')->name('deleteProject')->middleware('auth');

//Kategori
Route::post('/createkategori', 'KategoriController@createKategori')->name('createKategori')->middleware('auth');
Route::get('/editkategori/{id}', 'KategoriController@editKategori')->name('editKategori')->middleware('auth');
Route::post('/updatekategori/{id}', 'KategoriController@updateKategori')->name('updateKategori')->middleware('auth');
Route::get('/deletekategori/{id}', 'KategoriController@deleteKategori')->name('deleteKategori')->middleware('auth');

// Checklist
// Route::get('/checklist/{id}', 'ChecklistController@checklists')->name('project')->middleware('auth');
Route::get('/checklist/{id}', 'ChecklistController@checklists')->name('checklist')->middleware('auth');
Route::post('/addchecklist', 'ChecklistController@createChecklist')->name('addChecklist')->middleware('auth');
Route::post('/addfile', 'ChecklistController@addFile')->name('addFile')->middleware('auth');
Route::get('/editchecklist/{id}', 'ChecklistController@editChecklist')->name('editChecklist')->middleware('auth');
Route::post('/updatechecklist/{id}', 'ChecklistController@updateChecklist')->name('updateChecklist')->middleware('auth');
Route::get('/deletechecklist/{id}', 'ChecklistController@deleteChecklist')->name('deleteChecklist')->middleware('auth');


Route::get('/project/user/{id}', 'ProjectController@projectUser')->name('projectUser')->middleware('auth');

// Sub To Do
Route::post('/addtodo', 'ChecklistController@createSubtodo')->name('addSubtodo')->middleware('auth');
Route::post('/updatetodo', 'ChecklistController@updateSubtodo')->name('updateSubtodo')->middleware('auth');
Route::get('/deletetodo/{id}', 'ChecklistController@deleteSubtodo')->name('deleteSubtodo')->middleware('auth');
Route::get('/checked/{id}', 'ChecklistController@checkedSubtodo')->name('checked')->middleware('auth');

// Sub Checklist
Route::post('/addsubchecklist', 'ChecklistController@createSubchecklist')->name('addSubchecklist')->middleware('auth');
Route::post('/updatesubchecklist/{id}', 'ChecklistController@updateSubchecklist')->name('updateSubchecklist')->middleware('auth');
Route::get('/deletesubchecklist/{idProject}/{id}', 'ChecklistController@deleteSubchecklist')->name('deleteSubchecklist')->middleware('auth');


// Link
Route::post('/createlink', 'LinkController@createLink')->name('createLink')->middleware('auth');
Route::post('/cari', 'ProjectController@cari')->name('cari')->middleware('auth');

// Teams
Route::post('/createteam', 'TeamController@createTeam')->name('addTeam')->middleware('auth');
Route::get('/editteam/{id}', 'TeamController@editTeam')->name('editTeam')->middleware('auth');
Route::post('/updateteam/{id}', 'TeamController@updateTeam')->name('updateTeam')->middleware('auth');
Route::get('/deleteteam/{id}', 'TeamController@deleteTeam')->name('deleteTeam')->middleware('auth');

// File
Route::get('/addfile/{id}', 'FileController@addFile')->name('addFile')->middleware('auth');
Route::post('/uploadfile', 'FileController@uploadFile')->name('uploadFile')->middleware('auth');

//Account 
Route::get('/account', 'AccountController@allUser')->name('acc')->middleware('auth');

// Report
Route::get('/report', 'ReportController@generateReport');
Route::get('/report1', 'ReportController@generateReport1');

// Layanan
Route::get('/layanan', 'LayananController@allLayanan')->name('allLayanan')->middleware('auth');
Route::get('/addlayanan', 'LayananController@addLayanan')->name('addLayanan')->middleware('auth');
Route::post('/createlayanan', 'LayananController@createLayanan')->name('createLayanan')->middleware('auth');
Route::get('/editlayanan/{id}', 'LayananController@editLayanan')->name('editLayanan')->middleware('auth');
Route::post('/updatelayanan/{id}', 'LayananController@updateLayanan')->name('updateLayanan')->middleware('auth');
Route::get('/deletelayanan/{id}', 'LayananController@deleteLayanan')->name('deleteLayanan')->middleware('auth');

// Jenis Layanan
Route::get('/jenislayanan', 'LayananController@allJenisLayanan')->name('allJenisLayanan')->middleware('auth');
Route::get('/addjenislayanan', 'LayananController@addJenisLayanan')->name('addJenisLayanan')->middleware('auth');
Route::post('/createjenislayanan', 'LayananController@createJenisLayanan')->name('createJenisLayanan')->middleware('auth');
Route::get('/editjenislayanan/{id}', 'LayananController@editJenisLayanan')->name('editJenisLayanan')->middleware('auth');
Route::post('/updatejenislayanan/{id}', 'LayananController@updateJenisLayanan')->name('updateJenisLayanan')->middleware('auth');
Route::get('/deletejenislayanan/{id}', 'LayananController@deleteJenisLayanan')->name('deleteJenisLayanan')->middleware('auth');


// Authentication
Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin')->name('login.post');
Route::get('registration', 'AuthController@registration')->name('register')->middleware('auth');
Route::post('post-registration', 'AuthController@postRegistration')->name('register.post')->middleware('auth');

//accountedit
Route::get('accountedit/{id}', 'ProfileController@editAccount')->name('editAccount')->middleware('auth');
Route::post('updateaccount/{id}', 'ProfileController@updateAccount')->name('updateAccount')->middleware('auth');
Route::get('deleteedit/{id}', 'ProfileController@deleteAccount')->name('deleteAccount')->middleware('auth');

// Route::get('dashboard', 'AuthController@dashboard')->middleware('auth'); 
Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')
        ->name('profile.update');
});

Route::get('change-password', 'ChangePasswordController@index')->name('change.password')->middleware('auth');
Route::post('change-password', 'ChangePasswordController@store')->middleware('auth');

// Percobaan

Route::get('test', function () {
    // Storage::disk('google')->put('test.txt', 'Hello World');
    // $details = Storage::disk("google")->getMetadata('test.txt');
    // $cek = $details['path'];
    // dd($cek);
    Storage::disk('google')->makeDirectory('new');
    $details = Storage::disk("google")->getMetadata('new');
    $cek = $details['path'];
    dd($cek);

});

Route::get('testfolder', function () {
    // Storage::disk('google')->put('test.txt', 'Hello World');
    // $details = Storage::disk("google")->getMetadata('test.txt');
    // $cek = $details['path'];
    // dd($cek);
    $id = '1BWpIR7YLfnDCh-bV1U9psaz5ZQjXnsib';
    Storage::disk('google')->makeDirectory($id.'/folderbaru');
    $details = Storage::disk("google")->getMetadata($id.'/folderbaru');
    $cek = $details['path'];
    dd($cek);

});

// Komentar
Route::get('/posts', 'PostController@index')->name('posts')->middleware('auth');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show')->middleware('auth');

Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('/posts', 'PostController@index')->name('posts')->middleware('auth');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show')->middleware('auth');

//Email
Route::get('send-mail/{id}', 'ChecklistController@sendMail')->name('send-mail');
Route::get('send-mail2/', 'ChecklistController@sendMail2')->name('send-mail2');
// Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from Majestic Creative',
        'body' => 'Testing email'
    ];
   
//     Mail::to('balqisatiq@gmail.com')->send(new \App\Mail\MyTestMail($details));
//    return redirect('/dashboarduser');
//     dd("Email is Sent.");
// });


//Percobaan

Route::get('cbx', function () {
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

Route::get('test1', function () {

    $documentFiles = Storage::disk('tempatfileygakandiupload')->files('\\');
    foreach ($documentFiles as $key => $documentFile) {
        if ($key == 0) {
            $path = Storage::disk('tempatfileygakandiupload')->get($documentFile);
            $file_ftp = Storage::disk('google')->put($documentFile, $path);
        }
    }
});