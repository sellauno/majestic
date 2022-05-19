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
        $users = User::all()->where('role', '=', 'user');
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

        foreach ($request->idPJ as $idPj) {
            Team::create([
                'idProject' => $request->idProject,
                'idUser' => $idPj,
                'jabatan' => 'Penanggung Jawab'
            ]);
        }

        foreach ($request->anggota as $idAnggota) {
            Team::create([
                'idProject' => $request->idProject,
                'idUser' => $idAnggota,
                'jabatan' => 'Anggota'
            ]);
        }


        return redirect('/dashboard');
    }

    public function editProject($id)
    {
        $projects = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idproject', '=', $id)
            ->get();
        $users = User::all()->where('role', '=', 'user');
        $teams = DB::table('teams')
            ->join('users', 'teams.idUser', '=', 'users.id')
            ->where('teams.idproject', '=', $id)
            ->get();

        return view('projectedit', [
            'projects' => $projects, 
            'users' => $users,
            'teams' => $teams
        ]);
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
        // $project->idPJ = $request->idPJ;
        $project->harga = $request->harga;
        $project->save();

        foreach ($request->idPJ as $idPj) {
            Team::create([
                'idProject' => $id,
                'idUser' => $idPj,
                'jabatan' => 'Penanggung Jawab'
            ]);
        }

        foreach ($request->anggota as $idAnggota) {
            Team::create([
                'idProject' => $id,
                'idUser' => $idAnggota,
                'jabatan' => 'Anggota'
            ]);
        }

        return redirect('/dashboard');
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/dashboard');
    }
}
