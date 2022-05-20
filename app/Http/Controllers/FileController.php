<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function addFile($id){
        $todo = Checklist::find($id);
        return view('fileadd', ['todo' => $todo]);
    }
}
