<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addProject(){
        $clients = Client::all();
        $employees = User::all()->where('role', '=', '1');
        return view('projectadd', ['clients' => $clients, 'employees' => $employees]);
    }
}
