<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Client;
use App\Comment;
use App\Folder;
use App\Jenislayanan;
use App\Kategori;
use App\Layanan;
use App\Link;
use App\Project;
use App\Team;
use App\User;
use App\Notification;
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
    public function detailProject($id)
    {
        $idUser = auth()->user()->id;
        $role = auth()->user()->role;
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $project->tglMulai = date('d/m/Y', strtotime($project->tglMulai));
        $project->tglSelesai = date('d/m/Y', strtotime($project->tglSelesai));
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
        $layanan = DB::table('layanan')
            ->leftJoin('jenislayanan', 'jenislayanan.idKategori', '=', 'layanan.idKategori')
            ->where('layanan.idProject', '=', $id)
            ->get();
        $checklists = DB::table('layanan')
            ->leftJoin('checklists', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->join('jenislayanan', 'jenislayanan.idKategori', '=', 'layanan.idKategori')
            ->where('layanan.idProject', '=', $id)
            ->get();
        foreach ($checklists as $key => $value) {
            $checklists[$key]->proses = json_decode($checklists[$key]->proses);
        }
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

        // End Progress

        $kategori = Kategori::all();

        $komentar = Comment::all();

        if ($project->progres != $jumlah) {
            $p = Project::find($id);
            $p->progres = $jumlah;
            $p->save();
        }

        // dd($layanan);

        return view('projectdetail', [
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
            'layanan' => $layanan,
            'total' => $total
        ]);
    }
    public function addProject()
    {
        $clients = Client::all();
        $users = User::all()->where('role', '=', 'user');
        $kategori = Jenislayanan::all();
        return view('projectadd', ['clients' => $clients, 'users' => $users, 'kategori' => $kategori]);
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
            'harga' => $request->harga,
            'status' => $request->status,
            'todo' => 0,
            'finished' => 0
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
        $name = $insert->idProject . '_' . $client->namaClient;
        Storage::disk('google')->makeDirectory($name);
        $details = Storage::disk("google")->getMetadata($name);
        $idFolderProject = $details['path'];

        Folder::create([
            'folderId' => $idFolderProject,
            'idProject' => $insert->idProject,
            'kategori' => 'main'
        ]);

        $file = 'file_' . $name;
        $video = 'video_' . $name;
        $gambar = 'gambar_' . $name;

        Storage::disk('google')->makeDirectory($idFolderProject . '/' . $file);
        $fileDetail = Storage::disk("google")->getMetadata($idFolderProject . '/' . $file);
        $idFolderFile = $fileDetail['path'];

        Folder::create([
            'folderId' => $idFolderFile,
            'idProject' => $insert->idProject,
            'kategori' => 'file'
        ]);

        Storage::disk('google')->makeDirectory($idFolderProject . '/' . $video);
        $videoDetail = Storage::disk("google")->getMetadata($idFolderProject . '/' . $video);
        $idFolderVideo = $videoDetail['path'];

        Folder::create([
            'folderId' => $idFolderVideo,
            'idProject' => $insert->idProject,
            'kategori' => 'video'
        ]);

        Storage::disk('google')->makeDirectory($idFolderProject . '/' . $gambar);
        $gambarDetail = Storage::disk("google")->getMetadata($idFolderProject . '/' . $gambar);
        $idFolderGambar = $gambarDetail['path'];

        Folder::create([
            'folderId' => $idFolderGambar,
            'idProject' => $insert->idProject,
            'kategori' => 'gambar'
        ]);

        // if ($request->input('idPJ') != null) {
        //     foreach ($request->idPJ as $key => $value) {
        //         Notification::create([
        //             'idUser' => $value,
        //             'notif' => 'Anda telah ditambahkan kedalam project '.$name,
        //             'isRead' => 0
        //         ]);
        //     }
        // }

        // if ($request->anggota != null) {
        //     foreach ($request->anggota as $key => $value) {
        //         Notification::create([
        //             'idUser' => $value,
        //             'notif' => 'Anda telah ditambahkan kedalam project '.$name,
        //             'isRead' => 0
        //         ]);
        //     }
        // }

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
        $kategori = Jenislayanan::all();
        $layanan = Layanan::where('idProject', '=', $id)->get();

        return view('projectedit', [
            'projects' => $projects,
            'users' => $users,
            'teams' => $teams,
            'kategori' => $kategori,
            'layanan' => $layanan
        ]);
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->tglMulai = $request->tglMulai;
        $project->tglSelesai = $request->tglSelesai;
        $project->status = $request->status;
        $project->harga = $request->harga;
        $project->save();

        if ($request->idLayanan != null) {
            foreach ($request->idLayanan as $key => $value) {
                $layanan = Layanan::find($request->idLayanan[$key]);
                $layanan->idKategori = $request->idKategori[$key];
                $layanan->jumlah = $request->jumlah[$key];
                $layanan->save();
            }
        }

        if ($request->idKategoriNew != null) {
            foreach ($request->idKategoriNew as $key => $value) {
                $layananid = Layanan::create([
                    'idKategori' => $request->idKategoriNew[$key],
                    'jumlah' => $request->jumlahNew[$key],
                    'idProject' => $id
                ]);
            }

            for ($i = 1; $i <= $request->jumlahNew[$key]; $i++) {
                $layanan = Jenislayanan::find($request->idKategoriNew[$key]);
                $nama = $layanan->kategori . ' ' . $i;
                Checklist::create([
                    'idLayanan' => $layananid->idLayanan,
                    'toDO' => $nama,
                    'tglStart' => $request->tglMulai,
                    'deadline' => $request->tglSelesai
                ]);
            }
        }

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
        $id = $request->id;
        $links = DB::table('links')
            ->join('users', 'users.id', '=', 'links.idUser')
            ->where('links.idProject', '=', $id)
            ->where('kategori', 'like', "%" . $keyword . "%")
            ->get();
        $idUser = auth()->user()->id;
        $role = auth()->user()->role;
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $checklists = DB::table('checklists')
            ->where('checklists.idProject', '=', $id)
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
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total
        ]);
    }
}
