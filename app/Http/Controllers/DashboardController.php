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
        return view('dashboard', ['projects' => $projects, 'clients' => $clients, 'links' => $links]);
    
    }
}
