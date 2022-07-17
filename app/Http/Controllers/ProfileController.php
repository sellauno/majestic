<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Posisi;
use App\Team;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profileedit', [
            'user' => $request->user()
        ]);
    }
    public function update(Request $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profiledit');
    }

    //account
    public function editAccount($id)
    {
        $user = User::find($id);
        $posisi = Posisi::all();
        return view('accountedit', [
            'user' => $user,
            'posisi' => $posisi,
        ]);
    }

    public function updateAccount(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->posisi = $request->posisi;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/account');
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function deleteAccount($id)
    {
        $user = User::find($id);
        if ($user->role == 'user') {
            $team = Team::where('idUser', '=', $id);
            if ($team->count() < 1) {
                $user->delete();
                return redirect('/account');
            } else {
                return redirect('/account')->with('error', 'Gagal dihapus!');;
            }
        } else {
            $komen = Comment::where('idUser', '=', $id);
            foreach ($komen as $k) {
                $delkom = Comment::find($k->id);
                $delkom->delete();
            }
            $user->delete();
            return redirect('/account');
        }
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
}
