<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Client;
use App\Project;
use App\Link;
use Google\Service\ServiceControl\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
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

        
        return view('dashboard', [
            'projects' => $projects,
            'clients' => $clients,
            'links' => $links,
            'feeds' => $feeds,
            'tiktoks' => $tiktoks,
            'reels' => $reels,
            'stories' => $stories,

        ]);
    }

    public function dashboardUser()
    {
        $idUser = auth()->user()->id;
        $projects = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->join('teams', 'projects.idProject', '=', 'teams.idProject')
            ->where('teams.idUser', '=', $idUser)
            ->get();
        $clients = Client::all();
        $links = Link::all();
        $reels = DB::table('links')->where('kategori', '=', 'reels')->get();
        $feeds = DB::table('links')->where('kategori', '=', 'feeds')->get();
        $tiktoks = DB::table('links')->where('kategori', '=', 'tiktok')->get();
        $stories = DB::table('links')->where('kategori', '=', 'stories')->get();
        $checklists = DB::table('checklists')->where('idUser', '=', $idUser)->get();
        return view('dashboarduser', [
            'projects' => $projects,
            'clients' => $clients,
            'links' => $links,
            'feeds' => $feeds,
            'tiktoks' => $tiktoks,
            'reels' => $reels,
            'stories' => $stories,
            'checklists' => $checklists,
            'idUser' => $idUser,
        ]);
    }
}
