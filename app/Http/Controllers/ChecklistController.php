<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Google_Service_Drive_DriveFile;

class ChecklistController extends Controller
{
    public function checklists($id)
    {
        $checklists = DB::table('checklists')->where('checklists.idProject', '=', $id)->get();
        return view('project', ['checklists' => $checklists, 'id' => $id]);
    }

    public function createChecklist(Request $request)
    {
        Checklist::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'toDO' => $request->toDO,
            'checked' => $request->checked,
            'deadline' => $request->deadline,
            'linkFile' => $request->linkFile
        ]);
        return redirect('/checklist' . '/' . $request->idProject);
    }

    public function addFile(Request $request)
    {
        $filename = 'file' . '.' . $request->file->getClientOriginalExtension();
        $data = file_get_contents($filename);
        Storage::disk('google')->put($filename, $data);
        return redirect('/checklist' . '/' . $request->idProject);
    }
}
