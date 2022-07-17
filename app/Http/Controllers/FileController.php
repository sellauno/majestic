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
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function addFile($id)
    {
        $todo = DB::table('subtodos')
            ->join('checklists', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->where('checklists.idChecklist', '=', $id)
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
        $gambar = Storage::disk("google")->url($foldermain->folderId . '/' . $foldergambar->folderId);
        $video = Storage::disk("google")->url($foldermain->folderId . '/' . $foldervideo->folderId);

        return view('fileadd', [
            'todo' => $todo,
            'file' => $file,
            'gambar' => $gambar,
            'video' => $video
        ]);
    }

    public function uploadFile(Request $request)
    {
        // dd($request->all());
        $time = Carbon::now();
        if ($request->fileUpload != null) {
            if ($request->kategori == 'file') {
                $validator = Validator::make($request->all(), array(
                    'fileUpload' => 'max:10000'
                ));

                $validator->validate();
                // $request->validate([
                //     'email' => 'required',
                //     'password' => 'required',
                //     'fileUpload' => 'required|max:10000|mimes:application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                // ]);
            } else if ($request->kategori == 'video') {
                $validator = Validator::make($request->all(), array(
                    'fileUpload' => 'max:10000|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4'
                ));

                $validator->validate();
                // $request->validate([
                //     'email' => 'required',
                //     'password' => 'required',
                //     'fileUpload' => 'required|max:10000|mimetypes:video/avi,video/mpeg,video/quicktime'
                // ]);
            } else if ($request->kategori == 'gambar') {
                $validator = Validator::make($request->all(), array(
                    'fileUpload' => 'required|max:10000|image'
                ));

                $validator->validate();

                // $request->validate([
                //     'email' => 'required',
                //     'password' => 'required',
                //     'fileUpload' => 'required|max:10000|image'
                // ]);
            }
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
                'kategori' => $request->kategori,
                'url' => $link,
                'namaFile' => $name
            ]);
        } else {
            $name = $time . '' . $request->judul;
            File::create([
                'idChecklist' => $request->idChecklist,
                'kategori' => $request->kategori,
                'url' => $request->linkFile,
                'namaFile' => $name
            ]);
        }

        return redirect('/projectuser' .  '/' . $request->idProject);
    }

    public function newFile()
    {


        // Storage::disk('google')->put('test1.txt', 'Hello World');
        Storage::disk('google')->makeDirectory('NewFolder');
    }
}
