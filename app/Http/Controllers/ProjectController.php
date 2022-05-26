<?php

namespace App\Http\Controllers;

use App\Client;
use App\Folder;
use App\Link;
use App\Project;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Storage;
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
        // dd($request->all());
        $insert = Project::create([
            'idClient' => $request->idClient,
            'reels' => $request->reels,
            'tiktok' => $request->tiktok,
            'feeds' => $request->feeds,
            'stories' => $request->stories,
            'tglMulai' => $request->tglMulai,
            'tglSelesai' => $request->tglSelesai,
            'harga' => $request->harga,
            'status' => $request->status
        ]);

        if ($request->input('idPJ') != null) {
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

        $client = Client::find($request->idClient);
        $name = $insert->idProject.'_'.$client->namaClient;
        Storage::disk('google')->makeDirectory($name);
        $details = Storage::disk("google")->getMetadata($name);
        $idFolderProject = $details['path'];
        
        Folder::create([
            'folderId' => $idFolderProject, 
            'idProject' => $insert->idProject, 
            'kategori' => 'main'
        ]);

        Storage::extend('google', function($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $idFolderProject);

            return new Filesystem($adapter);
        });        

        $file = 'file_'.$name;
        $video = 'video_'.$name;
        $gambar = 'gambar_'.$name;
        // $feeds = 'feeds_'.$name;
        // $reels = 'reels_'.$name;
        // $story = 'story_'.$name;
        // $tiktok = 'tiktok_'.$name;
        Storage::disk('google')->makeDirectory($file);
        $fileDetail = Storage::disk("google")->getMetadata($file);
        $idFolderFile = $fileDetail['path'];

        Folder::create([
            'folderId' => $idFolderFile, 
            'idProject' => $insert->idProject, 
            'kategori' => 'file'
        ]);

        Storage::disk('google')->makeDirectory($video);
        $videoDetail = Storage::disk("google")->getMetadata($video);
        $idFolderVideo = $videoDetail['path'];

        Folder::create([
            'folderId' => $idFolderVideo, 
            'idProject' => $insert->idProject, 
            'kategori' => 'video'
        ]);

        Storage::disk('google')->makeDirectory($gambar);
        $gambarDetail = Storage::disk("google")->getMetadata($gambar);
        $idFolderGambar = $gambarDetail['path'];

        Folder::create([
            'folderId' => $idFolderGambar, 
            'idProject' => $insert->idProject, 
            'kategori' => 'gambar'
        ]);

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
