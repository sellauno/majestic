<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function allUser()
    {
        $users = User::all();
        return view('account', ['user' => $users]);
    }
}
