<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\File;
use App\Folder;
use App\Layanan;
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
        $todo = DB::table('subtodos')
            ->join('checklists', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->first();
            
        $foldermain = DB::table('folders')
            ->where('idProject', '=', $todo->idProject)
            ->where('kategori', '=', 'main')
            ->first();
        $folderfile = DB::table('folders')
            ->where('idProject', '=', $todo->idProject)
            ->where('kategori', '=', 'file')
            ->first();
        $foldergambar = DB::table('folders')
            ->where('idProject', '=', $todo->idProject)
            ->where('kategori', '=', 'gambar')
            ->first();
        $foldervideo = DB::table('folders')
            ->where('idProject', '=', $todo->idProject)
            ->where('kategori', '=', 'video')
            ->first();

        $file = Storage::disk("google")->url($foldermain->folderId . '/' . $folderfile->folderId);
        $gambar = Storage::disk("google")->url($foldermain->folderId . '/' . $folderfile->folderId);
        $video = Storage::disk("google")->url($foldermain->folderId . '/' . $folderfile->folderId);

        return view('fileadd', [
            'todo' => $todo,
            'file' => $file,
            'gambar' => $gambar,
            'video' => $video
        ]);
    }

    public function uploadFile(Request $request)
    {
        $time = Carbon::now();
        if ($request->fileUpload != null) {
            $extension = $request->file('fileUpload')->extension();
            $name = $time . '' . $request->judul . '.' . $extension;
            $foldermain = DB::table('folders')
                ->where('folders.idProject', '=', $request->idProject)
                ->where('folders.kategori', '=', 'main')
                ->first();

            $folder = DB::table('folders')
                ->where('folders.idProject', '=', $request->idProject)
                ->where('folders.kategori', '=', $request->kategori)
                ->first();

            Storage::disk('google')->putFileAs($foldermain->folderId . '/' . $folder->folderId, $request->file('fileUpload'), $name);
            $link = Storage::disk("google")->url($foldermain->folderId . '/' . $folder->folderId . '/' . $name);

            $checklist = Checklist::find($request->idChecklist);
            $checklist->linkFile = $link;
            $checklist->save();

            File::create([
                'idChecklist' => $request->idChecklist,
                'url' => $link,
                'namaFile' => $name
            ]);
        } else {
            $name = $time . '' . $request->judul;
            File::create([
                'idChecklist' => $request->idChecklist,
                'url' => $request->linkFile,
                'namaFile' => $name
            ]);
        }

        return redirect('/project' . '/' . $request->idProject);
    }

    public function newFile()
    {


        // Storage::disk('google')->put('test1.txt', 'Hello World');
        Storage::disk('google')->makeDirectory('NewFolder');
    }
}
