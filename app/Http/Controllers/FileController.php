<?php

namespace App\Http\Controllers;

use App\Checklist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Google_Client;
use Google_Service_Drive;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use League\Flysystem\Filesystem;

class FileController extends Controller
{
    public function addFile($id)
    {
        $todo = Checklist::find($id);
        return view('fileadd', ['todo' => $todo]);
    }

    public function uploadFile(Request $request)
    {
        // dd($request->file('fileUpload')->store('', 'google'));
        $time = Carbon::now();
        $extension = $request->file('fileUpload')->extension(); 
        // dd($extension);
        Storage::disk('google')->putFileAs("", $request->file('fileUpload'), $time.''.$request->judul.'.'.$extension);
        // $documentFiles = Storage::disk($request->namaFile)->files('\\');
        // foreach ($documentFiles as $key => $documentFile) {
        //     if ($key == 0) {
        //         $path = Storage::disk($request->namaFile)->get($documentFile);
        //         $file_ftp = Storage::disk('google')->put($documentFile, $path);
        //     }
        // }
    }

    public function newFile(){
        Storage::extend('google', function($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, '1KBuNtY_P4UEP0hwKkhuDQMUggYj8pH-n');

            return new Filesystem($adapter);
        });

        // Storage::disk('google')->put('test1.txt', 'Hello World');
        Storage::disk('google')->makeDirectory('NewFolder');

    }
}
