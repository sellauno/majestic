<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function allProject()
    {
        $projects = Project::all();
        $clients = Client::all();
        return view('dashboard', ['projects' => $projects, 'clients' => $clients]);
    }
    public function addProject()
    {
        $clients = Client::all();
        $employees = User::all()->where('role', '=', '1');
        return view('projectadd', ['clients' => $clients, 'employees' => $employees]);
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
            'status' => $request->status
        ]);
        return redirect('/dashboard');
    }

    public function editProject($id)
    {
        $projects = DB::table('projects')
        ->join('clients', 'projects.idClient', '=', 'clients.idClient')
        ->get();
        $employees = User::all()->where('role', '=', '1');
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
