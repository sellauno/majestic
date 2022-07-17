<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Posisi;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if (auth()->user() == null) {
            return view('auth.login');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        $posisi = Posisi::all();
        return view('auth.registration', ['posisi' => $posisi]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect()->intended('dashboard')
                    ->withSuccess('You have Successfully loggedin');
            } else if ($role == 'user') {
                return redirect()->intended('dashboarduser')
                    ->withSuccess('You have Successfully loggedin');
            } else {
                return redirect()->intended('client')
                    ->withSuccess('You have Successfully loggedin');
            }
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        // $check = $this->create($data);
        $posisi = '';
        foreach ($request->posisi as $key => $value) {
            if ($key > 0) {
                $posisi = $posisi . ' & ' . $value;
            } else {
                $posisi = $posisi . $value;
            }
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'posisi' => $posisi,
            'role' => $request->role,
            'idClient' => $request->idClient
        ]);
        return redirect('/account');
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     * @param  array  $data
     * @return \App\User
     */

    public function create(array $data)
    {
        // $posisi = null;
        // if(count($data['posisi'])<=1){
        //     foreach($data['posisi'] as $d){
        //         if ($loop->iteration != 1){
        //             $posisi = $d;
        //         }else{
        //             $posisi = $posisi.' & '.$d;
        //         }
        //     }
        // }
        return User::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'posisi' => $data['posisi'],
            // 'posisi' => $posisi,
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
