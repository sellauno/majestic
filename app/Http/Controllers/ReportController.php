<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use Google\Service\AdMob\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App as FacadesApp;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report($id)
    {
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];

        $project = DB::table('projects')
            ->join('clients', 'projects.idClient', '=', 'clients.idClient')
            ->where('projects.idproject', '=', $id)
            ->first();
        $project->tglMulai = date('j F Y', strtotime($project->tglMulai));
        $project->tglSelesai = date('j F Y', strtotime($project->tglSelesai));
        $project->harga = number_format($project->harga, 0, ',', '.');

        $layanan = DB::table('layanan')
            ->leftJoin('jenislayanan', 'jenislayanan.idKategori', '=', 'layanan.idKategori')
            ->where('layanan.idProject', '=', $id)
            ->get();

        $teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.idUser')
            ->where('teams.idProject', '=', $id)
            ->get();

        $subtodos = DB::table('subtodos')
            ->join('checklists', 'checklists.idChecklist', '=', 'subtodos.idChecklist')
            ->join('layanan', 'layanan.idLayanan', '=', 'checklists.idLayanan')
            ->join('users', 'users.id', '=', 'subtodos.idUser')
            ->where('layanan.idProject', '=', $id)
            ->select('subtodos.*', 'checklists.toDO')
            ->get();

        foreach ($subtodos as $subtodo) {
            if ($subtodo->updated_at > $subtodo->deadline) {
                $subtodo->keterangan = 'Terlambat';
            }else{
                $subtodo->keterangan = '';
            }
        }

        $pdf = PDF::loadView('laporan', compact('project', 'layanan', 'teams', 'subtodos'))
            ->setPaper('a4', 'potrait');;

        return $pdf->stream('itsolutionstuff.pdf');
    }
}
