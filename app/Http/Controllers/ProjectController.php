<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addProject()
    {
        $clients = Client::all();
        $employees = User::all()->where('role', '=', '1');
        return view('projectadd', ['clients' => $clients, 'employees' => $employees]);
    }

    public function createProject(Request $request, $id)
    {
        Project::create([
            'reels' => $request->reels,
            'tiktok' => $request->tiktok,
            'feeds' => $request->feeds,
            'stories' => $request->stories,
            'tglMulai' => $request->tglMulai,
            'tglSelesai' => $request->tglSelesai,
            'status' => $request->status
        ]);
        return redirect('/dashboard');
    }

    public function editProject($id)
    {
        return view('projectedit');
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
