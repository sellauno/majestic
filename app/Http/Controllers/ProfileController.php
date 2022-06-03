<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posisi;
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

    public function updateAccount(Request $request,$id)
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
        $user->delete();

        return redirect('/account');
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
}
