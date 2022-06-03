<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function allUser()
    {
        $users = User::all();
        $admin = DB::table('users')->where('role','=','admin')->count();
        return view('account', ['user' => $users, 'admin' => $admin]);
    }
}
