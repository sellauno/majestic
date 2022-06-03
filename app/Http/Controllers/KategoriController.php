<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function createKategori(Request $request)
    {
        Kategori::create([
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah
        ]);
        return redirect('/checklist' . '/' . $request->idProject);
    }
    public function editKategori($id)
    {
        $kategori = Kategori::find($id);

        return view('projectedit', [
            'kategori' => $kategori,
        ]);
    }

    public function updateProject(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->jumlah = $request->kategori;

        $kategori->save();

        return redirect('/dashboard');
    }

    public function deleteKategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/dashboard');
    }
}
