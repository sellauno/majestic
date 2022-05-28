<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\File;
use App\Folder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Google_Client;
use Google_Service_Drive;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function addFile($id)
    {
        $todo = Checklist::find($id);
        return view('fileadd', ['todo' => $todo]);
    }

    public function uploadFile(Request $request)
    {
        $time = Carbon::now();
        $extension = $request->file('fileUpload')->extension();
        $name = $time . '' . $request->judul . '.' . $extension;

        $folder = DB::table('folders')
            ->where('folders.idProject', '=', $request->idProject)
            ->where('folders.kategori', '=', $request->kategori)
            ->first();

        Storage::extend('google', function ($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $folder->folderId);

            return new Filesystem($adapter);
        });

        Storage::disk('google')->putFileAs("", $request->file('fileUpload'), $name);
        $link = Storage::disk("google")->url($name);

        $checklist = Checklist::find($request->idChecklist);
        $checklist->linkFile = $link;
        $checklist->save();

        File::create([
            'idChecklist' => $request->idChecklist, 
            'url' => $link, 
            'namaFile' => $name
        ]);

    }

    public function newFile()
    {
        $idfoldernya = '1KBuNtY_P4UEP0hwKkhuDQMUggYj8pH-n';
        Storage::extend('google', function ($app, $config) {
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
