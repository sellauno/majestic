<?php

namespace App\Http\Controllers;

use App\Client;
use App\Link;
use App\Project;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function allProject()
    {
        $projects = Project::all();
        $clients = Client::all();
        $links = Link::all();
        return view('dashboard', ['projects' => $projects, 'clients' => $clients, 'links' => $links]);
    }
    public function addProject()
    {
        $clients = Client::all();
        $users = User::all();
        return view('projectadd', ['clients' => $clients, 'users' => $users]);
    }

    public function createProject(Request $request)
    {
        Project::create([
            'idClient' => $request->idClient,
            'reels' => $request->reels,
            'tiktok' => $request->tiktok,
            'feeds' => $request->feeds,
            'stories' => $request->stories,
            'tglMulai' => $request->tglMulai,
            'tglSelesai' => $request->tglSelesai,
            'idPJ' => $request->idPJ,
            'harga' => $request->harga,
            'status' => $request->status
        ]);
        
        Team::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'jabatan' => $request->jabatan
        ]);

        return redirect('/dashboard');
    }

    public function editProject($id)
    {
        $projects = DB::table('projects')
        ->join('clients', 'projects.idClient', '=', 'clients.idClient')
        ->where('projects.idproject', '=', $id)
        ->get();
        $employees = User::all()->where('role', '=', 'user');
        return view('projectedit', ['projects' => $projects, 'employees' => $employees]);
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->reels = $request->reels;
        $project->tiktok = $request->tiktok;
        $project->feeds = $request->feeds;
        $project->stories = $request->stories;
        $project->tglMulai = $request->tglMulai;
        $project->tglSelesai = $request->tglSelesai;
        $project->status = $request->status;
        $project->idPJ = $request->idPJ;
        $project->harga = $request->harga;
        $project->save();

        return redirect('/dashboard');
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/dashboard');
    }
}
