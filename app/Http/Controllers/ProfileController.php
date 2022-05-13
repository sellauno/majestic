<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
