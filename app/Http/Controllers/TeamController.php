<?php

namespace App\Http\Controllers;

use App\Subtodo;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function createTeam(Request $request)
    {
        Team::create([
            'idProject' => $request->idProject,
            'idUser' => $request->idUser,
            'jabatan' => $request->jabatan
        ]);
        return redirect('/editproject' . '/' . $request->idProject);
    }
    public function editTeam($id)
    {
        $team = Team::find($id);
        $users = User::all()->where('role', '=', 'user');
        return view('teamedit', ['team' => $team, 'users' => $users]);
    }

    public function updateTeam(Request $request, $id)
    {
        $team = Team::find($id);
        $team->idUser = $request->idUser;
        $team->jabatan = $request->jabatan;
        $team->save();
        return redirect('/editproject' . '/' . $request->idProject);
    }

    public function deleteTeam(Request $request)
    {
        $team = Team::find($request->id);
        $subtodos = Subtodo::all()->where('idUser', '=', $team->idUser);
        foreach ($subtodos as $subtodo) {
            $subtodo->idUser = $request->idUser;
            $subtodo->save();
        }
        $idProject = $team->idProject;
        $team->delete();
        return redirect('/editproject' . '/' . $idProject);
    }
}
