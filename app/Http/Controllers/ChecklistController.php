<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Project;
use App\User;
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
        $links = DB::table('links')
            ->join('users', 'users.id', '=', 'links.idUser')
            ->where('links.idProject', '=', $id)
            ->get();
        $users = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.idUser')
            ->where('teams.idProject', '=', $id)
            ->get();
        return view('project', [
            'id' => $id,
            'checklists' => $checklists,
            'project' => $project,
            'links' => $links,
            'users' => $users
        ]);
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

    public function editChecklist($id)
    {
        $checklist = Checklist::find($id);
        $string = str_replace(' ', 'T', $checklist->deadline);
        $checklist->deadline = $string;
        return view('checklistedit', ['checklist' => $checklist]);
    }

    public function updateChecklist(Request $request, $id)
    {
        $checklist = Checklist::find($id);
        // $checklist->idProject = $request->idProject;
        // $checklist->idUser = $request->idUser;
        $checklist->toDO = $request->todo;
        // $checklist->checked = $request->checked;
        // $string = str_replace('T', ' ', $checklist->deadline);
        // $checklist->deadline = $string;
        $checklist->deadline = $request->deadline;
        // $checklist->linkFile = $request->linkFile;
        $checklist->save();
        return redirect('/checklist' . '/' . $checklist->idProject);
    }

    public function deleteChecklist($id)
    {
        $checklist = Checklist::find($id);
        $id = $checklist->idProject;
        $checklist->delete();
        return redirect('/checklist' . '/' . $id);
    }
}
