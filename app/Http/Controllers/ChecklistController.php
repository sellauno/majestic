<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Project;
use App\Subchecklist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Google_Service_Drive_DriveFile;
use Illuminate\Support\Facades\Mail;

class ChecklistController extends Controller
{
    public function checklists($id)
    {
        $idUser = auth()->user()->id;
        $role = auth()->user()->role;
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $checklists = DB::table('checklists')
            ->where('checklists.idProject', '=', $id)
            ->get();
        $links = DB::table('links')
            ->join('users', 'users.id', '=', 'links.idUser')
            ->where('links.idProject', '=', $id)
            ->get();
        $users = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.idUser')
            ->where('teams.idProject', '=', $id)
            ->where('teams.idUser', '!=', $idUser)
            ->get();
        $myprofile = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.idUser')
            ->where('teams.idProject', '=', $id)
            ->where('teams.idUser', '=', $idUser)
            ->first();
        $hak = false;
        if ($myprofile != null) {
            if ($myprofile->jabatan == 'Penanggung Jawab') {
                $hak = true;
            }
        } else if ($role == 'admin') {
            $hak = true;
        }
        $subchecklist = DB::table('subchecklists')
            ->join('checklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->where('checklists.idProject', '=', $id)
            ->select('subchecklists.*')
            ->get();

        // Progress

        $sum = 100 / $checklists->count();
        $a = DB::table('checklists')
            ->leftjoin('subchecklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->select('checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'checklists.toDO')
            ->get();

        $total = 0;
        foreach ($a as $all) {
            $total = $total + $all->total;
        }

        $percobaan = DB::table('checklists')
            ->leftjoin('subchecklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->select('checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->where('subchecklists.subchecked', '=', true)
            ->groupBy('checklists.idChecklist', 'checklists.toDO')
            ->get();

        // dd($percobaan);

        $x = DB::table('checklists')
            ->where('idProject', '=', $id)
            ->selectRaw('COUNT(*) AS total')
            ->groupBy('idProject');

        // $b = DB::table('projects')
        //     ->leftJoinSub($x, 'checklists', function ($join) {
        //         $join->on('checklists.idProject', '=', 'projects.idProject');
        //     })->get();

        // End Progress

        // dd($subchecklist);

        return view('project', [
            'id' => $id,
            'checklists' => $checklists,
            'subchecklist' => $subchecklist,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak
        ]);
    }

    public function createChecklist(Request $request)
    {
        Checklist::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'toDO' => $request->toDO,
            'checked' => null,
            'tglStart' => $request->tglStart,
            'deadline' => $request->deadline,
            'linkFile' => null
        ]);

        $project = Project::find($request->idProject);
        $project->todo = $project->todo + 1;
        $project->save();

        // $user->notify(new WelcomeEmailNotification());
        // return $user;
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
        $checklist->toDO = $request->todo;
        // $checklist->checked = $request->checked;
        // $string = str_replace('T', ' ', $checklist->deadline);
        // $checklist->deadline = $string;
        $checklist->tglStart = $request->tglStart;
        $checklist->deadline = $request->deadline;
        // $checklist->linkFile = $request->linkFile;
        $checklist->save();
        return redirect('/checklist' . '/' . $checklist->idProject);
    }

    public function deleteChecklist($id)
    {
        $checklist = Checklist::find($id);
        $id = $checklist->idProject;

        $project = Project::find($checklist->idProject);
        if ($checklist->checked == true) {
            $project->finished = $project->finished - 1;
            $project->save();
        } else {
            $project->todo = $project->todo - 1;
            $project->save();
        }


        $checklist->delete();
        return redirect('/checklist' . '/' . $id);
    }

    public function sendMail($id)
    {
        $checklist = Checklist::find($id);
        $checklist->checked = true;
        $checklist->save();
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $project = Project::find($checklist->idProject);
        $project->todo = $project->todo - 1;
        $project->finished = $project->finished + 1;
        $project->save();

        Mail::to('balqisatiq@gmail.com')->send(new \App\Mail\MyTestMail($details));
        return redirect('/dashboarduser');
    }
    public function sendMail2()
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        Mail::to('balqisatiq@gmail.com')->send(new \App\Mail\MyTestMail($details));
        return redirect('/dashboarduser');
    }

    // SUB CHECKLLIST

    public function createSubchecklist(Request $request)
    {
        Subchecklist::create([
            'idChecklist' => $request->idChecklist,
            'idUser' => $request->idUser,
            'subTodo' => $request->subTodo,
            'subchecked' => null,
            'subtglStart' => $request->subtglStart,
            'subdeadline' => $request->subdeadline
        ]);

        // $project = Project::find($request->idProject);
        // $project->todo = $project->todo + 1;
        // $project->save();

        return redirect('/checklist' . '/' . $request->idProject);
    }


    public function updateSubchecklist(Request $request, $id)
    {
        $subchecklist = Subchecklist::find($id);
        $subchecklist->subTodo = $request->subTodo;
        $subchecklist->subtglStart = $request->subtglStart;
        $subchecklist->subdeadline = $request->subdeadline;
        $check = $subchecklist->save();
        return redirect('/checklist' . '/' . $request->idProject);
    }

    public function deleteSubchecklist($idProject, $id)
    {
        $subchecklist = Subchecklist::find($id);
        $subchecklist->delete();
        return redirect('/checklist' . '/' . $idProject);
    }
}
