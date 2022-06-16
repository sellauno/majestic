<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Comment;
use App\Jenislayanan;
use App\Project;
use App\Subchecklist;
use App\Team;
use App\Kategori;
use App\Subtodo;
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

        $subtodos = DB::table('subtodos')
            ->join('checklists', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->join('users', 'users.id', '=', 'subtodos.idUser')
            ->where('layanan.idProject', '=', $id)
            ->select('subtodos.*')
            ->get();

        // Progress
        $sum = 0;
        if ($checklists->count() != 0) {
            $sum = 100 / $checklists->count();
        }

        $a = DB::table('checklists')
            ->leftjoin('subchecklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->select('checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS nilai'), DB::raw('COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'checklists.toDO')
            ->get();

        $a = DB::table('checklists')
            // ->leftjoin('subchecklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->leftjoin(
                DB::raw('(SELECT idChecklist, idSubChecklist, COUNT(idSubChecklist) finish 
                FROM subchecklists
                WHERE subchecked = true
                GROUP BY idSubChecklist, idChecklist )
                finished'),
                function ($join) {
                    $join->on('checklists.idChecklist', '=', 'finished.idChecklist');
                }
            )
            ->select('finished.finish', 'checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS nilai'), DB::raw('COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'checklists.toDO', 'finished.finish')
            ->get();

        $total = [];
        $jumlah = 0;
        foreach ($a as $key => $all) {
            $total[$key] = $all->finish * $all->nilai;
            $jumlah += $total[$key];
        }

        $x = DB::table('checklists')
            ->where('idProject', '=', $id)
            ->select('idProject', DB::raw('COUNT(*) AS finish'))
            ->where('finish', true)
            ->groupBy('idProject');

        $b = DB::table('projects')
            ->leftJoinSub($x, 'checklists', function ($join) {
                $join->on('checklists.idProject', '=', 'projects.idProject');
            })
            ->select('finish')
            ->get();

        // End Progresss

        $kategori = Kategori::all();

        $komentar = Comment::all();

        if ($project->progres != $jumlah) {
            $p = Project::find($id);
            $p->progres = $jumlah;
            $p->save();
        }

        return view('project', [
            'id' => $id,
            'checklists' => $checklists,
            'kategori' => $kategori,
            'subchecklist' => $subchecklist,
            'subtodo' => $subtodos,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total
        ]);
    }
    public function checklistsUser($id)
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
            ->select('checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS nilai'), DB::raw('COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'checklists.toDO')
            ->get();

        $a = DB::table('checklists')
            // ->leftjoin('subchecklists', 'checklists.idChecklist', '=', 'subchecklists.idChecklist')
            ->leftjoin(
                DB::raw('(SELECT idChecklist, idSubChecklist, COUNT(idSubChecklist) finish 
                FROM subchecklists
                WHERE subchecked = true
                GROUP BY idSubChecklist, idChecklist )
                finished'),
                function ($join) {
                    $join->on('checklists.idChecklist', '=', 'finished.idChecklist');
                }
            )
            ->select('finished.finish', 'checklists.toDO', DB::raw($sum . ' / COUNT(idSubChecklist) AS nilai'), DB::raw('COUNT(idSubChecklist) AS total'))
            ->where('checklists.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'checklists.toDO', 'finished.finish')
            ->get();

        $total = [];
        $jumlah = 0;
        foreach ($a as $key => $all) {
            $total[$key] = $all->finish * $all->nilai;
            $jumlah += $total[$key];
        }

        $x = DB::table('checklists')
            ->where('idProject', '=', $id)
            ->select('idProject', DB::raw('COUNT(*) AS finish'))
            ->where('checked', true)
            ->groupBy('idProject');

        $b = DB::table('projects')
            ->leftJoinSub($x, 'checklists', function ($join) {
                $join->on('checklists.idProject', '=', 'projects.idProject');
            })
            ->select('finish')
            ->get();

        // End Progresss

        $kategori = Kategori::all();

        $komentar  = DB::table('comment')->join('users', 'comment.komentator', '=', 'users.id')->get();

        // !!! NANTI DI UNCOMMENT !!!
        if ($project->progres != $jumlah) {
            $p = Project::find($id);
            $p->progres = $jumlah;
            $p->save();
        }
        // !!! END !!!

        // dd($total);

        return view('projectuser', [
            'id' => $id,
            'checklists' => $checklists,
            'kategori' => $kategori,
            'subchecklist' => $subchecklist,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total
        ]);
    }
    public function createChecklist(Request $request)
    {
        Checklist::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'toDO' => $request->toDO,
            'finished' => null,
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
        $checklist = DB::table('checklists')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->where('checklists.idChecklist', '=', $id)
            ->first();
        $deadline = str_replace(' ', 'T', $checklist->deadline);
        $checklist->deadline = $deadline;
        $tglStart = str_replace(' ', 'T', $checklist->tglStart);
        $checklist->tglStart = $tglStart;

        $proses = Jenislayanan::find($checklist->idKategori);
        $proses = json_decode($proses->proses);

        $subtodos = Subtodo::all()
            ->where('idChecklist', '=', $id);
        if ($subtodos != null) {
            foreach ($subtodos as $subtodo) {
                $subdeadline = str_replace(' ', 'T', $subtodo->deadline);
                $subtodo->deadline = $subdeadline;
                $substart = str_replace(' ', 'T', $subtodo->start);
                $subtodo->start = $substart;
            }
        }

        $teams = DB::table('teams')
            ->join('users', 'users.id', '=', 'teams.idUser')
            ->select('users.name', 'users.id', 'users.posisi')
            ->where('teams.idProject', '=', $checklist->idProject)
            ->get();

        // dd($checklist, $proses, $teams, $subtodos);
        return view('checklistedit', [
            'checklist' => $checklist,
            'proses' => $proses,
            'teams' => $teams,
            'subtodos' => $subtodos
        ]);
    }

    public function updateChecklist(Request $request, $id)
    {
        $checklist = Checklist::find($id);
        $checklist->toDO = $request->todo;
        $checklist->tglStart = $request->tglStart;
        $checklist->deadline = $request->deadline;

        // $checklist->checked = $request->checked;
        // $string = str_replace('T', ' ', $checklist->deadline);
        // $checklist->deadline = $string;
        // $checklist->linkFile = $request->linkFile;

        $checklist->save();

        // edit sub todo yang sudah ada
        if ($request->subtodo != null) {
            foreach ($request->subtodo as $key => $value) {
                $subtodo = Subtodo::find($request->idsubtodo[$key]);
                $subtodo->subtodo = $request->subtodo[$key];
                $subtodo->idUser = $request->idUser[$key];
                $subtodo->start = $request->subtglStart[$key];
                $subtodo->deadline = $request->subdeadline[$key];
            }
        }

        // create subtodo baru
        if ($request->subtodoNew != null) {
            foreach ($request->subtodo as $key => $value) {
                Subtodo::create([
                    'idChecklist' => $id,
                    'subtodo' => $request->subtodoNew[$key],
                    'idUser' =>  $request->idUserNew[$key],
                    'start' =>  $request->subtglStartNew[$key],
                    'deadline' =>  $request->subdeadlineNew[$key],
                    'checked' => false,
                ]);
            }
        }

        return redirect('/detailproject' . '/' . $request->idProject);
    }

    public function deleteChecklist($id)
    {
        $checklist = Checklist::find($id);
        $id = $checklist->idProject;

        $project = Project::find($checklist->idProject);
        if ($checklist->finished == true) {
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
        $checklist->finished = true;
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


    // SUB TO DO
    public function createSubtodo(Request $request)
    {
        Subtodo::create($request->all());
    }

    public function editSubtodo(Request $request)
    {
        $subtodo = Subtodo::find($request->idsubtodo);
        $subtodo->idChecklist = $request->idChecklist;
        $subtodo->idUser = $request->idUser;
        $subtodo->subtodo = $request->subtodo;
        $subtodo->start = $request->start;
        $subtodo->deadline = $request->deadline;
        $subtodo->save();

        return redirect()->back();
    }

    public function deleteSubtodo($id)
    {
        $subtodo = Subtodo::find($id);
        $subtodo->delete();

        return redirect()->back();
    }

    public function checkedSubtodo($id, $idproject)
    {
        $subtodo = Subtodo::find($id);
        dd($subtodo);
        $subtodo->checked = true;
        $subtodo->save();
        
        return redirect()->back();
    }
    // END SUB TO DO
}
