<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function createLink(Request $request){
        Link::create([
            'idProject' => $request->idProject,
            'tglUpload' => $request->tglUpload, 
            'kategori' => $request->kategori, 
            'judul' => $request->judul, 
            'link' => $request->link, 
            'idUser' => $request->idUser
        ]);
        return redirect('/checklist' . '/' . $request->idProject);
    }
}
