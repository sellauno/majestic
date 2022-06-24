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
        $projects = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->get();
        $clients = Client::all();
        $links = Link::all();
        $reels = DB::table('links')->where('kategori', '=', 'reels')->get();
        $feeds = DB::table('links')->where('kategori', '=', 'feeds')->get();
        $tiktoks = DB::table('links')->where('kategori', '=', 'tiktok')->get();
        $stories = DB::table('links')->where('kategori', '=', 'stories')->get();
        $layanan = DB::table('layanan')
            ->join('jenislayanan', 'layanan.idKategori', '=', 'jenislayanan.idKategori')
            ->get();

        // Progress

        $a = DB::table('projects')
            ->leftjoin('checklists', 'checklists.idProject', '=', 'projects.idProject')
            ->selectRaw('COUNT(*) AS total')
            ->groupBy('projects.idProject')
            ->get();

        $x = DB::table('projects')
            ->leftjoin('checklists', 'checklists.idProject', '=', 'projects.idProject')
            ->select('projects.idProject', DB::raw('COUNT(checklists.idChecklist) AS total'))
            ->where('finished', true)
            ->groupBy('projects.idProject');

        $b = DB::table('projects')
            ->leftJoinSub($x, 'checklists', function ($join) {
                $join->on('checklists.idProject', '=', 'projects.idProject');
            })->get();

        // End Progress

        return view('projects', [
            'projects' => $projects,
            'clients' => $clients,
            'links' => $links,
            'feeds' => $feeds,
            'tiktoks' => $tiktoks,
            'reels' => $reels,
            'stories' => $stories,
            'layanan' => $layanan,
        ]);
    }

    public function project($id)
    {
        $idUser = auth()->user()->id;
        $role = auth()->user()->role;
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $checklists = DB::table('checklists')
            ->join('layanan', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select('checklists.*')
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
            ->select('subtodos.*', 'checklists.toDO')
            ->get();

        $files = DB::table('files')
            ->join('checklists', 'checklists.idChecklist', '=', 'files.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select('files.*')
            ->get();

        $file = array();
        $video = array();
        $gambar = array();

        foreach ($files as $f) {
            if ($f->kategori == 'file') {
                $file[] = $f;
            } else if ($f->kategori == 'video') {
                $video[] = $f;
            } else if ($f->kategori == 'gambar') {
                $gambar[] = $f;
            }
        }

        // Progress
        $sum = 0;
        if ($checklists->count() != 0) {
            $sum = 100 / $checklists->count();
        }

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

        // if ($project->progres != $jumlah) {
        //     $p = Project::find($id);
        //     $p->progres = $jumlah;
        //     $p->save();
        // }

        return view('project', [
            'id' => $id,
            'checklists' => $checklists,
            'kategori' => $kategori,
            'subchecklist' => $subchecklist,
            'subtodos' => $subtodos,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total,
            'file' => $file,
            'gambar' => $gambar,
            'video' => $video,
            'cari' => ''
        ]);
    }

    public function projectUser($id)
    {
        $idUser = auth()->user()->id;
        $role = auth()->user()->role;
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $checklists = DB::table('checklists')
            ->join('layanan', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select('checklists.*')
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
            ->select('subtodos.*', 'checklists.toDO')
            ->get();

        $files = DB::table('files')
            ->join('checklists', 'checklists.idChecklist', '=', 'files.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select('files.*')
            ->get();

        // $file = $files->where('kategori', '=', 'file')->get();
        // $video = $files->where('kategori', '=', 'video')->get();
        // $gambar = $files->where('kategori', '=', 'gambar')->get();

        $file = array();
        $video = array();
        $gambar = array();

        foreach ($files as $f) {
            if ($f->kategori == 'file') {
                $file[] = $f;
            } else if ($f->kategori == 'video') {
                $video[] = $f;
            } else if ($f->kategori == 'gambar') {
                $gambar[] = $f;
            }
        }

        // Progress
        $sum = 0;
        if ($checklists->count() != 0) {
            $sum = 100 / $checklists->count();
        }

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

        // if ($project->progres != $jumlah) {
        //     $p = Project::find($id);
        //     $p->progres = $jumlah;
        //     $p->save();
        // }

        return view('projectuser', [
            'id' => $id,
            'checklists' => $checklists,
            'kategori' => $kategori,
            'subchecklist' => $subchecklist,
            'subtodos' => $subtodos,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total,
            'file' => $file,
            'gambar' => $gambar,
            'video' => $video,
            'cari' => ''
        ]);
    }

    public function detailProject($id)
    {
        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idProject', '=', $id)
            ->first();
        $project->tglMulai = date('d/m/Y', strtotime($project->tglMulai));
        $project->tglSelesai = date('d/m/Y', strtotime($project->tglSelesai));
        $layanan = DB::table('layanan')
            ->leftJoin('jenislayanan', 'jenislayanan.idKategori', '=', 'layanan.idKategori')
            ->where('layanan.idProject', '=', $id)
            ->get();
        $checklists = DB::table('layanan')
            ->leftJoin('checklists', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->get();
        $jenis = [];
        foreach ($checklists as $key => $value) {
            $find = Jenislayanan::find($checklists[$key]->idKategori);
            $jenis[$key] = json_decode($find->proses);
        }

        $subtodos = DB::table('subtodos')
            ->join('checklists', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->join('users', 'users.id', '=', 'subtodos.idUser')
            ->where('layanan.idProject', '=', $id)
            ->select('subtodos.*', 'users.*')
            ->get();


        // progress bar

        $l = 100 / $layanan->count();

        $c = DB::table('checklists')
            ->join('layanan', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select(DB::raw('COUNT(checklists.idChecklist) as c'), DB::raw($l . '/ COUNT(checklists.idChecklist) as pc'), 'layanan.idLayanan')
            ->groupBy('layanan.idLayanan')
            ->get();

        foreach ($c as $key => $value) {
            $c[$key]->presentaseL = 0;
        }

        $e = DB::table('checklists')
            ->leftjoin(
                DB::raw('(SELECT idChecklist, COUNT(*) finish 
            FROM subtodos
            WHERE checked = true
            GROUP BY idChecklist )
            finished'),
                function ($join) {
                    $join->on('checklists.idChecklist', '=', 'finished.idChecklist');
                }
            )
            ->join('layanan', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->leftjoin('subtodos', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->select('checklists.idChecklist', 'finished.finish', DB::raw('COUNT(idsubtodo) AS total'))
            ->where('layanan.idProject', '=', $id)
            ->groupBy('checklists.idChecklist', 'finished.finish')
            ->get();

        $sum = 0;
        foreach ($checklists as $key => $value) {
            $presentase = $e[$key]->total == 0 ? 0 : $e[$key]->finish / $e[$key]->total * 100;
            foreach ($c as $d) {
                if ($d->idLayanan == $checklists[$key]->idLayanan) {
                    $sum += $presentase == 0 ? 0 : $l / $d->c * ($presentase  / 100);
                    $d->presentaseL += $presentase / $d->c;
                }
            }
            $checklists[$key]->presentase = round($presentase);
        }

        foreach ($layanan as $key => $value) {
            foreach ($c as $d) {
                if ($d->idLayanan == $layanan[$key]->idLayanan) {
                    $layanan[$key]->presentase = round($d->presentaseL);
                }
            }
        }

        // dd($l, $c, $e, $layanan, $sum);
        // end progress bar


        if ($project->progres != $sum) {
            $p = Project::find($id);
            $p->progres = $sum;
            $p->save();
        }

        // dd($checklists);

        return view('projectdetail', [
            'id' => $id,
            'checklists' => $checklists,
            'subtodos' => $subtodos,
            'project' => $project,
            'layanan' => $layanan,
            'jenis' => $jenis
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
            'tglMulai' => $request->tglMulai,
            'tglSelesai' => $request->tglSelesai,
            'harga' => $request->harga,
            'status' => $request->status,
            'finished' => false
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

        if ($request->input('idPJ') != null) {
            foreach ($request->idPJ as $key => $value) {
                Notification::create([
                    'idUser' => $value,
                    'notif' => 'Anda telah ditambahkan kedalam project ' . $client->namaClient,
                    'url' => '',
                    'isRead' => 0
                ]);
            }
        }

        if ($request->anggota != null) {
            foreach ($request->anggota as $key => $value) {
                Notification::create([
                    'idUser' => $value,
                    'notif' => 'Anda telah ditambahkan kedalam project ' . $client->namaClient,
                    'url' => '',
                    'isRead' => 0
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
            ->join('layanan', 'checklists.idLayanan', '=', 'layanan.idLayanan')
            ->where('layanan.idProject', '=', $id)
            ->select('checklists.*')
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
            ->select('subtodos.*', 'checklists.toDO')
            ->get();

        // Progress
        $sum = 0;
        if ($checklists->count() != 0) {
            $sum = 100 / $checklists->count();
        }

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

        return view('project', [
            'id' => $id,
            'checklists' => $checklists,
            'kategori' => $kategori,
            'subchecklist' => $subchecklist,
            'subtodos' => $subtodos,
            'myprofile' => $myprofile,
            'project' => $project,
            'links' => $links,
            'users' => $users,
            'hak' => $hak,
            'komentar' => $komentar,
            'total' => $total,
            'cari' => 'show'
        ]);
    }
}
