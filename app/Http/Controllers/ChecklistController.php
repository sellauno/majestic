<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Google_Service_Drive_DriveFile;

class ChecklistController extends Controller
{
    public function checklists($id)
    {
        $project = DB::table('projects')
        ->join('clients', 'projects.idClient', '=', 'clients.idClient')
        ->where('projects.idProject', '=', $id)
        ->first();
        $checklists = DB::table('checklists')->where('checklists.idProject', '=', $id)->get();
        return view('project', ['checklists' => $checklists, 'project' => $project, 'id' => $id]);
    }

    public function createChecklist(Request $request)
    {
        Checklist::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'toDO' => $request->toDO,
            'checked' => null,
            'deadline' => $request->deadline,
            'linkFile' => null
        ]);
        return redirect('/checklist' . '/' . $request->idProject);
    }

    public function addFile(Request $request)
    {
        $filename = 'file';
        $data = file_get_contents($request->linkfile);
        Storage::disk('google')->put($filename, $data);

        
        return redirect('/checklist' . '/' . $request->idProject);
    }
}
