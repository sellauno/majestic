<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function checklists($id){
        $checklists = Checklist::all()->where('checklists.idProject', '=', $id);
        return view('project', ['checklists' => $checklists, 'id' => $id]);
    }

    public function createChecklist(){
        
    }
}
