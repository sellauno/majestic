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
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'idClient' => ['required', 'int', 'max:255'],
        //     'reels' => ['required', 'video'],
        //     'tiktok' => ['required', 'video'],
        //     'feeds' => ['required', 'image'],
        //     'stories' => ['required', 'video'],

        // ]);
    }
    public function createProject(Request $request)
    {
        $insert = Project::create([
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

        if ($request->idPJ != null) {
            foreach ($request->idPJ as $key => $value) {
                Team::create([
                    'idProject' => $insert->idProject,
                    'idUser' => $value,
                    'jabatan' => 'Penanggung Jawab'
                ]);
            }
        }

        if ($request->anggota != null) {
            foreach ($request->anggota as $key => $value) {
                Team::create([
                    'idProject' => $insert->idProject,
                    'idUser' => $value,
                    'jabatan' => 'Anggota'
                ]);
            }
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

        return redirect('/dashboard');
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/dashboard');
    }
    public function cari(Request $request)
	{
		$keyword = $request->cari;
        $links = Link::where('kategori', "%" . $keyword . "%")->paginate(5);
        $id=$request->id;
        $project = DB::table('projects')
        ->join('clients', 'projects.idClient', '=', 'clients.idClient')
        ->where('projects.idProject', '=', $id)
        ->first();
    $checklists = DB::table('checklists')->where('checklists.idProject', '=', $id)->get();
    $links = DB::table('links')
        ->join('users', 'users.id', '=', 'links.idUser')
        ->where('links.idProject', '=', $id)
        ->where('kategori','like', "%" . $keyword . "%")
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
}
