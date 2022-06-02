<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function createKategori(Request $request){
        Kategori::create([
            'kategori' => $request->kategori, 
            'jumlah' => $request->jumlah
        ]);
        return redirect('/checklist' . '/' . $request->idProject);
}
}
