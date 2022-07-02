<?php

namespace App\Http\Controllers;

use App\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    public function createPosisi(Request $request)
    {
        Posisi::create([
            'posisi' => $request->posisi,
        ]);

        return redirect()->back();
    }
}
