<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
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
}
