<?php

namespace App\Http\Controllers;

use App\Checklist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
