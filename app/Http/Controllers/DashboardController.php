<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $projects = Project::all();
        return view('dashboard', ['projects' => $projects]);
    }
}
